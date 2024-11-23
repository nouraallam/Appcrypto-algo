$(document).ready(function () {
    /* START OF SCRIPT */

    // Utilisé pour décalage dans l'alphabet
    indice_alphabet = 0
    indice_alphabet_vig = []
    clickedSpanVigIndex = 0

    // Alphabet français
    const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'

    // Tableau contnenant les valeurs possibles pour A de la clé du chiffrement d'affine
    const affine_A_values = [1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25];

    // Tableau de fréquences des lettres en français indicé par l'ordre de l'alphabet
    var tab_freq_fr = [0.0812, 0.0090, 0.0338, 0.0366, 0.1740,
        0.0106, 0.0147, 0.0055, 0.0753, 0.0031,
        0.0005, 0.0555, 0.0292, 0.0689, 0.0834,
        0.0262, 0.0102, 0.0643, 0.0733, 0.0930,
        0.0284, 0.0113, 0.0164, 0.0044, 0.0165,
        0.0023];

    var chart;
    var tab_freq = frequence_lettres("");
    var texte_chiffre = "";

    $("#chiffrement").change(function (e) {
        select_val = $("#chiffrement").val();

        reset_input_cle();

        switch (select_val) {
            case 'cesar': input_cle_cesar(); break;
            case 'affine': input_cle_affine(); break;
            case 'playfair': input_cle_playfair(); break;
            case 'vigenere': input_cle_vigenere(); break;
            case 'scytale': input_cle_scytale(); break;
            case 'hill': input_cle_hill(); break;
        }

    });


    $("#btn-decrypter").click(function () {
        // Récupérer le texte , supprimer les espaces et le mettre en majuscule
        texte_chiffre = normaliserChaine($("#txt-dechiffrement").val().toUpperCase().split(" ").join("").trim());

        // Variable pour sauvegarder le msg chiffré
        msg_en_clair = '';

        // Récupérer le type de chiffrement
        val = $("#chiffrement").val();

        switch (val) {
            case 'cesar': let K = $("#cle-decryptage").text(); dechiffrement_cesar(K[0]); break;
            case 'affine': dechiffrement_affine(); break;
            case 'playfair': dechiffrement_playfair(); break;
            case 'vigenere': dechiffrement_vigenere(); break;
            case 'scytale': dechiffrement_scytale(); break;
            case 'hill': dechiffrement_hill(); break;
        }
    });



    /* ------------ Fonctions pour le changement du bloc de la clé selon le chiffrement ------------*/
    function reset_input_cle() {
        $("#cle").html("");
    }

    function input_cle_cesar() {

        block_cle = `<div class="row col-12 col-md-8 mx-auto">
        <canvas id="myChart"></canvas>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <button id="btn-left" type="button" class="btn btn-outline-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
            </svg>
        </button>
        <button id="btn-right" type="button" class="btn btn-outline-primary ms-1 me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </button>
        <button id="btn-reset" type="button" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"></path>
                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"></path>
            </svg>
            Reset
        </button>
    </div>
    <div class="d-flex justify-content-center align-items-center p-2">
        <div class="border border-warning border-2 my-1 w-50 text-center rounded-2 bg-dark text-light py-1" >
        <span>Clé décryptage</span>
        <h4 id="cle-decryptage"></h4>
        </div>
        
    </div>`;

        /* Ajout du bloc decryptage cesar */
        $("#cle").html(block_cle);

        /* ajout du bar chart */
        draw_bar_chart(frequence_lettres(texte_chiffre));
        $("#cle-decryptage").text(alphabet[0] + ' (0)');

        /* décalage du barchart texte à gauche */
        $("#btn-left").click(function (e) {
            tab_freq = decaleTableauAGauche(tab_freq);
            indice_alphabet++
            if (indice_alphabet > 25) indice_alphabet = indice_alphabet % 26;

            $("#cle-decryptage").text(alphabet[indice_alphabet] + ' (' + indice_alphabet + ')');
            update_bar_chart(tab_freq);

        });

        /* décalage du barchart texte à droite */
        $("#btn-right").click(function (e) {
            tab_freq = decaleTableauADroite(tab_freq);
            indice_alphabet--
            if (indice_alphabet < 0) indice_alphabet += 26

            $("#cle-decryptage").text(alphabet[indice_alphabet] + ' (' + indice_alphabet + ')');
            update_bar_chart(tab_freq);
        });

        $("#btn-reset").click(function (e) {
            /* simule nouveau texte */
            $("#txt-dechiffrement").keyup();

        });

        /* Mise à jour du bar chart à chaque nouveau texte */
        $("#txt-dechiffrement").keyup(function (e) {
            indice_alphabet = 0
            texte_chiffre = normaliserChaine($("#txt-dechiffrement").val().toUpperCase().split(" ").join("").trim());
            tab_freq = frequence_lettres(texte_chiffre);
            $("#cle-decryptage").text(alphabet[0] + ' (0)');
            update_bar_chart(tab_freq);

        });


        // EventListener sur le scroll de la souris (même fonctionnement que les deux boutons left & right)
        $('#myChart').on('mousewheel', function (event) {
            event.preventDefault();
            // Récupérer la direction du scroll
            const direction = event.originalEvent.wheelDelta > 0 ? 'up' : 'down';
            if (direction == "up") {
                $("#btn-right").click();
            } else {
                $("#btn-left").click();
            }


        });
    }


    function input_cle_affine() {

    }

    function input_cle_vigenere() {
        
        init_bloc_cle_vigenere();
        init_listener_vigenere();

    }

    function input_cle_scytale() {

    }

    function input_cle_hill() {

    }

    /* ---------------------- Fonctions de déchiffrements ---------------------- */

    function dechiffrement_cesar(K) {
        // Récupérer clé cesar
        K = alphabet.indexOf(K);

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
        $("#txt-dechiffrement").val(texte_chiffre);
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

    function dechiffrement_playfair() {
        clef = $("#txt-playfaircles").val();
        var matrice = CreerGrille(clef);
        $("#m11").val(matrice.charAt(0));
        $("#m12").val(matrice.charAt(1));
        $("#m13").val(matrice.charAt(2));
        $("#m14").val(matrice.charAt(3));
        $("#m15").val(matrice.charAt(4));
        $("#m21").val(matrice.charAt(5));
        $("#m22").val(matrice.charAt(6));
        $("#m23").val(matrice.charAt(7));
        $("#m24").val(matrice.charAt(8));
        $("#m25").val(matrice.charAt(9));
        $("#m31").val(matrice.charAt(10));
        $("#m32").val(matrice.charAt(11));
        $("#m33").val(matrice.charAt(12));
        $("#m34").val(matrice.charAt(13));
        $("#m35").val(matrice.charAt(14));
        $("#m41").val(matrice.charAt(15));
        $("#m42").val(matrice.charAt(16));
        $("#m43").val(matrice.charAt(17));
        $("#m44").val(matrice.charAt(18));
        $("#m45").val(matrice.charAt(19));
        $("#m51").val(matrice.charAt(20));
        $("#m52").val(matrice.charAt(21));
        $("#m53").val(matrice.charAt(22));
        $("#m54").val(matrice.charAt(23));
        $("#m55").val(matrice.charAt(24));
        chiffre = standard(texte_chiffre);
        clair = "";
        for (nbr = 0; nbr < chiffre.length; nbr = nbr + 2) {
            ch1 = chiffre.charAt(nbr);
            ch2 = chiffre.charAt(nbr + 1);
            ord1 = matrice.indexOf(ch1);
            ligne1 = Math.floor(ord1 / 5);
            col1 = ord1 % 5;
            ord2 = matrice.indexOf(ch2);
            ligne2 = Math.floor(ord2 / 5);
            col2 = ord2 % 5;
            if (ligne1 == ligne2) {
                clair += matrice.charAt(5 * ligne1 + (col1 + 4) % 5);
                clair += matrice.charAt(5 * ligne2 + (col2 + 4) % 5);
            } else if (col1 == col2) {
                clair += matrice.charAt(col1 + 5 * ((ligne1 + 4) % 5));
                clair += matrice.charAt(col2 + 5 * ((ligne2 + 4) % 5));
            } else {
                clair += matrice.charAt(5 * ligne1 + col2);
                clair += matrice.charAt(5 * ligne2 + col1);
            }
        }
        msg_en_clair = clair;
        $("#txt-chiffrement").val(msg_en_clair);
    };

    function dechiffrement_vigenere() {
        // Récupérer la clé (texte)
        K_txt = $("#cle-decryptage span").text().toUpperCase().split(" ").join("").trim();

        longueur_txt = K_txt.length;

        // Transformer en valeurs numériques
        K = []
        for (i = 0; i < longueur_txt; i++) {
            K.push(alphabet.indexOf(K_txt[i]));

        }

        // Parcours du msg à chiffrer
        i = 0

        while (i < texte_chiffre.length) {
            // L : Position de la lettre en clar
            C = alphabet.indexOf(texte_chiffre[i])

            // Recuperer valeur une lettre de la clé
            K_ieme = K[i % longueur_txt]

            // C : Nouvelle position de la lettre chiffrée
            L = (C - K_ieme) % 26;

            if (L < 0) {
                L += 26;
            }
            msg_en_clair += alphabet[L];

            i++;
        }

        // Affichage du texte dans un text-area
        $("#txt-chiffrement").val(msg_en_clair);
    };

    function dechiffrement_scytale() {

    };

    function dechiffrement_hill() {

    };




    /* ======================================= Fonctions outils ======================================= */

    /* Retourne un tableau indicé par l'ordre alphabetique contenant la fréquence de chaque lettre */
    function frequence_lettres(texte) {
        let longueur_text = texte.length;
        // tab de nombre d'occurence de chaque lettre (tab indicé par l'ordre de la lettre)
        let tab_occur = Array(26).fill(0);
        for (i = 0; i < longueur_text; i++) {
            tab_occur[alphabet.indexOf(texte[i])]++;
        }

        let tab_freq = Array(26).fill(0);
        for (i = 0; i < 26; i++) {
            // Diviser le nombre d'occurence de chaque lettre par longueur_text
            tab_freq[i] = parseFloat(Number(tab_occur[i]) / Number(longueur_text)).toFixed(4);

        }
        return tab_freq;
    }

    /* Dessine un bar chart avec les fréquences de lettres du français et du texte inséré */
    function draw_bar_chart(tab) {
        if (chart) chart.destroy();
        var ctx = document.getElementById('myChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                    'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
                datasets: [{
                    label: 'Français',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1,
                    data: tab_freq_fr
                }, {
                    label: 'Texte',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: tab
                }]
            },
            options: {
                scales: {
                    y: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Fréquence des lettres'
                }
            }
        });

    }

    /* Mise à jour du barchart "texte" */
    function update_bar_chart(new_tab_freq) {
        chart.data.datasets[1].data = new_tab_freq; // update the data for the "Texte" dataset
        chart.update(); // update the chart with the new data
    }


    /* Fonction qui élimine les accents et normalise une chaine */
    function normaliserChaine(chaine) {
        // replace accents with their corresponding letters
        chaine = chaine.normalize("NFD").replace(/[\u0300-\u036f]/g, "");

        // remove symbols, apostrophes, and numbers
        chaine = chaine.replace(/[^\w\s]|[\d]|_/gi, "");

        return chaine;
    }

    /* Fonction pour décaler les éléments d'un tabeau à gauche (premier devient dernier) */
    function decaleTableauAGauche(tab) {
        if (tab.length > 1) {
            const premier = tab.shift();
            tab.push(premier);
        }
        return tab;
    }


    /* Fonction pour décaler les éléments d'un tabeau à droite (dernier devient premier) */
    function decaleTableauADroite(tab) {
        if (tab.length > 1) {
            const dernier = tab.pop();
            tab.unshift(dernier);
        }
        return tab;
    }

    /* Indice de coincidence pour vigenere (même concept mais avec des groupes de texte et une moyenne) */
    function indiceCoincidenceVigenere(texte_chiffre, taille_cle) {
        let grp_texte = decouper_en_groupe(texte_chiffre,taille_cle);
        s=0;
        for(let i=0;i<taille_cle;i++) {
            s+=indiceCoincidence(grp_texte[i]);
        }
        return Number((s/taille_cle).toFixed(4));
    }


    /* Fonction pour calculer l'indice de coincidence */
    function indiceCoincidence(texte) {
        let freq = {}; // dictionnaire pour stocker les fréquences de chaque lettre
        let somme = 0; // variable pour stocker la somme des fréquences

        // compter les fréquences de chaque lettre dans le texte
        for (let i = 0; i < texte.length; i++) {
            let lettre = texte[i];
            if (freq[lettre]) {
                freq[lettre]++;
            } else {
                freq[lettre] = 1;
            }
        }
     
        // calculer la somme des fréquences
        for (let lettre in freq) {
            let frequence = freq[lettre];
            somme += frequence * (frequence - 1);
        }

        // calculer l'indice de coïncidence
        let n = texte.length;
        let indice = somme / (n * (n - 1));

        return indice;
    }

    /* Fonction pour deviner la taille de la clé */
    function taille_probable_cle_vigenere(chaine, tailleMaxCle) {
        let longueur_text = chaine.length;
        let copie_chaine = chaine;
        let taille_cle = 2, max_coincidence = 0, coincidence = 0, i = 0, decalage = 0;;
        for (taille_probable_cle = 2; taille_probable_cle <= tailleMaxCle; taille_probable_cle++) {
            decalage++;
            coincidence=0;
            for (i = 0; i < longueur_text - decalage; i++) {
                if (chaine[i + decalage] == copie_chaine[i])
                    coincidence++
            }
            if (coincidence > max_coincidence) {
                max_coincidence = coincidence;
                taille_cle = taille_probable_cle;
            }

        }
        
        return taille_cle/longueur_text;
    }



    function frequence_lettres_vigenere(chaine, taille_cle){
        if (taille_cle>chaine.length) {
            let freq_vig = Array(1).fill(0);
            freq_vig = frequence_lettres("");
            return freq_vig; 
        } else {
            // Découper en groupe de textes (tableau de textes)
            let grp_texte = decouper_en_groupe(chaine, taille_cle);
            // Calculer fréquence des lettres dans chaque groupe
            return calcul_freq_groupe(grp_texte, taille_cle);
        }
        
    }



    function decouper_en_groupe(chaine, taille_cle) {
        let lng_chaine = chaine.length;
        let grp_texte= [];
        
        for (i=0;i<taille_cle;i++) {
                j = i;
                grp_texte[i]= ""
            while(j<lng_chaine) {
                grp_texte[i]+= chaine[j];
                j+= taille_cle;
            }
        }
       
        return grp_texte;
    }


    function calcul_freq_groupe(grp_texte, taille_cle) {
        let i;
        let freq_vig = Array(taille_cle).fill(0);
        for (i=0;i<taille_cle;i++) {
            freq_vig[i] = frequence_lettres(grp_texte[i]);
        }
        return freq_vig;
    }

    function init_indice_alphabet_vig(taille_cle) {
        indice_alphabet_vig = new Array(taille_cle).fill(0);
    }  

    /* Message d'erreur sous forme d'un Modal */
    function afficher_modal_erreur(titre, msg) {
        $("#exampleModalToggleLabel").text(titre);
        $(".modal-body").text(msg);
        $("#exampleModalToggle").modal('toggle');
    }

    function add_spans(texte_chiffre ,taille_cle) {
        let spans = "";
        let grp_txt = decouper_en_groupe(texte_chiffre,taille_cle);
        mat_freq_vig = calcul_freq_groupe(grp_txt,taille_cle);

        for (i=0;i<taille_cle;i++) {
            spans+=`<span>A</span>`
        }

        $("#cle-decryptage").html(spans);

        // click listener pour chaque <span>
        $('#cle-decryptage > span').click(function () {
            $('#cle-decryptage > span[selected-letter]').removeAttr('selected-letter');
           
            clickedSpanVigIndex = $(this).index();

            $('#cle-decryptage > span').eq(clickedSpanVigIndex).attr('selected-letter', '');
            update_bar_chart(tab_freq_vig[clickedSpanVigIndex]);
        })

        $('#cle-decryptage span:first-child').click();
        
        
    }






    /* Blocs Clés HTML */


    function init_bloc_cle_vigenere() {
        block_cle = `<div class="row col-12 col-md-8 mx-auto">
        <canvas id="myChart"></canvas>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <button id="btn-left" type="button" class="btn btn-outline-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
            </svg>
        </button>
        <button id="btn-right" type="button" class="btn btn-outline-primary ms-1 me-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
            </svg>
        </button>
        <button id="btn-reset" type="button" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"></path>
                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"></path>
            </svg>
            Reset
        </button>
    </div>
    <div class="d-flex justify-content-center align-items-center p-2">
        <div id="div-taille-cle" class="border border-warning border-2 my-1 w-25 text-center rounded-2 bg-dark text-light py-1" >
        <span>Taille clé</span>
        <div class="d-flex justify-content-center">

            <button id="btn-moins-cle" type="button" class="btn btn-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
            </svg>
            </button>
            
            <h4 id="taille-cle" class="mx-2">1</h4>

            <button id="btn-plus-cle" type="button" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            </button>

        </div>
        
        </div>
        <div class="border border-warning border-2 my-1 w-50 text-center rounded-2 bg-dark text-light py-1" >
        <span>Clé décryptage</span>
        <h4 id="cle-decryptage"><span>A</span></h4>
        </div>
        <div id="idc-coinci" class="border border-warning border-2 my-1 w-25 text-center rounded-2 bg-dark text-light py-1">
        <span>Indice coincidence (Français : 0.0778)</span>
        <h4 id="indice-coincid">0.000</h4>
        </div>
        
    </div>`;

    /* Ajout du bloc decryptage cesar */
    $("#cle").html(block_cle);

    /* ajout du bar chart */
    draw_bar_chart(frequence_lettres(texte_chiffre));
    $("#cle-decryptage").text('A');
    $("#taille-cle").text(1);

    }

    



    /* ================================ Events listener ========================= */

    function init_listener_vigenere() {
        /* décalage du barchart texte à gauche */
        $("#btn-left").click(function (e) {
            tab_freq_vig[clickedSpanVigIndex] = decaleTableauAGauche(tab_freq_vig[clickedSpanVigIndex]);
            indice_alphabet_vig[clickedSpanVigIndex]++
            if (indice_alphabet_vig[clickedSpanVigIndex] > 25) indice_alphabet_vig[clickedSpanVigIndex] = indice_alphabet_vig[clickedSpanVigIndex] % 26;

            $(`#cle-decryptage > span:eq(${clickedSpanVigIndex})`).text(alphabet[indice_alphabet_vig[clickedSpanVigIndex]]);
            update_bar_chart( tab_freq_vig[clickedSpanVigIndex]);

        });

        /* décalage du barchart texte à droite */
        $("#btn-right").click(function (e) {
            tab_freq_vig[clickedSpanVigIndex] = decaleTableauADroite(tab_freq_vig[clickedSpanVigIndex]);
            indice_alphabet_vig[clickedSpanVigIndex]--
            if (indice_alphabet_vig[clickedSpanVigIndex] < 0) indice_alphabet_vig[clickedSpanVigIndex] += 26

            $(`#cle-decryptage > span:eq(${clickedSpanVigIndex})`).text(alphabet[indice_alphabet_vig[clickedSpanVigIndex]]);
            
            update_bar_chart( tab_freq_vig[clickedSpanVigIndex]);
        });

        $("#btn-reset").click(function (e) {
            /* simule nouveau texte */
            $("#txt-dechiffrement").keyup();

        });

        /* Mise à jour du bar chart & clé à chaque nouveau texte */
        $("#txt-dechiffrement").keyup(function (e) {
            texte_chiffre = normaliserChaine($("#txt-dechiffrement").val().toUpperCase().split(" ").join("").trim());
            $("#txt-dechiffrement").val(texte_chiffre);
            if (!texte_chiffre){
                taille_cle = 1;
                $("#taille-cle").text(1)
            } else {
                taille_cle = Number($("#taille-cle").text());
            }
                tab_freq_vig = frequence_lettres_vigenere(texte_chiffre,taille_cle);
                init_indice_alphabet_vig(taille_cle);
                add_spans(texte_chiffre,taille_cle);
                update_bar_chart(tab_freq_vig[clickedSpanVigIndex]);
            
            

        });


        // EventListener sur le scroll de la souris (même fonctionnement que les deux boutons left & right)
        $('#myChart').on('mousewheel', function (e) {
            e.preventDefault();
            // Récupérer la direction du scroll
            const direction = e.originalEvent.wheelDelta > 0 ? 'up' : 'down';
            if (direction == "up") {
                $("#btn-right").click();
            } else {
                $("#btn-left").click();
            }


        });


        $("#btn-plus-cle").click(function (e) { 
            e.preventDefault();
            let taille_cle = Number($("#taille-cle").text());
            texte_chiffre = $("#txt-dechiffrement").val();
            if (taille_cle>=texte_chiffre.length) {
                afficher_modal_erreur("Taille clé","La taille de la clé ne doit pas dépasser la longueur de la chaine")
            } else {
                taille_cle++;
                $("#taille-cle").text(taille_cle);
                
                
                add_spans(texte_chiffre,taille_cle);
                $("#txt-dechiffrement").keyup();
                let idc_coincid = indiceCoincidenceVigenere(texte_chiffre,taille_cle)
                if (!isNaN(idc_coincid)) {
                    if(idc_coincid>0.07) {
                        $("#div-taille-cle").addClass("indice-coinci");
                        $("#idc-coinci").addClass("indice-coinci");
                    } else {
                        $("#div-taille-cle").removeClass("indice-coinci");
                        $("#idc-coinci").removeClass("indice-coinci");
                    }
                    $("#indice-coincid").text(idc_coincid);
                } else {
                    $("#indice-coincid").text("Non défini");
                }
            }
           
        });


        $("#btn-moins-cle").click(function (e) { 
            e.preventDefault();
            let taille_cle = Number($("#taille-cle").text());
            if(taille_cle>1)
                taille_cle--;
            $("#taille-cle").text(taille_cle);
            texte_chiffre = $("#txt-dechiffrement").val();
            
            add_spans(texte_chiffre,taille_cle);
            $("#txt-dechiffrement").keyup();
            let idc_coincid = indiceCoincidenceVigenere(texte_chiffre,taille_cle)
            if (!isNaN(idc_coincid)) {
                if(idc_coincid>0.07) {
                    $("#div-taille-cle").addClass("indice-coinci");
                    $("#idc-coinci").addClass("indice-coinci");
                } else {
                    $("#div-taille-cle").removeClass("indice-coinci");
                    $("#idc-coinci").removeClass("indice-coinci");
                }
                $("#indice-coincid").text(idc_coincid);
            } else {
                $("#indice-coincid").text("Non défini");
            }
            
        });
    }


    
    /* END OF SCRIPT */
});

