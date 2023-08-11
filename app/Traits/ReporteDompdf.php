<?php

namespace App\Traits;

// use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

use PDF;

trait ReporteDompdf
{


    public function generatePdf($data, $tituloColumna2, $altura, $titulosColumnas)
    {
        $pdf = new Dompdf();
    
        // Configuración opcional de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $pdf->setOptions($options);
    
        // Agregar evento para obtener numeración de página
        $pdf->getCanvas()->page_script([$this, 'setPageNumber']);
    
        // Construir el contenido del PDF
        $content = $this->buildPdfContent($data, $tituloColumna2, $altura, $titulosColumnas);
    
        // Agregar estilo para cambiar la fuente a Arial
        $style = '<style>body { font-family: Arial, sans-serif; }</style>';
        $pdf->loadHtml($style . $content);
    
        $pdf->render();
    
        return $pdf->output();
    }

    public function setPageNumber($pageNumber, $pageCount)
    {
        $this->pageNumber = $pageNumber;
        $this->pageCount = $pageCount;
    }

    protected function buildPdfContent($data, $tituloColumna2, $altura, $titulosColumnas)
    {
        $content = '';

        // Pintar el encabezado en la primera página
        $content .= $this->pintarEncabezadoPdf($tituloColumna2, $altura);

        // Resto del contenido del PDF
        $content = $this->pintarEncabezadoPdf($tituloColumna2, $altura);
        $content .= $this->pintarCabeceraColumnasPdf($titulosColumnas);
        $content .= $this->pintarRegistrosPdf($data, $titulosColumnas);
        $content .= $this->pintarListadoPdf();
        $content .= $this->pintarFooterPdf();

        return $content;
    }

    // Archivo de los logos de los reportes


    protected function pintarEncabezadoPdf($tituloColumna2, $altura)
    {
        include(public_path('img/imagenes.php'));
        //  dd(asset('public/img/fondonorma.jpg'));
        // Lógica para pintar el encabezado del PDF
        $html = '<table style="width: 100%; border-collapse: collapse;">';

        // Fila con altura del 15% de la página
        $html .= '<tr style="">';

        // Primera columna con ancho del 25%
        $html .= '<td style="width: 25%; text-align: center; max-height: ' . $altura . 'px;">';
        // $html .= '<img src="{{asset("img/favico.png")}}" alt="Imagen" style="max-width: 100%; height: auto;">';
        // $html .= '<img src="' . asset('/img/favico.png') . '" alt="Imagen" style="max-width: 100%; height: auto;">';
        $html .= '<img src="' . $logos . '" alt="Imagen" style="max-width: 50px; height: 50px;">';
        $html .= '<p style="margin-top: 5px;">Administrador de Sistema</p>';
        $html .= '</td>';

        // Segunda columna con ancho del 50%
        $html .= '<td style="width: 50%; text-align: center; max-height: ' . $altura . 'px;">';
        $html .= '<h1> HIDROBOLIVAR </h1>';
        $html .= '<h3>' . $tituloColumna2 . '</h3>';
        $html .= '</td>';

        // Tercera columna con ancho del 25%
        $html .= '<td style="width: 25%; text-align: right; max-height: ' . $altura . 'px;">';
        // Mostrar numeración de página manualmente
        $html .= '<p>Página ' . $this->pageNumber . ' de ' . $this->pageCount . '</p>';
        $html .= '<p>Fecha: ' . date('Y-m-d') . '</p>';
        $html .= '<p>Hora: ' . date('H:i:s') . '</p>';
        $html .= '</td>';

        $html .= '</tr>';
        $html .= '</table>';

        return $html;
    }

    protected function pintarCabeceraColumnasPdf($titulosColumnas)
    {
        $html = '<table style="width: 100%; border-collapse: collapse;"><thead><tr>';

        foreach ($titulosColumnas as $titulo => $size) {
            $html .= '<th style="width: ' . $size . ';border: 1px solid black; text-align: center; font-weight: bold;">' . $titulo . '</th>';
        }

        $html .= '</tr></thead></table>';

        return $html;
        // $cantidadColumnas = count($titulosColumnas);

        // $html = '<table style="width: 100%; border-collapse: collapse;"><thead><tr>';

        // foreach ($titulosColumnas as $titulo) {
        //     $html .= '<th style="border: 1px solid black; text-align: center; font-weight: bold;">' . $titulo . '</th>';
        // }

        // $html .= '</tr></thead></table>';

        // return $html;
    }

