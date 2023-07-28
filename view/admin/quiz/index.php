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
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Warning first</th>
                <th>Warning second</th>
                <th>Note</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($quizs)):?>
                <?php foreach ($quizs as /** @var App\Model\Quiz $quiz*/ $quiz):?>
                    <tr>
                        <td><?=$quiz->getId()?></td>
                        <td><?=$quiz->getQuestion()?></td>
                        <td><?=$quiz->getAnswer()?></td>
                        <td><?=$quiz->getWarningFirst()?></td>
                        <td><?=$quiz->getWarningSecond()?></td>
                        <td><?=$quiz->getNote()?></td>
                        <td><?=$quiz->getCategory()->getTitle()?></td>
                        <td>
                            <a href="<?=path("app_admin_quiz_show",['id' => $quiz->getId()])?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                            <a href="<?=path("app_admin_quiz_edit",['id' => $quiz->getId()])?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" method="post" action="<?=path("app_admin_quiz_delete",['id' => $quiz->getId()])?>" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td colspan="8">Not find data?</td>
                </tr>
            <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
<?=endBlock("body")?>