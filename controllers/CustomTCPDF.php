<?php

namespace controllers;

use TCPDF;

class CustomTCPDF extends TCPDF
{
    private $pdf_createur;
    private $pdf_auteur;
    private $pdf_titre;
    private $pdf_sujet;

    // Header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function SetPdfInformations($pdf_createur, $pdf_auteur, $pdf_titre, $pdf_sujet)
    {
        $this->pdf_createur = $pdf_createur;
        $this->pdf_auteur = $pdf_auteur;
        $this->pdf_titre = $pdf_titre;
        $this->pdf_sujet = $pdf_sujet;
    }
}