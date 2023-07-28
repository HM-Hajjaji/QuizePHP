<?= inheritance("base-admin")?>

<?=block("title")?>New Quiz<?=endBlock("title")?>

<?=block("body")?>
    <div class="card">
        <div class="card-header d-flex flex-wrap py-2 align-items-center">
            <div class="col-sm-6">
                <h5 class="card-title font-weight-bold">
                    <i class="fas fa-plus-circle mr-2"></i>New Quiz
                </h5>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="<?=path("app_admin_quiz")?>" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="card-body">
            <form action="<?=path("app_admin_quiz_new")?>" method="post">
                <div class="card-body">
                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="question">Question:</label>
                            <input type="text" name="question" class="form-control" id="question" placeholder="Enter question" value="<?=$old['question']??''?>">
                        </div>
                        <?php if (isset($errors['question'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['question']?></small>
                        <?php endif;?>
                    </div>

                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control" id="category">
                                <option>Cate</option>
                            </select>
                        </div>
                        <?php if (isset($errors['category'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['category']?></small>
                        <?php endif;?>
                    </div>

                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="answer">Answer:</label>
                            <input type="text" name="answer" class="form-control" id="answer" placeholder="Enter answer" value="<?=$old['answer']??''?>">
                        </div>
                        <?php if (isset($errors['answer'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['answer']?></small>
                        <?php endif;?>
                    </div>

                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="warning_first">Warning first:</label>
                            <input type="text" name="warning_first" class="form-control" id="warning_first" placeholder="Enter warning first" value="<?=$old['warning_first']??''?>">
                        </div>
                        <?php if (isset($errors['warning_first'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['warning_first']?></small>
                        <?php endif;?>
                    </div>

                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="warning_second">Warning second:</label>
                            <input type="text" name="warning_second" class="form-control" id="warning_second" placeholder="Enter warning second" value="<?=$old['warning_second']??''?>">
                        </div>
                        <?php if (isset($errors['warning_second'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['warning_second']?></small>
                        <?php endif;?>
                    </div>

                    <div class="my-1">
                        <div class="form-group mb-1">
                            <label for="note">Note:</label>
                            <input type="number" name="note" class="form-control" id="note" placeholder="Enter note" value="<?=$old['note']??''?>">
                        </div>
                        <?php if (isset($errors['note'])) :?>
                            <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['note']?></small>
                        <?php endif;?>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?=endBlock("body")?>