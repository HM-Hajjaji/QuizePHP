<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=urlBase().'asset/app.css'?>">
    <script defer src="<?=urlBase().'asset/app.js'?>" type="module"></script>
    <title><?=$title??env("APP_NAME")?></title>
</head>
<body class="sidebar-mini">
<div class="wrapper">
    <?php
    include_once viewPath()."admin/include/header.php";
    include_once viewPath()."admin/include/sidebar.php";
    ?>
    <div class="content-wrapper">
        <!--<div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>-->

        <section class="content mt-2">
            <div class="container-fluid">
                <?=$body?>
            </div>
        </section>
    </div>
</div>
</body>
</html>