    protected function pintarRegistrosPdf($data, $titulosColumnas)
    {
        // Lógica para pintar los registros en el PDF
        $content = '<table style="width: 100%; border-collapse: collapse;"><tbody>';
        // dd($data);
        foreach ($data as $registro) {
            $content .= '<tr>';

            foreach ($titulosColumnas as $titulo => $size) {
                $content .= '<td style="width: ' . $size . '; border: 1px solid black; text-align: center;">' . $registro[$titulo] . '</td>';
            }

            $content .= '</tr>';
        }

        $content .= '</tbody></table>';

        return $content;
        // // Lógica para pintar los registros en el PDF
        // $content = '<table style="width: 100%; border-collapse: collapse;"><tbody>';

        // foreach ($data as $registro) {
        //     $content .= '<tr>';

        //     foreach ($columnasReferencia as $columna) {
        //         $content .= '<td style="border: 1px solid black; text-align: center;">' . $registro[$columna] . '</td>';
        //     }

        //     $content .= '</tr>';
        // }

        // $content .= '</tbody></table>';

        // return $content;
    }
    // protected function pintarRegistrosPdf($data)
    // {
    //     // Lógica para pintar los registros en el PDF
    //     $content = '<table style="width: 100%; border-collapse: collapse;"><tbody>';
    //     foreach ($data as $record) {
    //         $content .= '<tr><td>' . $record['column1'] . '</td><td>' . $record['column2'] . '</td></tr>';
    //     }
    //     $content .= '</tbody></table>';

    //     return $content;
    // }

    protected function pintarListadoPdf()
    {
        // Lógica para pintar el listado en el PDF
        return '<ul><li>Elemento 1</li><li>Elemento 2</li></ul>';
    }

    protected function pintarFooterPdf()
    {
        // Lógica para pintar el pie de página del PDF
        return '<footer>Pie de página del PDF</footer>';
    }
}
// {
//     public function generatePdf($data, $viewPath, $fileName)
//     {
//         $pdf = PDF::loadView($viewPath, ['data' => $data]);
//         return $pdf->download($fileName);
//     }

//     public function pintar_encabezado_pdf($pdf, $data)
//     {
//         $pdf->getCanvas()->page_text(270, 18, "Página: {PAGE_NUM} de {PAGE_COUNT}", null, 10, [0, 0, 0]);

//         $font = ['family' => 'Arial', 'style' => 'B', 'size' => 10];
//         $pdf->SetFont($font['family'], $font['style'], $font['size']);
    
//         $pdf->text(20, 20, utf8_decode($data['gerencia']));
//         $pdf->text(20, 25, utf8_decode($data['division']));
    
//         $pdf->SetFont($font['family'], $font['style'], $font['size'] + 2);
//         $pdf->text(105, 20, utf8_decode($data['titulo']), null, null, 'C');
//         $pdf->text(105, 25, utf8_decode($data['subtitulo']), null, null, 'C');
//     }

//     public function pintar_cabecera_columnas_pdf($pdf, $data, $setX = true)
//     {
//         $y = $pdf->getCanvas()->get_height() - 40;

//         $font = ['family' => 'Arial', 'style' => 'B', 'size' => 10];
//         $pdf->setFont($font['family'], $font['style'], $font['size']);

//         $x = $setX ? ($data['orientacion'] == 'H' ? 20 : 15) : $pdf->getCanvas()->get_width() / 2;
//         $columnSpacing = $data['orientacion'] == 'H' ? 30 : 15;

//         foreach ($data['nombre_columnas'] as $nombreColumna) {
//             $pdf->text($x, $y, utf8_decode($nombreColumna), null, null, 'C');
//             $x += $columnSpacing;
//         }

//         $pdf->line(20, $y + 5, $pdf->getCanvas()->get_width() - 20, $y + 5);
//     }

//     public function pintar_registros_pdf($pdf, $data, $registros, $setX = true)
//     {
//         $font = ['family' => 'Arial', 'style' => '', 'size' => 10];
//         $pdf->setFont($font['family'], $font['style'], $font['size']);

//         $y = $pdf->getCanvas()->get_height() - 50;
//         $columnSpacing = $data['orientacion'] == 'H' ? 30 : 15;

//         foreach ($registros as $registro) {
//             $x = $setX ? ($data['orientacion'] == 'H' ? 20 : 15) : $pdf->getCanvas()->get_width() / 2;

//             foreach ($registro as $campo) {
//                 $pdf->text($x, $y, utf8_decode($campo), null, null, 'C');
//                 $x += $columnSpacing;
//             }

//             $y -= 15;
//         }
//     }

//     public function pintar_listado_pdf($data)
//     {
//         $pdf = PDF::loadView('pdf.template', ['data' => $data]);
//         return $pdf->download('report.pdf');
//     }

//     public function pintar_footer_pdf($pdf, $data)
//     {
//         $pdf->setFooter(function ($footer) use ($data) {
//             $footer->text('Usuario: ' . $data['usuario'], 50, 770);
//             $footer->text('Código de Reporte: ' . $data['cod_reporte'], 200, 770);
//             // Puedes agregar más contenido aquí según tus necesidades
//         });
//     }
// }
