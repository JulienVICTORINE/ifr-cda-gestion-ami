<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main role="main">
        <?= $content; ?>

        <?php if(isset($_SESSION['user'])) : ?>
            <br />
            <a href="?page=logout"> Se déconnecter </a>
        <?php endif; ?>
    </main>
</body>
</html>