<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= urlBase() . 'asset/app.css' ?>">
    <script defer src="<?= urlBase() . 'asset/app.js' ?>" type="module"></script>
    <title><?= block("title") ?></title>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?=$_SERVER['PHP_SELF']?>" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg"><?= block("form_title") ?></p>
            <?= block("form") ?>
        </div>
    </div>
</div>
</html>
