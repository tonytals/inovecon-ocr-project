<?php

namespace App\Http\Controllers;

use Alimranahmed\LaraOCR\Facades\OCR;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToImage\Pdf;


class PdfParaImagemController extends Controller
{

    /**
     * Método para converter PDF em IMAGEM
     *
     * @return string
     * @throws \Spatie\PdfToImage\Exceptions\PageDoesNotExist
     * @throws \Spatie\PdfToImage\Exceptions\PdfDoesNotExist
     *
     */
    public function PdFParaImagem($filename)
    {
       //dd(public_path() . "/storage/pdf/SENTENCA_2021.pdf");
        //dd(str_replace('.pdf', '', $filename));

        $pathToPdf = public_path() . "/storage/pdf/";
        $pathToWhereImageShouldBeStored = public_path() . "/storage/pdf/img";
        $pdf = new Pdf($pathToPdf . $filename);

        //dd(!Storage::directories(str_replace('.pdf', '', $pathToPdf . $filename)));

        /**
         * Cria diretório com nome do arquivo caso não exista
         */
        if(!Storage::disk('public')->directories(str_replace('.pdf', '', $filename))){

            Storage::disk('public')->makeDirectory(str_replace('.pdf', '', $filename), 0777, true, true);
            Storage::disk('public')->makeDirectory(str_replace('.pdf', '', $filename . "/img"), 0777, true, true);

            Storage::disk('public')->makeDirectory(str_replace('.pdf', '', $filename . "/texto"), 0777, true, true);

        }

        /**
         * Iteração para renderizar todas as páginas do pdf
         * @TODO MOVER O TRECHO DE CÓDIGO PARA A CAMADA DE SERVIÇO (services)
         */
        $quantidadeDePaginas = $pdf->getNumberOfPages();

        for( $i = 1; $i <= $quantidadeDePaginas; $i++)
        {
            $pathToWhereImageShouldBeStored = public_path() . "/storage/". str_replace('.pdf', '', $filename) ."/img/" . str_replace('.pdf', '', $filename) . "_" . $i . ".jpg";
            $pdf->setPage($i)->saveImage($pathToWhereImageShouldBeStored);
            echo "Imagem Salva: " . $pathToWhereImageShouldBeStored . "\n";
            echo "<br/>";

            Storage::disk('public')->put(str_replace('.pdf', '', $filename) . "/texto/" . str_replace('.pdf', '', $filename) . "_" . $i . ".txt", OCR::scan($pathToWhereImageShouldBeStored));

            echo "Imagem Para Texto: " . str_replace('.jpg', '.txt', str_replace('/img/', '/texto/', $pathToWhereImageShouldBeStored)) . "\n";
            echo "<br/>";

        }

        return "Imagens geradas com sucesso!";


    }
        
}
