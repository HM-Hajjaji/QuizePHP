<?= inheritance("base-admin")?>

<?=block("title")?>Show Quiz<?=endBlock("title")?>

<?=block("body")?>
    <div class="card">
        <div class="card-header d-flex flex-wrap py-2 align-items-center">
            <div class="col-sm-6">
                <h5 class="card-title font-weight-bold">
                    <i class="fas fa-info-circle mr-2"></i>Details Quiz
                </h5>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="<?=path("app_admin_quiz")?>" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Question</th>
                    <td><?=$quiz->getQuestion()?></td>
                </tr>
                <tr>
                    <th>Answer</th>
                    <td><?=$quiz->getAnswer()?></td>
                </tr>
                <tr>
                    <th>Warning first</th>
                    <td><?=$quiz->getWarningFirst()?></td>
                </tr>
                <tr>
                    <th>Warning second</th>
                    <td><?=$quiz->getWarningSecond()?></td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td><?=$quiz->getNote()?></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?=$quiz->getCategory()->getTitle()?></td>
                </tr>
            </table>
        </div>
    </div>
<?=endBlock("body")?>