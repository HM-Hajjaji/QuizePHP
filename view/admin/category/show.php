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
            <?php
            include_once viewPath()."tools/action.php";
            echo action(path("app_admin_category"),"btn-primary","fa-arrow-left")
            ?>
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
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-quiz-tab" data-toggle="pill" href="#quiz" role="tab" aria-controls="pills-quiz" aria-selected="true">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-exam-tab" data-toggle="pill" href="#exam" role="tab" aria-controls="pills-exam" aria-selected="false">Exam</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="quiz" role="tabpanel" aria-labelledby="pills-quiz-tab">
                    <?php $quizs = $category->getListQuiz()?>
                    <?php include_once viewPath()."admin/quiz/include/_table.php"?>
                </div>
                <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="pills-exam-tab">
                    <?php $exams = $category->getListExam()?>
                    <?php include_once viewPath()."admin/exam/include/_table.php"?>
                </div>
            </div>
        </div>
    </div>
</div>
<?=endBlock("body")?>