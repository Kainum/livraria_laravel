<?php

namespace App\Http\Controllers;

use App\fpdf185\FPDF;
use App\Relatorios;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    //

    public function relatorioEstoque () {
        return view('relatorios.rel_estoque');
    }

    public function gerarRelEstoque (Request $request) {
        $req = $request->all();

        $arquivo    = "relatorio_qtd_estoque.pdf";
        $maxResults = $req['maxResults'];
        $allZero    = isset($req['allZero']);

        // =====================================

        $pdf = new FPDF();
        $pdf->AddPage("P");
        
        $tipo_pdf = "D";

        Relatorios::relQtdEstoque($pdf, $maxResults, $allZero);

        $pdf->Output($arquivo, $tipo_pdf);
    }

    public function relatorioVendasPeriodo () {
        return view('relatorios.rel_qtd_vendas_periodo');
    }

    public function gerarRelVendasPeriodo (Request $request) {
        $req = $request->all();

        $arquivo    = "relatorio_vendas_periodo.pdf";
        $dataInicio = $req['dataInicio'];
        $dataFim    = $req['dataFim'];

        // =====================================

        $pdf = new FPDF();
        $pdf->AddPage("P");
        
        $tipo_pdf = "D";

        Relatorios::relMaisVendidosPeriodo($pdf, $dataInicio, $dataFim);

        $pdf->Output($arquivo, $tipo_pdf);
    }
}
