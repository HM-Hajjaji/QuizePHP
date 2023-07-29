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
            <?php
            include_once viewPath()."tools/action.php";
            echo action(path("app_admin_category_new"),"btn-primary","fa-plus-circle mr-1","New")
            ?>
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
                                <?php
                                    include_once viewPath()."tools/action.php";
                                    echo action(path("app_admin_category_show",['id' => $category->getId()]),"btn-primary","fa-info-circle");
                                    echo action(path("app_admin_category_edit",['id' => $category->getId()]),"btn-info","fa-edit");
                                    echo delete(path("app_admin_category_delete",['id' => $category->getId()]));
                                ?>
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