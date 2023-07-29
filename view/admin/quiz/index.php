<?= inheritance("base-admin")?>

<?=block("title")?>Quiz<?=endBlock("title")?>

<?=block("body")?>
<div class="card">
    <div class="card-header d-flex flex-wrap py-2 align-items-center">
        <div class="col-sm-6">
            <h5 class="card-title font-weight-bold">
                <i class="fas fa-broom mr-2"></i>Quiz
            </h5>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <a href="<?=path("app_admin_quiz_new")?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle mr-1"></i>New</a>
        </div>
    </div>
    <div class="card-body">
        <?php include_once viewPath()."admin/quiz/include/_table.php"?>
    </div>
</div>
<?=endBlock("body")?>