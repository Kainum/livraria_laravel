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

        $arquivo = "relatorio_qtd_estoque.pdf";
        $maxResults =   $req['maxResults'];
        $allZero =      isset($req['allZero']);

        // =====================================

        $pdf = new FPDF();
        $pdf->AddPage("P");
        
        $tipo_pdf = "D";

        Relatorios::relQtdEstoque($pdf, $maxResults, $allZero);

        $pdf->Output($arquivo, $tipo_pdf);
    }
}
