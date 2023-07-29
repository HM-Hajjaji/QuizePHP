<?=inheritance("base-security")?>

<?=block("title")?>Login<?=endBlock("title")?>

<?=block("form_title")?>Login to start your session<?=endBlock("form_title")?>

<?=block("form")?>
    <form action="<?=path("app_login")?>" method="post">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
                Remember Me
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>

    <p class="mb-0">
        <a href="<?=path("app_register")?>" class="text-center">Register a new membership</a>
    </p>
<?=endBlock("form")?>