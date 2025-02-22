@extends('layouts.shop', [
    'page_title' => $item->product_name,
])
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 d-flex flex-column gap-2">
            {{-- IMAGEM --}}
            <img class="img-fluid" width="400px" height="640px"
                src="https://m.media-amazon.com/images/I/71ySKqK3SRL._AC_UF894,1000_QL80_.jpg">

            @if (is_null($wishlist))
                <form action="{{ route('profile.wishlist.add', ['id' => \Crypt::encrypt($item->id)]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Adicionar à Lista de Desejos</button>
                </form>
            @else
                <div class="form-group">
                    <a href="{{ route('profile.wishlist.remove', ['id' => \Crypt::encrypt($wishlist->id)]) }}"
                        class="btn btn-danger">Rem Lista de Desejos</a>
                </div>
            @endif

            <x-shop.book-details :$item />
        </div>

        <div class="col-12 col-md-6 d-flex flex-column gap-3">
            {{-- INFO --}}
            <div>
                <h2>{{ $item->product_name }}</h2>
                <p>{{ $item->synopsis }}</p>
                <a class="btn btn-secondary"
                    href="{{ route('colecao.view', ['id' => \Crypt::encrypt($item->colecao->id)]) }}">
                    Ver Coleção
                </a>
                <h4>{{ \App\Services\Operations::money($item->price) }}</h4>
            </div>

            {{-- CARRINHO --}}
            <form action="{{ route('cart.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="product_id" value="{{ \Crypt::encrypt($item->id) }}">
                </div>

                @if ($item->qty_in_stock > 0)
                    @if ($item->qty_in_stock <= 20)
                        <p class="text-danger">Restam {{ $item->qty_in_stock }} unidades</p>
                    @endif
                    <div class="form-group">
                        <input type="number" name="quantity" id="quantity" min="1"
                            max="{{ min(3, $item->qty_in_stock) }}" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Adicionar ao Carrinho</button>
                    </div>
                @else
                    <div class="form-group">
                        <button class="btn btn-warning" disabled>Sem estoque</button>
                    </div>
                @endif
            </form>

            {{-- FRETE --}}
            <div>
                <h4>Calcular Frete</h4>
                <div>
                    <form class='form-inline', id='myForm'>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />

                        <div class="mb-2">
                            <label for="cepDestino">CEP de destino:</label>
                            <input type="text" id="cepDestino" required class="form-control" maxlength="9"
                                placeholder="_____-___">
                        </div>

                        <button type="submit" class="btn btn-primary">Calcular</button>
                        <a target="_blank" href="https://buscacepinter.correios.com.br/app/endereco/index.php">Não sei meu
                            CEP</a>
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
        $(document).ready(function() {
            $('#myForm').submit(async function(e) {

                // previne a ação padrão do formulário
                e.preventDefault();

                // adiciona o carregando no lugar da tabela para saber que está processando
                $("#tabela-fretes").html("Carregando...");

                // parametros
                let pac = '04510';
                let sedex = '04014';

                let cepDestino = $("#cepDestino").val();

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // ----------

                // chama as funções que retornam os valores com os dias
                let chamada_pac = await getValorFrete(pac, cepDestino, CSRF_TOKEN);
                let chamada_sedex = await getValorFrete(sedex, cepDestino, CSRF_TOKEN);

                // seta os elementos na tabela para aparecer os valores
                let partePac = '<tr><td>Correio pac - ' + chamada_pac.PrazoEntrega +
                    ' dias</td><td>R$' + chamada_pac.Valor + '</td></tr>'
                let parteSedex = '<tr><td>Correio sedex - ' + chamada_sedex.PrazoEntrega +
                    ' dias</td><td>R$' + chamada_sedex.Valor + '</td></tr>'
                let elementos =
                    '<table class="table table-striped"><thead><tr><th>Transportadora</th><th>Custo</th></tr></thead><tbody>' +
                    partePac + parteSedex + '</tbody></table>'

                $("#tabela-fretes").html(elementos);
                // ----------
            });
        });

        function getValorFrete(codServico, cepDestino, csrf_token) {
            let result;

            result = $.ajax({
                url: "/frete",
                type: "POST",
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
