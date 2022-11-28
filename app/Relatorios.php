<?php

namespace App;

use App\fpdf185\FPDF;
use App\Models\Livro;
use App\Models\Pedido;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Relatorios
{

    public static function relQtdEstoque(FPDF $pdf, int $maxResults = 100, bool $allZero = false) {
        if ($allZero) {
            $resultado = Livro::where('qtd_estoque', '=', 0)->orderBy('titulo')->get();
        } else {
            if ($maxResults <= 0) {
                $resultado = Livro::orderBy('qtd_estoque')->get();
            } else {
                $resultado = Livro::orderBy('qtd_estoque')->take($maxResults)->get();
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

        if (!$resultado->isEmpty()) {
            foreach($resultado as $item) {
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

    public static function relMaisVendidosPeriodo(FPDF $pdf, $dataInicio, $dataFim) {
        
        $resultado = DB::table('pedidos')
            ->join('item_pedidos', 'pedidos.id', '=', 'item_pedidos.pedido_id')
            ->join('livros', 'item_pedidos.produto_id', '=', 'livros.id')
            ->selectRaw('livros.titulo, sum(item_pedidos.qtd) as qtd')
            ->whereBetween('pedidos.data_pedido', [$dataInicio, $dataFim])
            ->groupBy('livros.titulo')
            ->orderBy('qtd', 'DESC')
            ->get();
        
        $fonte  = "Arial";
        $estilo = "B";
        $border = "1";

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(190, 15, "Produtos Mais Vendidos: ".Carbon::parse($dataInicio)->format('d/m/Y')." ~ ".Carbon::parse($dataFim)->format('d/m/Y'), $border, 1, "C");

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(145, 13, "Produto", $border, 0, "L");

        $pdf->SetFont($fonte, $estilo, 10);
        $pdf->Cell(45, 13, "Qtd. vendida", $border, 1, "R");

        if (!$resultado->isEmpty()) {
            foreach($resultado as $item) {
                $pdf->SetFont($fonte, $estilo, 7);
                $pdf->Cell(145, 10, $item->titulo, $border, 0, "L");
    
                $pdf->SetFont($fonte, "", 7);
                $pdf->Cell(45, 10, $item->qtd, $border, 1, "R");
            }
        } else {
            $pdf->SetFont($fonte, $estilo, 10);
            $pdf->Cell(190, 10, "Sem resultados", $border, 1, "C");
        }
        
    }

}