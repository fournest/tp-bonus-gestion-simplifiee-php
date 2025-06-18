<?php
echo "<header><h1>TP Bonus - Gestion Simplifiée Bibliothèque</h1></header></br>";


function ligne()
{
    echo "------------------------------<br>";
};

ligne();
echo "------- Etape 1 -------" . '</br>';
ligne();
$bibliotheque = [
    [
        "titre" => "1984",
        "auteur" => "George Orwell",
        "annee" => 1949,
        "disponible" => true
    ],
    [
        "titre" => "Rêves de trappeur",
        "auteur" => "Rock et Kathryn Boivin",
        "annee" => 2018,
        "disponible" => true
    ],
    [
        "titre" => "Les secrets de Christophe Colomb",
        "auteur" => "J.R. Dos Santos",
        "annee" => 2015,
        "disponible" => true
    ]
];


var_dump($bibliotheque);
echo "<br>";

function afficherLivre(array $livres)
{
    foreach ($livres as $index => $livre) {
        
        echo "-" . $livre['titre'] . "<br>";

        echo "-" . $livre['auteur'] . "<br>";

        echo "-" . $livre['annee'] . "<br>";

        echo "-" . $livre['disponible'] . "<br>";
    
    }
}
ligne();
echo "------- Etape 2 -------" . '</br>';
ligne();

function afficherBibliotheque($bibliotheque)
{
    echo afficherLivre($bibliotheque);
}

afficherBibliotheque($bibliotheque);

ligne();
echo "------- Etape 3 -------" . '</br>';
ligne();
function rechercherParTitre($bibliotheque, $titreRecherche)
{
    $livreTrouve = null;
    $titreRechercheMinuscules = strtolower($titreRecherche);

    foreach ($bibliotheque as $livre) {
        $titreLivreMinuscules = strtolower($livre['titre']);
        if ($titreLivreMinuscules === $titreRechercheMinuscules) {
            $livreTrouve = $livre['titre'];
            echo $livreTrouve . "<br>";
        } else {
            echo "Erreur : Aucun livre ne correspond au titre<br>";
        }
    }
}

rechercherParTitre($bibliotheque, "Rêves de trappeur");
ligne();
echo "------- Etape 4 -------" . '</br>';
ligne();

function compterDisponibles($bibliotheque) {
    $nbLivresDisponibles = 0;
    foreach ($bibliotheque as $livre) {
        if(isset($livre['disponible']) && $livre['disponible'] === true) {
            $nbLivresDisponibles++;
        }
    }
    return $nbLivresDisponibles;

}

$nbrTotalDispo = compterDisponibles($bibliotheque);

echo "Le nombre de livres disponibles est : $nbrTotalDispo <br>";
ligne();
echo "------- Etape 5 -------" . '</br>';
ligne();

function ajouterLivre(&$bibliotheque, $titre, $auteur, $annee, $disponible){
    $nouveauLivre = [
        'titre' => $titre,
        'auteur' => $auteur,
        'annee' => $annee,
        'disponible' => $disponible
    ];
    $bibliotheque[] = $nouveauLivre;
}

ajouterLivre($bibliotheque, 'Le Seigneur des Anneaux', 'J.R.R. Tolkien', 1954, true);
ajouterLivre($bibliotheque, 'Fondation', 'Isaac Asimov', 1951, true);
afficherBibliotheque($bibliotheque);
ligne();
echo "------- Etape 6 -------" . '</br>';
ligne();

function supprimerLivreParTitre(&$bibliotheque, $titreASupprimer) {

    foreach ($bibliotheque as $key => $livre) {
        if (isset($livre['titre']) && $livre['titre'] === $titreASupprimer) {
            unset($bibliotheque[$key]);
            break;
        }
    }
    $bibliotheque = array_values(($bibliotheque));
}

supprimerLivreParTitre($bibliotheque, "1984");
afficherBibliotheque($bibliotheque);

ligne();
echo "------- Etape 7 -------" . '</br>';
ligne();

function annee($a, $b) {
    if($a['annee'] == $b['annee']) {
        return 0;
    }
    return ($a['annee'] < $b['annee']) ? -1 : 1;
}


function trierParAnnee(&$bibliotheque) {
    usort($bibliotheque, 'annee');
    // var_dump($bibliotheque);
}

trierParAnnee($bibliotheque);
afficherBibliotheque($bibliotheque);

?>