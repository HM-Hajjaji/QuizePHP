<?= inheritance("base-admin")?>

<?=block("title")?>Edit Category<?=endBlock("title")?>

<?=block("body")?>
<div class="card">
    <div class="card-header d-flex flex-wrap py-2 align-items-center">
        <div class="col-sm-6">
            <h5 class="card-title font-weight-bold">
                <i class="fas fa-edit mr-2"></i>Edit category
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
        <form action="<?=path("app_admin_category_edit",['id' => $category->getId()])?>" method="post">
            <div class="card-body">
                <div class="form-group mb-1">
                    <label for="exampleInputEmail1">Title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?=$old['title']??$category->getTitle()?>">
                    <?php if (isset($errors['title'])) :?>
                        <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['title']?></small>
                    <?php endif;?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?=endBlock("body")?>