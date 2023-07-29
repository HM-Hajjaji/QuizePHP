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
    <?php if (!empty($quizs) && count($quizs) > 0):?>
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
                    <?php
                        include_once viewPath()."tools/action.php";
                        echo action(path("app_admin_quiz_show",['id' => $quiz->getId()]),"btn-primary","fa-info-circle");
                        echo action(path("app_admin_quiz_edit",['id' => $quiz->getId()]),"btn-info","fa-edit");
                        echo delete(path("app_admin_quiz_delete",['id' => $quiz->getId()]));
                    ?>
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