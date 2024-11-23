$(document).ready(function (){
    /* START OF SCRIPT */


    const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    // Tableau contnenant les valeurs possibles pour A de la clé du chiffrement d'affine
    const affine_A_values = [1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25];


    $("#chiffrement").change(function (e) {
        select_val = $("#chiffrement").val();

        reset_input_cle();

        switch (select_val) {
            case 'cesar': input_cle_cesar(); break;
            case 'affine': input_cle_affine(); break;
        
        }

    });



    $("#btn-chiffrer").click(function () {
        // Récupérer le texte , supprimer les espaces et le mettre en majuscule
        texte_en_clair = normaliserChaine($("#txt-chiffrement").val().toUpperCase().split(" ").join("").trim());
        $("#txt-chiffrement").val(texte_en_clair)
        // Variable pour sauvegarder le msg chiffré
        msg_chiffre = '';

        // Récupérer le type de chiffrement
        val = $("#chiffrement").val();

        switch (val) {
            case 'cesar': chiffrement_cesar(); break;
            case 'affine': chiffrement_affine(); break;
        }
    });



    $("#btn-dechiffrer").click(function () {
        // Récupérer le texte , supprimer les espaces et le mettre en majuscule et le normaliser
        texte_chiffre = normaliserChaine($("#txt-dechiffrement").val().toUpperCase().split(" ").join("").trim());
        $("#txt-dechiffrement").val(texte_chiffre);
        
        // Variable pour sauvegarder le msg chiffré
        msg_en_clair = '';

        // Récupérer le type de chiffrement
        val = $("#chiffrement").val();

        switch (val) {
            case 'cesar': dechiffrement_cesar(); break;
            case 'affine': dechiffrement_affine(); break;
        }
    });


    /* ------------ Fonctions pour le changement du bloc de la clé selon le chiffrement ------------*/
    function reset_input_cle() {
        $("#cle").html("");
    }

    function input_cle_cesar() {

        block_cle = `<h5 class="text-center">Choisir une clé K <a class="question-cle" target="_blank" href="cours.php#Chiffrement_César">Plus d'infos</a></h5>`;
        block_cle += '<ul class="cle-number" id="cle-cesar">';
        for (i = 0; i < 26; i++) {
            block_cle += '<li>' + i + '</li>';
        }
        block_cle += '</ul>';

        $("#cle").html(block_cle);

        // click listener pour chaque <li>
        $('#cle-cesar > li').click(function () {
            $('#cle-cesar > li[selected-key]').removeAttr('selected-key');

            const clickedItemIndex = $(this).index();

            $('#cle-cesar > li').eq(clickedItemIndex).attr('selected-key', '');
        });

    }


    function input_cle_affine() {

        block_cle = '<h5 class="text-center">Choisir une clé K (K=(A,B))<a target="_blank" class="question-cle" href="cours.php#chiffrement_affine"> Plus d\'infos</a></h5>';

        block_cle += '<h4>A</h4>';
        block_cle += '<ul class="cle-number" id="cle-affine-a">';

        for (i = 0; i < affine_A_values.length; i++) {
            block_cle += '<li>' + affine_A_values[i] + '</li>';
        }
        block_cle += '</ul>';

        block_cle += '<h4>B</h4>';
        block_cle += '<ul class="cle-number" id="cle-affine-b">';

        for (i = 0; i < 26; i++) {
            block_cle += '<li>' + i + '</li>';
        }
        block_cle += '</ul>';

        $("#cle").html(block_cle);

        $('#cle-affine-a > li').click(function () {
            $('#cle-affine-a > li[selected-key]').removeAttr('selected-key');

            const clickedItemIndex = $(this).index();

            $('#cle-affine-a > li').eq(clickedItemIndex).attr('selected-key', '');
        });

        $('#cle-affine-b > li').click(function () {
            $('#cle-affine-b > li[selected-key]').removeAttr('selected-key');

            const clickedItemIndex = $(this).index();

            $('#cle-affine-b > li').eq(clickedItemIndex).attr('selected-key', '');  
        });
    }




    

   



    /* ------------ Fonctions de chiffrements ------------*/

    function chiffrement_cesar() {
        // Récupérer clé cesar
        K = $('#cle-cesar > li[selected-key]').text();

        if (K == '') K = 0;
        else {
            K = parseInt(K);

        }
        // Vérifier que la clé est correcte
        if (K > 25 || K < 0) {
            afficher_modal_erreur("Erreur de chiffrement", "Clé érronée (La clé doit être entre 0 et 25)");
        }

        // Parcours du msg à chiffrer
        for (i = 0; i < texte_en_clair.length; i++) {
            // L : Position de la lettre en clair
            L = alphabet.indexOf(texte_en_clair[i])

            // C : Nouvelle position de la lettre chiffrée
            C = (L + K) % 26;
            
            msg_chiffre += alphabet[C];

        }

        // Affichage du texte dans un text-area
        $("#txt-dechiffrement").val(msg_chiffre);
    }



    function chiffrement_affine() {
        // Récupérer clé affine
        A = $('#cle-affine-a > li[selected-key]').text();
        B = $('#cle-affine-b > li[selected-key]').text();


        if (A == '' || B == '') {
            A = 1;
            B = 0;
        }
        else {
            A = parseInt(A);
            B = parseInt(B);
        }
        // Vérifier que la clé est correcte
        if (!affine_A_values.includes(A)) {
            afficher_modal_erreur("Erreur de chiffrement", "Valeur de A incorrecte (A doit être premier avec 26)");
        }

        if (B > 25 || B < 0) {
            afficher_modal_erreur("Erreur de chiffrement", "Valeur de B incorrecte (B doit être entre 0 et 25)");
        }


        // Parcours du msg à chiffrer
        for (i = 0; i < texte_en_clair.length; i++) {
            // L : Position de la lettre en clar
            L = alphabet.indexOf(texte_en_clair[i])

            // C : Nouvelle position de la lettre chiffrée
            C = (A * L + B) % 26;

            msg_chiffre += alphabet[C];

        }

        // Affichage du texte dans un text-area
        $("#txt-dechiffrement").val(msg_chiffre);
    };



    /* ------------ Fonctions de déchiffrements ------------*/

    function dechiffrement_cesar() {
        // Récupérer clé cesar
        K = $('#cle-cesar > li[selected-key]').text();

        if (K == '') K = 0;
        else {
            K = parseInt(K);

        }
        // Vérifier que la clé est correcte
        if (K > 25 || K < 0) {
            afficher_modal_erreur("Erreur de dechiffrement", "Clé érronée (La clé doit être entre 0 et 25)");
        }

        // Parcours du msg à déchiffrer
        for (i = 0; i < texte_chiffre.length; i++) {
            // C : Position de la lettre chifrée

            C = alphabet.indexOf(texte_chiffre[i])

            // L : Nouvelle position de la lettre en clair
            L = (C - K) % 26;
            if (L < 0) {
                L = L + 26;
            }

            msg_en_clair += alphabet[L];

        }

        // Affichage du texte dans un text-area

        $("#txt-chiffrement").val(msg_en_clair);
    };

    function dechiffrement_affine() {
        // Récupérer clé affine
        A = $('#cle-affine-a > li[selected-key]').text();
        B = $('#cle-affine-b > li[selected-key]').text();


        if (A == '' || B == '') {
            A = 1;
            B = 0;
        }
        else {
            A = parseInt(A);
            B = parseInt(B);
        }
        // Vérifier que la clé est correcte
        if (!affine_A_values.includes(A)) {
            afficher_modal_erreur("Erreur de déchiffrement", "Valeur de A incorrecte (A doit être premier avec 26)");
        }

        if (B > 25 || B < 0) {
            afficher_modal_erreur("Erreur de déchiffrement", "Valeur de B incorrecte (B doit être entre 0 et 25)");
        }


        // Parcours du msg à déchiffrer
        for (i = 0; i < texte_chiffre.length; i++) {
            // L : Position de la lettre chiffrée
            C = alphabet.indexOf(texte_chiffre[i])

            // C : Nouvelle position de la lettre en clair
            L = (inverse_modulaire(A, 26) * (C - B)) % 26;

            if (L < 0) {
                L = L + 26;
            }
            msg_en_clair += alphabet[L];

        }

        // Affichage du texte dans un text-area
        $("#txt-chiffrement").val(msg_en_clair);
    };





    /* ---------------------------------------- Fonctions outils ----------------------------------------

    /* Message d'erreur sous forme d'un Modal */
    function afficher_modal_erreur(titre, msg) {
        $("#exampleModalToggleLabel").text(titre);
        $(".modal-body").text(msg);
        $("#exampleModalToggle").modal('toggle');
    }



    /*
        algorithme d'euclide etendu pour résoudre les fonctions de la forme : aX - bY = 1 (a et b connus)
    */
    function euclide_etendu(a, b) {
        // Initialisation
        let x = 0, y = 1, u = 1, v = 0;
        // Itération
        while (a !== 0) {
            const q = Math.floor(b / a);
            const r = b % a;
            const m = x - u * q;
            const n = y - v * q;
            // Mise à jour des variables
            b = a;
            a = r;
            x = u;
            y = v;
            u = m;
            v = n;
        }
        // Résultats
        const gcd = b;
        const coefficients = [x, y];
        return coefficients;
    }




    /*
    calcule l'inverse modulaire
    paramétres : 
        a : le chiffre dont l'inverse modulaire est recherché
        m : modulo
    */
    function inverse_modulaire(a, m) {
        const [x, y] = euclide_etendu(a, m);
        if (x < 0) {
            return (x % m + m) % m;
        } else {
            return x;
        }
    }



    /* Fonction qui élimine les accents et normalise une chaine */
    function normaliserChaine(chaine) {
        // replace accents with their corresponding letters
        chaine = chaine.normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        // remove symbols, apostrophes, and numbers
        chaine = chaine.replace(/[^\w\s]|[\d]|_/gi, "");

        return chaine;
    }


    // Fonction qui supprime les doublons de lettres dans une chaine de caractéres
    function supprimer_doublons(chaine) {
        let unique = '';
        for (let i = 0; i < chaine.length; i++) {
            if (unique.indexOf(chaine[i]) === -1) {
                unique += chaine[i];
            }
        }
        return unique;
    }


    /* Fonction qui rempli une matrice 5x5 avec le reste de l'alphabet d'une clé donnée 
        Exemple  :  • clé = "maman" => suppression doublons => cle devient "man"
                    • remplir les trois premiers cases par "M" "A" "N"
                    • remplir le reste des cases avec l'alphabet restant en enlevant "M" "A" "N"
    */
    function remplir_matrice_playfair(cle) {
        // Supprimer les doublons de la clé 
        // Exemple : "chiffrement" devient "chifremnt" 
        cle_nettoyee = supprimer_doublons(cle);

        longueur_text = cle_nettoyee.length;

        // alphabet sans le W
        alphabet_playfair_fr = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "X", "Y", "Z"]

        // init mat
        mat = [[], [], [], [], []];

        // compteur pour insérer la clé dans la matrice
        cpt = 0;

        i = 0;

        while (i < 5 && cpt < longueur_text) {
            j = 0;
            while (j < 5 && cpt < longueur_text) {
                // Ajout de la lettre à la matrice
                mat[i][j] = cle_nettoyee[cpt];
                // Supression de la lettre depuis l'alphabet_playfair_fr
                alphabet_playfair_fr = alphabet_playfair_fr.filter(item => item !== cle_nettoyee[cpt]);
                cpt++;
                j++;
            }

            // Si on a fini d'insérer la clé on sort de la boucle
            if (cpt >= longueur_text) break;
            i++;
        }



        // Compléter avec le reste de l'alphabet_playfair_fr restant
        while (i < 5) {
            while (j < 5) {
                // Extraction du premier élément du tableau et 
                mat[i][j] = alphabet_playfair_fr.shift();
                j++;
            }
            i++;
            j = 0;
        }

        console.table(mat)
    }



    /* END OF SCRIPT */

    
});



