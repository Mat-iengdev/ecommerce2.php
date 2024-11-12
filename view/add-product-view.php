<?php require_once "../view/partials/_header.php"?>
<main>

    <p><?php echo $message; ?></p>

    <p>Commande numéro : <?php echo $order->getId(); ?></p>

    <p>Les produits sont :</p>
    <ul>
        <?php foreach ($order->getProducts() as $product) { ?>
        <li><?php echo $product; ?></li>
        <?php } ?>
    </ul>

    <p>Le coût total de ta commande assez chelou car y'a que des Pirngles est de :
        <?php echo $order->totalPrice(); ?> euros.</p>

    <p>Vous avez effectué la commande le <?php echo $order->dateTime(); ?> à
    <?php echo $order->hourTime(); ?></p>
</main>
<?php require_once "../view/partials/_footer.php"?>
</body>
</html>