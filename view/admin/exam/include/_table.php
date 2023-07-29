<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>User</th>
        <th>Category</th>
        <th>Date</th>
        <th>Score</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($exams) && count($exams) > 0):?>
        <?php foreach ($exams as $exam):?>
            <tr>
                <td><?=$exam->getId()?></td>
                <td><?=$exam->getUser()->getName()?></td>
                <td><?=$exam->getCategory()->getTitle()?></td>
                <td><?=$exam->getDate()->format("Y-m-d H:i")?></td>
                <td><?=$exam->getScore()?></td>
                <td>
                    <?php
                        include_once viewPath() . "tools/action.php";
                        echo action(path("app_admin_exam_show", ['id' => $exam->getId()]), "btn-primary", "fa-info-circle");
                        echo delete(path("app_admin_exam_delete", ['id' => $exam->getId()]));
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="6">Not find data?</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>