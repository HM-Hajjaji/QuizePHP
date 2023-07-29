<?=inheritance("base-security")?>

<?=block("title")?>Signup<?=endBlock("title")?>

<?=block("form_title")?>Register a new membership<?=endBlock("form_title")?>

<?=block("form")?>
    <form action="<?=path("app_register")?>" method="post">
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="name" placeholder="Full name" value="<?=$old['name']??''?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <?php if (isset($errors['name'])) :?>
            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['name']?></small>
        <?php endif;?>

        <div class="input-group mb-2">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$old['username']??''?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?php if (isset($errors['username'])) :?>
            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['username']?></small>
        <?php endif;?>

        <div class="input-group mb-2">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <?php if (isset($errors['password'])) :?>
            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['password']?></small>
        <?php endif;?>

        <div class="input-group mb-2">
            <input type="password" class="form-control" name="password_confirm" placeholder="Retype password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <?php if (isset($errors['password_confirm'])) :?>
            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['password_confirm']?></small>
        <?php endif;?>

        <div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>

    <p class="mb-0 mt-2">
        <a href="<?=path("app_login")?>" class="text-center">I already have a membership</a>
    </p>
<?=endBlock("form")?>