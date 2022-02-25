<?php

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */

// TODO Votre code ici.
$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$stmt = $db->prepare("
    SELECT article.id, article.title, article.content, categorie.name
    FROM article
    INNER JOIN categorie ON article.category_fk = categorie.id    
");


if($stmt->execute()) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $key => $item) {
            echo $key . ' : ' . $item . '<br>';
        }
        echo '<br><br>';
    }
}

/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.

$stmt = $db->prepare("
    SELECT a.id, a.title, a.content, c.name
    FROM article AS a
    INNER JOIN categorie AS c ON a.category_fk = c.id    
");


if($stmt->execute()) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $key => $item) {
            echo $key . ' : ' . $item . '<br>';
        }
        echo '<br><br>';
    }
}

/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.

$stmt = $db->prepare("
    SELECT commentaire.content, utilisateur.firstName, utilisateur.lastName
    FROM commentaire
    INNER JOIN utilisateur ON commentaire.user_fk = utilisateur.id    
");


if($stmt->execute()) {
    foreach ($stmt->fetchAll() as $value) {
        foreach ($value as $key => $item) {
            echo $key . ' : ' . $item . '<br>';
        }
        echo '<br><br>';
    }
}
