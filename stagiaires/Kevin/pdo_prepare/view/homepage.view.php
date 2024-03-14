<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
</head>
<body>
    <h1>Les pays du monde</h1>
    <h3>Nombre de pays entre <?= number_format($min, 0, '.', ' ') ?> et <?= number_format($max, 0, '.', ' ') ?> habitants : <?= $nbPays ?></h3>
    <p>Utilisation de la boucle while avec fetch pour lister tout les pays.</p>
    <pre><code>
        foreach($allCountries as $item)
        {
            echo $item['nom'] . '( '.number_format($item['population'], 0, '.', ' ').' )';
        }
    </code></pre>
    <div id="listepays">
        <h3>Liste des pays :</h3>
        <?php
            foreach($allCountries as $item):
        ?>
        <p><span><?=$item['nom']?></span> <span>( <?=number_format($item['population'], 0, '.', ' ')?> )</span></p>
        <?php
            endforeach;
        ?>
    </div>

    <form action="" method="POST" name="countries">
        <input type="number" name="num1" value="<?= $min ?>" step="100000" max="10000000000"> à <input type="number" name="num2" value="<?= $max ?>" step="100000" max="10000000000">
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>