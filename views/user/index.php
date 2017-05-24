<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Class_id</th>
        <th>status</th>
        <th>
                <a class="btn btn-success btn-sm" href="?r=user/add-user"?>Add User</a>
        </th>
    </thead>
    <tbody>
    <?php
        if ($user) {
            foreach ($user as $k => $v) {
                ?>
                    <tr>
                        <td><?= $v->id ?></td>
                        <td><?= $v->user_name ?></td>
                        <td>
                            <img src="<?= $v->avatar ?>" class='profile-image img-circle' width=40>
                        </td>
                        <td><?= $v->class_id ?></td>
                        <td><?= $v->status ?></td>
                        <td>
                            <a class="btn btn-info btn-sm"  href="?r=user/update-user&id=<?= $v->id ?>">Update</a>
                            <a class="btn btn-danger btn-sm" href="?r=user/remove-user&id=<?= $v->id ?>">Remove</a>
                        </td>
                    </tr>   
                <?php
            }
        }

    ?>
    </tbody>


</table>