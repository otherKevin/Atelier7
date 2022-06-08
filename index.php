<?php

/* Imports */
require_once __DIR__ . "/class/Product.class.php";

/* Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Récupération des valeurs du body de la requête */
    $price = $_POST["price"];
    $vat_rate = $_POST["vat_rate"];
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $category = $_POST["category"];
    $description = $_POST["description"];

    /* Création de l'instance de Product */
    $new_product = new Product($price, $vat_rate, $name, $stock, $category, $description);
    $tomate = new Product(1, 5.5, "Tomate", 10, "Legume", "Lorem");
    $kinder_bueno = new Product(5, 20, "Kinder bueno", 10, "Bonbon", "Lorem");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Atelier 7 : E-commerce partie 3</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="number" name="price" placeholder="Prix HT" step="0.01" required />
        <input type="number" name="vat_rate" placeholder="Taux de TVA" step="0.1" required />
        <input type="text" name="name" placeholder="Nom" required />
        <input type="number" name="stock" placeholder="Stock" required />

        <select name="category">
            <option value="fruit">Fruit</option>
            <option value="vegetable">Legume</option>
            <option value="drink">Boisson</option>
        </select>

        <textarea name="description"></textarea>

        <input type="submit" value="valider" />

    </form>

    <?php if (isset($new_product)) { ?>
        <h2>Nouveau produit créé</h2>
        <p> Détails: </p>
    <?php
        $new_product->show();
        $tomate->show();
        $kinder_bueno->show();
    }

    /* Création d'un clone de produit */

    $supertomate = Product::cloning($tomate, "Super Tomate");


    ?>

    <section id="cloningArea">
        <h2>Zone de clonage de produits :
        </h2>
    </section>

    <?php
    $supertomate->show();
    ?>


</body>

</html>