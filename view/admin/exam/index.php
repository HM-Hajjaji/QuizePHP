<?= inheritance("base-admin")?>

<?=block("title")?>Exam<?=endBlock("title")?>

<?=block("body")?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-star mr-2"></i>Exam</h3>
        </div>
        <div class="card-body">
           <?php include_once viewPath()."admin/exam/include/_table.php"?>
        </div>
    </div>
<?=endBlock("body")?>