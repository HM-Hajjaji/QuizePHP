<?=inheritance("base-security")?>

<?=block("title")?>Signup<?=endBlock("title")?>

<?=block("form_title")?>Register a new membership<?=endBlock("form_title")?>

<?=block("form")?>
    <form action="<?=path("app_register")?>" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
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
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>

    <p class="mb-0">
        <a href="<?=path("app_login")?>" class="text-center">I already have a membership</a>
    </p>
<?=endBlock("form")?>