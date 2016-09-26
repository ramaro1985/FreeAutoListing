<?php
/**
 * Created by PhpStorm.
 * User: rafael.leyva
 * Date: 12/10/2015
 * Time: 2:15 PM
 */

namespace Frontend\CommonBundle\Controller;

require_once("/../../../../vendor/tecnickcom/tcpdf/tcpdf.php");

class GetPdf
{

    private $pdf;

    public function __construct($context)
    {

        $this->pdf = $context->get("white_october.tcpdf")->create();
        // create new PDF document
        //$this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor('FreeAutoListing');
        $this->pdf->SetTitle('View your saved cars');
        $this->pdf->SetSubject('print your saved cars');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $this->pdf->SetHeaderData(PDF_HEADER_LOGO, 50, 'View your saved cars', "by freeautolisting - http://freeautolisting.com");

        // set header and footer fonts
        $this->pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    }

    /**
     * @return mixed
     */
    public function getPdfcreator()
    {
        return $this->pdf;
    }

} 