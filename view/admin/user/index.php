<?php
template()->extends("base-admin");
template()->assign("title","User");
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user mr-2"></i>User</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($users)):?>
                <?php foreach ($users as $user):?>
                    <tr>
                        <td><?=$user->getId()?></td>
                        <td><?=$user->getName()?></td>
                        <td><?=$user->getUsername()?></td>
                        <td><?=$user->getCreatedAt()->format("Y-m-d H:i")?></td>
                        <td></td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td colspan="5">Not find data?</td>
                </tr>
            <?php endif;?>
            </tbody>
        </table>
    </div>
</div>