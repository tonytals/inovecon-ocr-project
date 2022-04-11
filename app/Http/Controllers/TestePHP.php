<?php

namespace App\Http\Controllers;

//use Dotenv\Loader\Parser;
use Illuminate\Http\Request;
//use ;


class TestePHP extends Controller
{
    public function teste()
    {
    // Parse PDF file and build necessary objects.
    $testePhp = new \Smalot\PdfParser\Parser();
    $pdf = $testePhp->parseFile('/path/to/document.pdf');
    $text = $pdf->getText();
    echo $text;
    }

}


