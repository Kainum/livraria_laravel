@extends('master', [
    'page_title'    => $item->titulo,
])
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 mb-4">
            <div class="col-12 mb-4">
                <img class="img-fluid" src="{{ route('image.show', [
                        'image_path'=>$item->imagem,
                        'width'=>400,
                        'height'=>640,
                        ]) }}">
            </div>
            <div class="col-12 mb-4">
                @if (is_null($wishlist))
                    {{ Form::open(['route'=>['wishlist.add', 'id'=>\Crypt::encrypt($item->id)]]) }}
                        <div class="form-group">
                            {{ Form::submit('Add Lista de Desejos', ['class'=>'btn btn-danger']) }}
                        </div>
                    {{ Form::close() }}
                @else
                    <div class="form-group">
                        <a href="{{ route('wishlist.remove',  ['id'=>\Crypt::encrypt($wishlist->id)]) }}" class="btn btn-danger">Rem Lista de Desejos</a>
                    </div>
                @endif
                
                <h4>Detalhes do Produto</h4>
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <tbody>
                        <tr>
                            <td>ISBN</td>
                            <td><b>{{ $item->isbn }}</b></td>
                        </tr>
                        <tr>
                            <td>Autor</td>
                            <td><b>{{ $item->autor }}</b></td>
                        </tr>
                        <tr>
                            <td>Data de Lançamento</td>
                            <td><b>{{ Carbon\Carbon::parse($item->data_lancamento)->format('d/m/Y') }}</b></td>
                        </tr>
                        <tr>
                            <td>Quantidade de Páginas</td>
                            <td><b>{{ $item->paginas }}</b></td>
                        </tr>
                        <tr>
                            <td>Gêneros</td>
                            <td>
                                <b>
                                    @php
                                        $i = 0;
                                        foreach ($item->colecao->generos as $gen) {
                                            if ($i++ > 0) {
                                                echo(", ");
                                            }
                                            echo($gen->genero->nome);
                                        }
                                    @endphp
                                    
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Editora</td>
                            <td><b>{{ $item->editora->nome }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="col-12 col-md-6 mb-4">
            <div class="col-12">
                <h2>{{ $item->titulo }}</h2>
                <p>{{ $item->resumo }}</p>
                <a class="btn btn-secondary" href="{{ route('colecao.view', ['id'=>\Crypt::encrypt($item->colecao->id)]) }}">
                    Ver Coleção
                </a>
                <h4>R${{ \App\Util::formataDinheiro($item->preco) }}</h4>
            </div>
            <div class="col-12">
                {{ Form::open(['route'=>'cart.store']) }}
                    <div class="form-group">
                        {{ Form::hidden('product_id', \Crypt::encrypt($item->id)) }}
                    </div>
                    @if ($item->qtd_estoque > 0)
                        @if ($item->qtd_estoque <= 20)
                            <p style="color: darkorange">Restam {{ $item->qtd_estoque }} unidades</p>
                        @endif
                        <div class="form-group">
                            {{ Form::number('quantity', '1', ['min'=>1, 'max'=>min(3, $item->qtd_estoque), 'class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Adicionar ao Carrinho', ['class'=>'btn btn-success']) }}
                        </div>
                    @else
                        <div class="form-group">
                            <button class="btn btn-warning" disabled>Sem estoque</button>
                        </div>
                    @endif
                    
                {{ Form::close() }}
            </div>
            <br>
            <div class="col-12">
                <div data-role="collapsible" role="tab" data-collapsible="true" aria-selected="true" aria-expanded="true" class="allow active">
                    <h4>Calcular Frete</h4>
                </div>
                <div>
                    <form class='form-inline', id='myForm'>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        {{ Form::text('cepDestino', null, ['id'=>'cepDestino', 'required', 'class'=>'form-control', 'maxlength'=>"9", 'placeholder'=>"_____-___"]) }}
                        {{ Form::submit('Calcular', ['class'=>'btn btn-primary']) }}
                        <a target="_blank" href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sei meu CEP</a>
                    </form>
                    <div id="tabela-fretes">
                        {{-- AQUI VAI APARECER O RESULTADO DOS VALORES DO FRETE --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myForm').submit(async function(e){

                // previne a ação padrão do formulário
                e.preventDefault();

                // adiciona o carregando no lugar da tabela para saber que está processando
                $("#tabela-fretes").html("Carregando...");

                // parametros
                let pac     = '04510';
                let sedex   = '04014';

                let cepDestino = $("#cepDestino").val();

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // ----------

                // chama as funções que retornam os valores com os dias
                let chamada_pac = await getValorFrete(pac, cepDestino, CSRF_TOKEN);
                let chamada_sedex = await getValorFrete(sedex, cepDestino, CSRF_TOKEN);

                // seta os elementos na tabela para aparecer os valores
                let partePac =      '<tr><td>Correio pac - '+chamada_pac.PrazoEntrega+' dias</td><td>R$'+chamada_pac.Valor+'</td></tr>'
                let parteSedex =    '<tr><td>Correio sedex - '+chamada_sedex.PrazoEntrega+' dias</td><td>R$'+chamada_sedex.Valor+'</td></tr>'
                let elementos =     '<table class="table table-striped"><thead><tr><th>Transportadora</th><th>Custo</th></tr></thead><tbody>'+partePac+parteSedex+'</tbody></table>'
                
                $("#tabela-fretes").html(elementos);
                // ----------
            });
        });

        function getValorFrete(codServico, cepDestino, csrf_token) {
            let result;

            result = $.ajax({
                url:    "/frete",
                type:   "POST",
                data: {
                    _token: csrf_token,
                    codServico: codServico,
                    cepDestino: cepDestino
                },
                dataType: 'JSON',
            });
            return result;
        }
    </script>
@stop