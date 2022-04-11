<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Classe para verificar se o arquivo PDF é texto ou imagem
 * @TODO Criar função para validar o arquivo e enviar para Controller correta, 
 * ImagemParaTextoController ou PdfParaTextoController
 * 
 */

class SmalotParserController extends Controller
{
    public function smtparser()
    {
        // Parse PDF file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();

        $pdf = $parser->parseFile('c:\projetos-git\inep.pdf');
        
        $text = $pdf->getText();
       
        if($text === 1)
        {
           /**
            * O teste de pdf para texto falhou, o PDF pode ser uma imagem.
            * @TODO ImagemParaTextoController
            */
        } else {
            /**
             * O teste foi validado, o arquivo é um PDF é texto
             * @TODO PdfParaTextoController 
             */
        }


        echo $text;
        return true;
    }
    
}
