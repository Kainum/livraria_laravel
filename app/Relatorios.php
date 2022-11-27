<?php

namespace App;

use App\fpdf185\FPDF;
use App\Models\Livro;

class Relatorios
{

    public static function relQtdEstoque(FPDF $pdf, int $maxResults = 100, bool $allZero = false) {
        if ($allZero) {
            $listaLivros = Livro::where('qtd_estoque', '=', 0)->orderBy('titulo')->get();
        } else {
            if ($maxResults <= 0) {
                $listaLivros = Livro::orderBy('qtd_estoque')->get();
            } else {
                $listaLivros = Livro::orderBy('qtd_estoque')->take($maxResults)->get();
            }
        }
        $fonte  = "Arial";
        $estilo = "B";
        $border = "1";

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(100, 13, "Produto", $border, 0, "L");

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(45, 13, "ISBN", $border, 0, "C");

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(45, 13, "Qtd. em estoque", $border, 1, "R");

        if (!$listaLivros->isEmpty()) {
            foreach($listaLivros as $item) {
                $pdf->SetFont($fonte, $estilo, 7);
                $pdf->Cell(100, 10, $item->titulo, $border, 0, "L");
    
                $pdf->SetFont($fonte, "", 7);
                $pdf->Cell(45, 10, $item->isbn, $border, 0, "C");
    
                $pdf->SetFont($fonte, "", 7);
                $pdf->Cell(45, 10, $item->qtd_estoque, $border, 1, "R");
            }
        } else {
            $pdf->SetFont($fonte, $estilo, 10);
            $pdf->Cell(190, 10, "Sem resultados", $border, 1, "C");
        }

        
    }

}