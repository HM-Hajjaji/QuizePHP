<div class="card">
    <div class="card-header d-flex flex-wrap py-2 align-items-center">
        <div class="col-sm-6">
            <h5 class="card-title font-weight-bold">
                <i class="fas fa-plus-circle mr-2"></i>New category
            </h5>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <a href="<?=path("app_admin_category")?>" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="card-body">
        <form action="<?=path("app_admin_category_new")?>" method="post">
            <div class="card-body">
                <div class="form-group mb-1">
                    <label for="exampleInputEmail1">Title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="<?=$old['title']??''?>">
                </div>
                <?php if (isset($errors['title'])) :?>
                    <small class="text-danger font-weight-bold"><span class="badge badge-danger">ERROR</span> <?=$errors['title']?></small>
                <?php endif;?>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>