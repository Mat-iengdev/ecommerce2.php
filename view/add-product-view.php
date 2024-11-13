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
</main>
<?php require_once "../view/partials/_footer.php"?>
</body>
</html>