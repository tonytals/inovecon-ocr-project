<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;


class PdfParaImagemController extends Controller
{
    public function PdFParaImagem()
    {
       // dd(public_path() . "\storage\pdf\SENTENCA_2021.pdf");            
        
        $pathToPdf = public_path() . "\storage\pdf\SENTENCA_2021.pdf" ;
        $pathToWhereImageShouldBeStored = public_path() . "\storage\pdf\img";
        $pdf = new Pdf($pathToPdf);
        $pdf->saveImage($pathToWhereImageShouldBeStored);

    }
        
}
