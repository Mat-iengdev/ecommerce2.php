<?php require_once "../view/partials/_header.php"?>
<main>

    <h2>Paiement de la commande</h2>

    <p><?php echo $message; ?></p>

    <p>Merci à vous <?php echo $order->getCustomerName(); ?> vous allez bientôt reçevoir
    vos <?php echo $order->totalPrice(); ?> euros de Pringles à l'adresse suivante : <?php echo $order->getAddress(); ?></p>


</main>
<?php require_once "../view/partials/_footer.php"?>
</body>
</html>
