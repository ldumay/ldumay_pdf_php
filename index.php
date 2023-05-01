<?php
    //Liaison avec Composer
    include('vendor/autoload.php');

    // Importation de la méthode de création du PDF
    include('vendor/esiee/pdf_generator/src/esiee/pdf_generator/PdfGenerator.php');
    use pdf_generator\PdfGenerator;

    // Création du PDF
    $pdfGenerator = new PdfGenerator();

    // Configuration des informations du PDF
    $pdfGenerator->setPdfInformations(
        'Mon créateur de PDF', // Créateur
        'Moi-même', // Auteur
        'Mon premier PDF avec TCPDF', // Titre
        'Test - création - évènement - maître' // Sujet
    );

    // Configuration du PDF
    $pdfGenerator->setPdfConfig(
        6, // Sauts de ligne
        6 // Interlignes
    );

    // Configuration de TCPDF du PDF
    $pdfGenerator->setPdfConfigTcpdf(
        'P', // Orientation
        'mm', // Unité de mesure
        'A4', // Format
        'UTF-8' // Encodage
    );

    // Activation des bordures et des images
    $pdfGenerator->setPdfConfigTcpdfBorderAndImages(
        true,
        true
    );

    // Activation supplémentaires de TCPDF
    $pdfGenerator->setPdfConfigTcpdfMore(
        false, // Diskcache
        false, //Pdfa
        false //Pdfaauto
    );

    // Configuration du contenu de forme du PDF
    $pdfGenerator->setPdfParametresContenuForme(
        ['helvetica', '', 12], // Police
        [20, 20, 20, 20, true] // Marges
    );

    // Configuration du contenu de fond du PDF
    $pdfGenerator->setPdfParametresContenuFond(
        [
            'https://www.sorbonne.fr/wp-content/uploads/ENS_Logo_TL.jpg', // Logo
            30, // Taille du logo
            'ENS', // Créateur
            'https://planet-vie.ens.fr/' // Lien du créateur
        ],
        [
            'https://www.sorbonne.fr/wp-content/uploads/ENS_Logo_TL.jpg', // Logo
            30, // Taille du logo
            'ENS', // Créateur
            'https://planet-vie.ens.fr/' // Lien du créateur
        ]
    );

    // Configuration des pages de couvertures du PDF
    $pdfGenerator->setPagesCouvertures(
        true, // Page de garde
        true, // Page de séparation
        true, // Page de couverture
        true // Page de fin
    );

    // Configuration des pages du PDF
    $pdfGenerator->setContenu(
        [
            [
                'title' => 'Mon premier PDF avec TCPDF',
                'sub_title' => 'Création d\'un PDF avec TCPDF',
                'text' => 'Bonjour, voici mon premier PDF créé avec TCPDF !'
            ],
            [
                'title' => 'Mon premier PDF avec TCPDF',
                'sub_title' => 'Création d\'un PDF avec TCPDF',
                'text' => 'Bonjour, voici mon premier PDF créé avec TCPDF !'
            ]
        ]
    );

    // Création du PDF
    $pdfGenerator->generatePDF();

    print('PDF créé avec succès !');
    