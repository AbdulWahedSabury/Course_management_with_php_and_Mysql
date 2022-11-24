<table>
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (count($rows) > 0):
            foreach($rows as $row): 
        ?>
        <tr>
            <td class="image-cell">
                <div class="image">
                    <img src="<?= $row['image'] ?? './img/avatar.jpg' ?>" class="rounded-full">
                </div>
            </td>
            <td data-label="fullname"><?=  $row['full_name'];   ?></td>
            <td data-label="email"><?= $row["email"]   ?></td>
            <td data-label="role"><?=  $row["role"] === 1 ? "Admin" : "User";  ?></td>
            <td class="actions-cell">
                <div class="buttons nowrap">
                    <a class="button small green --jb-modal" href="<?= './profile.php?student_id='.$row['id']?>">
                        <span class="icon"><i class="mdi mdi-pen"></i></span>
                    </a>

                    <button class="button small red --jb-modal" onclick="deleteStudent(<?= $row['id']?>)"
                        data-target="sample-modal" type="submit">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>

                </div>
            </td>
        </tr>
        <?php  endforeach; endif;  ?>
    </tbody>
</table>