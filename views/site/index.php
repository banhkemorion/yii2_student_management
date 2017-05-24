<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>UserNumber</th>
        <th>status</th>
        <th>
                <a class="btn btn-success btn-sm" href="?r=class/add-room">Add Class</a>
        </th>
    </thead>
    <tbody>
    <?php
        if ($class) {
            foreach ($class as $k => $v) {
                    $userNumber = $v->getUser();
                ?>
                    <tr>
                        <td><?= $v->room_id ?></td>
                        <td><?= $v->room_name ?></td>
                        <td><?= count($userNumber) ?></td>
                        <td><?= $v->status ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="?r=class/update-room&id=<?=$v->room_id?>">Update</a>
                            <a class="btn btn-danger btn-sm" href="?r=class/remove-room&id=<?=$v->room_id?>">Remove</a>
                        </td>
                    </tr>   
                <?php
            }
        }

    ?>
    </tbody>
</table>