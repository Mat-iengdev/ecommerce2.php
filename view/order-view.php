<?php require_once "../view/partials/_header.php"?>
    <main>
        <h1>Bienvenue sur le formulaire !</h1>

        <?php if ($message) { ?>

            <h2><?php echo $message; ?></h2>

        <?php } ?>

        <form method="POST">

            <label>Entrez votre nom</label>
            <input type="text" name="customerName">

            <input type="submit">

        </form>
    </main>
<?php require_once "../view/partials/_footer.php"?>
</body>
</html>