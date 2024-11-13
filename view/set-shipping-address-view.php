<?php require_once "../view/partials/_header.php"; ?>
<main>

    <form method="POST" action="">
        <label for="shippingAddress">Veuillez remplir votre adresse de livraison :</label>
        <input type="text" id="shippingAddress" name="shippingAddress" required>

        <button type="submit">Valider</button>
    </form>

    <p>Merci de votre confiance <?php echo $order->getCustomerName(); ?></p>

    <p>Commande numéro : <?php echo $order->getId(); ?></p>
    <h2> <?php echo $message; ?></h2>
    <p>Adresse : <?php echo $order->getAddress(); ?></p>

    <p>Le coût total de votre commande est de :
        <?php echo $order->totalPrice(); ?> euros.</p>

    <p>Vous avez effectué la commande le <?php echo $order->dateTime(); ?> à
        <?php echo $order->hourTime(); ?></p>
</main>
<?php require_once "../view/partials/_footer.php"; ?>

