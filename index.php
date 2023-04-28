<?php
    //Liaison avec Composer
    include('vendor/autoload.php');

    // Importation de la méthode de création du PDF
    include('pdf_generator_with_tcpdf.php');

    $pdf_createur = 'Mon créateur de PDF';
    $pdf_auteur = 'Moi-même';
    $pdf_titre = 'Mon premier PDF avec TCPDF';
    $pdf_sujet = 'Test - création - évènement - maître';

    $pdf_config_tcpdf_orientation = 'P';
    $pdf_config_tcpdf_format = 'A4';
    $pdf_config_tcpdf_encoding = 'UTF-8';

    $pdf_parametres_contenu_police = ['helvetica', '', 14];
    $pdf_parametres_contenu_marges = [20, 20, 20, 20, true];

    $pdf_parametres_contenu_header = [
        'https://planet-vie.ens.fr/themes/custom/ens_bio/images/logo_bio.svg',
        30,
        $pdf_createur,
        'https://planet-vie.ens.fr/'
    ];
    $pdf_parametres_contenu_bottom = [
            'https://planet-vie.ens.fr/themes/custom/ens_bio/images/logo_bio.svg',
            30,
            $pdf_createur,
            'https://planet-vie.ens.fr/'
        ];

    $datas = [
        'pdf_config_tcpdf' => [
            'orientation' => $pdf_config_tcpdf_orientation,
            'unit' => 'mm',
            'format' => $pdf_config_tcpdf_format,
            'unicode' => true,
            'encoding' => $pdf_config_tcpdf_encoding,
            'diskcache' => false,
            'pdfa' => false,
            'pdfaauto' => false
        ],
        'pdf_parametres' => [
            'contenu' => [
                'police' => $pdf_parametres_contenu_police,
                'marges' => $pdf_parametres_contenu_marges
            ],
            'ensemble_pages' => [
                'page_garde' => true,
                'page_separation' => true,
                'page_couvertures' => true,
                'page_fin' => true,
                'haut_page' => $pdf_parametres_contenu_header,
                'pied_page' => $pdf_parametres_contenu_bottom
            ]
        ],
        'pdf_informations' => [
            'createur' => $pdf_createur,
            'auteur' => $pdf_auteur,
            'titre' => $pdf_titre,
            'sujet' => $pdf_sujet
        ],
        'pdf_contenu' => [
            'texte' => 'Bonjour, voici mon premier PDF créé avec TCPDF!'
        ]
    ];

    //$test = new CustomTCPDF();

    pdfGenerator($datas);
    
    print('<a href="mon_premier_pdf.pdf">PDF</a>');
    