@extends('master', ['model_title' => 'Loja'])
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
                {{ Form::open(['route'=>['wishlist.add', 'id'=>$item->id]]) }}
                    <div class="form-group">
                        {{ Form::submit('Add Lista de Desejos', ['class'=>'btn btn-danger']) }}
                    </div>
                {{ Form::close() }}
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
                            <td><b>{{ $item->data_lancamento }}</b></td>
                        </tr>
                        <tr>
                            <td>Quantidade de Páginas</td>
                            <td><b>{{ $item->paginas }}</b></td>
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
                <h4>R${{ $item->preco }}</h4>
            </div>
            <div class="col-12">
                {{ Form::open(['route'=>'cart.store']) }}
                    <div class="form-group">
                        {{ Form::hidden('product_id', $item->id) }}
                    </div>
                    <div class="form-group">
                        {{ Form::number('quantity', '1', ['min'=>1, 'max'=>10, 'class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Adicionar ao Carrinho', ['class'=>'btn btn-success']) }}
                    </div>
                {{ Form::close() }}
            </div>
            <div class="container col-12">
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
                        {{-- <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Transportadora</th>
                                    <th>Custo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Correio pac - 10 dias</td>
                                    <td>R$0,00</td>
                                </tr>
                                <tr>
                                    <td>Correio sedex - 7 dias</td>
                                    <td>R$43,52</td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myForm').submit(function(e){
                // let cepDestino = "";
                // let codServico = "";

                e.preventDefault();

                let valorSedex  = "---";
                let valorPac    = "---";

                let prazoSedex  = "---";
                let prazoPac    = "---";

                // $("#tabela-fretes").html("" + valorPac+" - "+valorSedex);

                let pac     = '04510';
                let sedex   = '04014';

                let cepDestino = $("#cepDestino").val();

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:    "/frete",
                    type:   "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        codServico: pac,
                        cepDestino: cepDestino
                    },
                    dataType: 'JSON',
                    success: function(data){
                        valorPac = data.Valor;
                        prazoPac = data.PrazoEntrega;
                        //$("#tabela-fretes").html("" + valorPac+" - "+valorSedex);
                    },
                    error: function() {
                        alert("Deu erro");
                    }
                });

                $.ajax({
                    url:    "/frete",
                    type:   "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        codServico: sedex,
                        cepDestino: cepDestino
                    },
                    dataType: 'JSON',
                    success: function(data){
                        valorSedex = data.Valor;
                        prazoSedex = data.PrazoEntrega;

                        let partePac =      '<tr><td>Correio pac - '+prazoPac+' dias</td><td>R$'+valorPac+'</td></tr>'
                        let parteSedex =    '<tr><td>Correio pac - '+prazoSedex+' dias</td><td>R$'+valorSedex+'</td></tr>'
                        let elementos =     '<table class="table table-striped"><thead><tr><th>Transportadora</th><th>Custo</th></tr></thead><tbody>'+partePac+parteSedex+'</tbody></table>'
                        
                        $("#tabela-fretes").html(elementos);
                    },
                    error: function() {
                        alert("Deu erro");
                    }
                });

                // $("#tabela-fretes").html("" + valorPac+" - "+valorSedex);
            });
        });
    </script>
@stop