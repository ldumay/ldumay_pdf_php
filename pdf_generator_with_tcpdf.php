<?php
    // Importation de la classe CustomTCPDF
    //use CustomTCPDF;
    //use esiee_2023_pdf_generator\esiee\pdf_generator\CustomTCPDF;
    //include('vendor\esiee\pdf_generator\src\esiee\pdf_generator\CustomTCPDF.php');
    include('vendor/esiee/pdf_generator/src/esiee/pdf_generator/CustomTCPDF.php');

/**
     * Méthode de création du PDF avec TCPDF
     * 
     * Paramètres :
     *  - Contenu :
     *      - Police
     *      - Marges
     *  - Orientation :
     *      - Portrait
     *      - Paysage
     *  - Taille : 
     *      - A3
     *      - A4
     *      - A5
     *  - Ensemble de pages :
     *      - Page de garde
     *      - Page de séparation
     *      - Page de couvertures
     *      - Haut de page
     *      - Page de fin
     * 
     * Informations du PDF :
     * - Créateur
     * - Auteur
     */

    function pdfGenerator($datas){

        // Initialisation du PDF avec TCPDF
        $pdf = new CustomTCPDF(
            $datas['pdf_config_tcpdf']['orientation'], // Orientation
            $datas['pdf_config_tcpdf']['unit'], // Unité de mesure
            $datas['pdf_config_tcpdf']['format'], // Format
            true, // Permet de gérer les en-têtes et pieds de page
            $datas['pdf_config_tcpdf']['encoding'], // Permet de gérer les accents
            false // Permet de ne pas afficher les images
        );

        $pdf->Header();

        // ---[ Configuration des informations du PDF ]---
        $pdf->SetCreator($datas['pdf_informations']['createur']);
        $pdf->SetAuthor($datas['pdf_informations']['auteur']);
        $pdf->SetTitle($datas['pdf_informations']['titre']);
        $pdf->SetSubject($datas['pdf_informations']['sujet']);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        $pdf->AddPage();
        
        // ---[ Configuration des paramètres du PDF ]---
        /**
         * Configuration de la police
         * boolean $subsetting - Sous-ensemble
         */
        $pdf->setFontSubsetting(true);
        /**
         * Configuration de la police
         * string $family - Police
         * string $style - Style
         * string $size - Taille
         */
        $pdf->SetFont(
            $datas['pdf_parametres']['contenu']['police'][0],
            $datas['pdf_parametres']['contenu']['police'][1],
            $datas['pdf_parametres']['contenu']['police'][2]
        );

        /**
         * Configuration des marges
         * int $left - Gauche
         * int $top - Haut
         * int $right - Droite
         * int $bottom - Bas
         * boolean $setAutoPageBreak
         */
        $pdf->SetMargins(
            $datas['pdf_parametres']['contenu']['marges'][0],
            $datas['pdf_parametres']['contenu']['marges'][1],
            $datas['pdf_parametres']['contenu']['marges'][2],
            $datas['pdf_parametres']['contenu']['marges'][3]
        );

        $pdf->Cell(0, 10, $datas['pdf_contenu']['texte'], 0, 1);

        // ---[ Préparation du titre du PDF ]---
        /**
         * Remplacement des espaces, des accents et des caractères spéciaux
         * par des underscores.
         */
        $titre = $datas['pdf_informations']['titre'];
        $occurences = [' ', 'é', 'è', 'ê', 'ë', 'à', 'â', 'ä', 'ù', 'û', 'ü', 'ô', 'ö', 'î', 'ï', 'ç', '!', '?', '.', ',', ';', ':', '/', '\\', '(', ')', '[', ']', '{', '}', '<', '>', '"', "'", '°', '²', '³', '€', '$', '£', '¤', 'µ', '§', '°', '²', '³', '€', '$', '£', '¤', 'µ', '§'];
        $remplacement = ['_', 'e', 'e', 'e', 'e', 'a', 'a', 'a', 'u', 'u', 'u', 'o', 'o', 'i', 'i', 'c'];
        foreach ($occurences as $occurence) {
            $titre = str_replace($occurence, $remplacement[$key], $titre);
            //-
            //$newTitre = str_replace(' ', '_', $titre);
        }

        // ---[ Configuration du Haut et du Bas de page ]---
        /**
         * Configuration du Haut de page
         */
        $pdf->SetHeaderData(
            $datas['pdf_parametres']['ensemble_pages']['haut_page']['logo'], // Logo
            $datas['pdf_parametres']['ensemble_pages']['haut_page']['logo_width'], // Largeur du logo
            $datas['pdf_parametres']['ensemble_pages']['haut_page']['titre'], // Titre
            $datas['pdf_parametres']['ensemble_pages']['haut_page']['sous_titre'] // Sous-titre
        );
        /**
         * Configuration du Bas de page
         */
        $pdf->setFooterData(
            $datas['pdf_parametres']['ensemble_pages']['bas_page']['logo'], // Logo
            $datas['pdf_parametres']['ensemble_pages']['bas_page']['logo_width'], // Largeur du logo
            $datas['pdf_parametres']['ensemble_pages']['bas_page']['titre'], // Titre
            $datas['pdf_parametres']['ensemble_pages']['bas_page']['sous_titre'] // Sous-titre
        );

        // ---[ Génération du PDF ]---
        $pdf->Output($titre.'.pdf', 'D');
    }