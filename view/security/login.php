<?=inheritance("base-security")?>

<?=block("title")?>Login<?=endBlock("title")?>

<?=block("form_title")?>Login to start your session<?=endBlock("form_title")?>

<?=block("form")?>
    <?php if (isset($loginError)):?>
        <div class="my-2 alert alert-danger"><?=$loginError?></div>
    <?php endif;?>
    <form action="<?=path("app_login")?>" method="post">
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
        <!--<div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
                Remember Me
            </label>
        </div>-->
        <div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>

    <p class="mb-0 mt-2">
        <a href="<?=path("app_register")?>" class="text-center">Register a new membership</a>
    </p>
<?=endBlock("form")?>