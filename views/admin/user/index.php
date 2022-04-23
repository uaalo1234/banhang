<div class="container">
    <div class="mt-3 mb-3">
        <a class="btn btn-primary" href="<?php echo url('admin/user/create') ?>">Create new student</a>
    </div>

    <?php echo Flash::get('success') ?>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Action</th>
            </tr>
        </thead>

    <?php 
        if (count($users) > 0):
            foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td>
                        <a href="<?php echo url("admin/user/show", ['id' => $user['id']]) ?>">View</a>
                        <a href="<?php echo url("admin/user/edit", ['id' => $user['id']])?>">Edit</a>
                        <a href="<?php echo url("admin/user/delete", ['id' => $user['id']])?>" onclick="return confirm('Are you sure')">Delete</a>
                    </td>
                </tr>
            <?php endforeach;
        endif;
    ?>

    </table>
</div>