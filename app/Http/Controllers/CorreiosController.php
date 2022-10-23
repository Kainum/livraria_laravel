<?php

namespace App\Http\Controllers;

use App\Models\Correios;
use Illuminate\Http\Request;

class CorreiosController extends Controller
{
    public function calcular () {
        $obCorreios = new Correios();

        // dados para os calculos do frete
        $codServico     = Correios::SERVICO_SEDEX;
        $cepOrigem      = '99050073';
        $cepDestino     = '98240000';
        $peso           = 1;
        $formato        = Correios::FORMATO_CAIXA_PACOTE;
        $comprimento    = 15;
        $altura         = 15;
        $largura        = 15;

        $frete = $obCorreios->calcularFrete($codServico, $cepOrigem, $cepDestino, 
                                            $peso, $formato, $comprimento, $altura, $largura);

        // VERIFICA O RESULTADO
        if (!$frete) {
            die('Problemas ao calcular o frete');
        }
        // VERIFICA O ERRO
        if (strlen($frete->MsgErro)) {
            die('Erro: '.$frete->MsgErro);
        }

        //IMPRIME OS DADOS DA CONSULTA
        echo 'CEP ORIGEM:   '.$cepOrigem.'<br>';
        echo 'CEP DESTINO:  '.$cepDestino.'<br>';
        echo 'VALOR:        '.$frete->Valor.'<br>';
        echo 'PRAZO:        '.$frete->PrazoEntrega.'<br>';
    }
}
