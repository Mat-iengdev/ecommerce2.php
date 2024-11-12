<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: yellow;
            font-family: "Sukhumvit Set";
        }
    </style>
</head>
<body>
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
</body>
</html>