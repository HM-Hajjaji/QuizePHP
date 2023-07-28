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
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="3">Not find data?</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?=endBlock("body")?>