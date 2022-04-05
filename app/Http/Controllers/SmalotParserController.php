<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmalotParserController extends Controller
{
    public function smtparser()
    {
        // Parse PDF file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile('/path/to/document.pdf');

        $text = $pdf->getText();
        echo $text;
        return true;
    }
    
}
