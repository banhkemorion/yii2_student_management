<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>class_name</th>
        <th>status</th>
        <th>
                <a class="btn btn-success btn-sm" href="?r=subject/add-subject">Add Subject</a>
        </th>
    </thead>
    <tbody>
    <?php
        if ($subject) {
            foreach ($subject as $k => $v) {
                    $class = $v->getClass();
                ?>
                    <tr>
                        <td><?= $v->subject_id ?></td>
                        <td><?= $v->subject_name ?></td>
                        <td><?= $class->room_name ?></td>
                        <td><?= $v->status ?></td>
                        <td>
                            <a class="btn btn-info btn-sm" href="?r=subject/update-subject&id=<?= $v->subject_id ?>">Update</a>
                            <a class="btn btn-danger btn-sm" href="?r=subject/remove-subject&id=<?= $v->subject_id ?>">Remove</a>
                        </td>
                    </tr>   
                <?php
            }
        }

    ?>
    </tbody>
</table>