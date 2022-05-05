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
       //dd(public_path() . "/storage/pdf/SENTENCA_2021.pdf");
        
        $pathToPdf = public_path() . "/storage/pdf/SENTENCA_2021.pdf" ;
        $pathToWhereImageShouldBeStored = public_path() . "/storage/pdf/img";
        $pdf = new Pdf($pathToPdf);

        /**
         * Iteração para renderizar todas as páginas do pdf
         * @TODO MOVER O TRECHO DE CÓDIGO PARA A CAMADA DE SERVIÇO (services)
         */
        $quantidadeDePaginas = $pdf->getNumberOfPages();

        for( $i = 1; $i <= $quantidadeDePaginas; $i++)
        {
            $pathToWhereImageShouldBeStored = public_path() . "/storage/pdf/img_" . $i . ".jpg";
            $pdf->setPage($i)->saveImage($pathToWhereImageShouldBeStored);
            echo "Imagem Salva: " . $pathToWhereImageShouldBeStored . "\n";

        }

        return "Imagens geradas com sucesso!";


    }
        
}
