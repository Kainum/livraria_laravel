<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Psy\debug;

class Correios extends Model
{
    // Url base da API dos correios
    const URL_BASE = 'http://ws.correios.com.br';

    /** Código de serviço dos Correios */
    const SERVICO_SEDEX         = '04014';
    const SERVICO_SEDEX_12      = '04782';
    const SERVICO_SEDEX_10      = '04790';
    const SERVICO_SEDEX_HOJE    = '04804';
    const SERVICO_PAC           = '04510';

    /** Código de formato dos Correios */
    const FORMATO_CAIXA_PACOTE  = 1;
    const FORMATO_ROLO_PRISMA   = 2;
    const FORMATO_ENVELOPE      = 3;

    private $codEmpresa = '';
    private $senhaEmpresa = '';

    public function __construct($codEmpresa = '', $senhaEmpresa = '') 
    {
        $this->codEmpresa = $codEmpresa;
        $this->senhaEmpresa = $senhaEmpresa;
    }


    public function calcularFrete($codServico, $cepOrigem, $cepDestino,
                                $peso, $formato, $comprimento, $altura, $largura, $diametro = 0,
                                $maoPropria = false, $valorDeclarado = 0, $avisoRecebimento = false)
    {
        $parametros = [
            'nCdEmpresa'    => $this->codEmpresa,
            'sDsSenha'      => $this->senhaEmpresa,
            'nCdServico'    => $codServico,
            'sCepOrigem'    => $cepOrigem,
            'sCepDestino'   => $cepDestino,
            'nVlPeso'       => $peso,
            'nCdFormato'    => $formato,
            'nVlComprimento'=> $comprimento,
            'nVlAltura'     => $altura,
            'nVlLargura'    => $largura,
            'nVlDiametro'   => $diametro,
            'sCdMaoPropria' => $maoPropria ? 'S' : 'N',
            'nVlValorDeclarado'     => $valorDeclarado,
            'sCdAvisoRecebimento'   => $avisoRecebimento ? 'S' : 'N',
            'StrRetorno'    => 'xml',
        ];

        //QUERY
        $query = http_build_query($parametros);
        
        $resultado = $this->get('/calculador/CalcPrecoPrazo.aspx?'.$query);

        return $resultado ? $resultado->cServico : null;
    }

    /** metodo responsável por executar a consulta GET no webservice dos Correios */
    public function get($resource) {
        //ENDPOINT
        $endPoint = self::URL_BASE.$resource;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $endPoint,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'GET',
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        // retorna o xml
        return strlen($response) ? simplexml_load_string($response) : null;
    }

}
