<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfParaTextoController extends Controller
{
    public function pdfParaTexto()
    {
     /**
     * Controller efetua a conversão de PDF para texto
     */
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile('c:\projetos-git\inep.pdf');
        $text = $pdf->getText();

    }

   
}
