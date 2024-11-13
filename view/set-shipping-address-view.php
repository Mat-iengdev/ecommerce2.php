<?php require_once "../view/partials/_header.php"; ?>
<main>

    <form method="POST" action="">
        <label for="shippingAddress">Adresse de livraison :</label>
        <input type="text" id="shippingAddress" name="shippingAddress" required>

        <button type="submit">Ajouter l'adresse</button>
    </form>

    <?php if ($message) { ?>
        <p><?= $message ?></p>
    <?php } ?>
</main>
<?php require_once "../view/partials/_footer.php"; ?>

