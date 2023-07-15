<?= inheritance("base-admin")?>

<?=block("title")?>Home<?=endBlock("title")?>

<?=block("body")?>
    <?php include_once viewPath()."tools/box.php";?>
    <div class="row row-cols-lg-4">
        <?=box("150","New Orders","bg-info","fa-user")?>
        <?=box("53","Bounce Rat","bg-success","fa-user")?>
        <?=box("44","User Registrations","bg-warning","fa-user")?>
        <?=box("65","Unique Visitors","bg-danger","fa-user")?>
    </div>
<?=endBlock("body")?>