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
                'text' => 'Hoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.
                    Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, omnis nostrorum imperatorum, omnis exterarum gentium potentissimorumque populorum, omnis clarissimorum regum res gestas, cum tuis nec contentionum magnitudine nec numero proeliorum nec varietate regionum nec celeritate conficiendi nec dissimilitudine bellorum posse conferri; nec vero disiunctissimas terras citius passibus cuiusquam potuisse peragrari, quam tuis non dicam cursibus, sed victoriis lustratae sunt.
                    Nisi mihi Phaedrum, inquam, tu mentitum aut Zenonem putas, quorum utrumque audivi, cum mihi nihil sane praeter sedulitatem probarent, omnes mihi Epicuri sententiae satis notae sunt. atque eos, quos nominavi, cum Attico nostro frequenter audivi, cum miraretur ille quidem utrumque, Phaedrum autem etiam amaret, cotidieque inter nos ea, quae audiebamus, conferebamus, neque erat umquam controversia, quid ego intellegerem, sed quid probarem.
                    Excitavit hic ardor milites per municipia plurima, quae isdem conterminant, dispositos et castella, sed quisque serpentes latius pro viribus repellere moliens, nunc globis confertos, aliquotiens et dispersos multitudine superabatur ingenti, quae nata et educata inter editos recurvosque ambitus montium eos ut loca plana persultat et mollia, missilibus obvios eminus lacessens et ululatu truci perterrens.
                    Ex his quidam aeternitati se commendari posse per statuas aestimantes eas ardenter adfectant quasi plus praemii de figmentis aereis sensu carentibus adepturi, quam ex conscientia honeste recteque factorum, easque auro curant inbracteari, quod Acilio Glabrioni delatum est primo, cum consiliis armisque regem superasset Antiochum. quam autem sit pulchrum exigua haec spernentem et minima ad ascensus verae gloriae tendere longos et arduos, ut memorat vates Ascraeus, Censorius Cato monstravit. qui interrogatus quam ob rem inter multos... statuam non haberet malo inquit ambigere bonos quam ob rem id non meruerim, quam quod est gravius cur inpetraverim mussitare.
                    Ut enim benefici liberalesque sumus, non ut exigamus gratiam (neque enim beneficium faeneramur sed natura propensi ad liberalitatem sumus), sic amicitiam non spe mercedis adducti sed quod omnis eius fructus in ipso amore inest, expetendam putamus.
                    Quibus ita sceleste patratis Paulus cruore perfusus reversusque ad principis castra multos coopertos paene catenis adduxit in squalorem deiectos atque maestitiam, quorum adventu intendebantur eculei uncosque parabat carnifex et tormenta. et ex is proscripti sunt plures actique in exilium alii, non nullos gladii consumpsere poenales. nec enim quisquam facile meminit sub Constantio, ubi susurro tenus haec movebantur, quemquam absolutum.
                    Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.
                    Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.
                    Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.
                    
                    Nice !!!'
            ]
        ]
    );

    // Création du PDF
    $pdfGenerator->generatePDF();

    print('PDF créé avec succès !');
    