<?= inheritance("base-admin")?>

<?=block("title")?>Show Category<?=endBlock("title")?>

<?=block("body")?>
<div class="card">
    <div class="card-header d-flex flex-wrap py-2 align-items-center">
        <div class="col-sm-6">
            <h5 class="card-title font-weight-bold">
                <i class="fas fa-info-circle mr-2"></i>Details category
            </h5>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <a href="<?=path("app_admin_category")?>" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Title</th>
                <td><?=$category->getTitle()?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?=$category->getCreatedAt()->format("Y-m-d H:i")?></td>
            </tr>
        </table>

        <div class="mt-2">
            <h4>List Quiz:</h4>
            <?php $quizs = $category->getListQuiz()?>
            <?php include_once viewPath()."admin/quiz/include/_table.php"?>
        </div>
    </div>
</div>
<?=endBlock("body")?>