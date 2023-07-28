<?= inheritance("base-admin")?>

<?=block("title")?>Category<?=endBlock("title")?>

<?=block("body")?>
<div class="card">
    <div class="card-header d-flex flex-wrap py-2 align-items-center">
        <div class="col-sm-6">
            <h5 class="card-title font-weight-bold">
                <i class="fas fa-tag mr-2"></i>Category
            </h5>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <a href="<?=path("app_admin_category_new")?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle mr-1"></i>New</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorys)):?>
                    <?php foreach ($categorys as $category):?>
                        <tr>
                            <td><?=$category->getId()?></td>
                            <td><?=$category->getTitle()?></td>
                            <td><?=$category->getCreatedAt()->format("Y-m-d H:i")?></td>
                            <td>
                                <a href="<?=path("app_admin_category_show",['id' => $category->getId()])?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                                <a href="<?=path("app_admin_category_edit",['id' => $category->getId()])?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <form class="d-inline" method="post" action="<?=path("app_admin_category_delete",['id' => $category->getId()])?>" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="4">Not find data?</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
<?=endBlock("body")?>