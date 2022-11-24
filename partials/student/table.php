        <?php  
        require_once './db.php';
        $count = 5;
        $query = 'SELECT COUNT(*) FROM students';
        $data = $db->query($query);
        $totalRows = $data->fetch_all(1);
        $totalRecords = $totalRows['0'];
        $value =  (int)($totalRecords['COUNT(*)']/$count +0.8);

        if (isset($_GET['page'])) {
            $offset = ($_GET['page'] - 1) * 5;
            $sql = "SELECT * FROM students LIMIT $offset, $count";
        }else{
            $sql = "SELECT * FROM students LIMIT 0, $count";
        }
        $results = $db->query($sql);
        $rows = $results->fetch_all(1);
        $pagenumber = $value/$count;
        ?>


        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
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
                    <td class="actions-cell">
                        <div class="buttons nowrap">
                            <a class="button small green --jb-modal"
                                href="<?= './profile.php?student_id='.$row['id']?>">
                                <span class="icon"><i class="mdi mdi-pen"></i>Edit</span>
                            </a>

                            <button class="button small red --jb-modal" onclick="deleteStudent(<?= $row['id']?>)"
                                data-target="sample-modal" type="submit">
                                <span class="icon"><i class="mdi mdi-trash-can">Delete</i></span>
                            </button>

                        </div>
                    </td>
                </tr>
                <?php  endforeach; endif;  ?>
            </tbody>
        </table>
        <div class="table-pagination">
            <div class="flex items-center justify-between">
                <ul class="flex gap-6">
                    <?php  for ($i=1; $i <= $value; $i++) :?>
                    <li><a href="./students.php?page=<?= $i;?>" class="button active"><?= $i;  ?></a></li>
                    <?php endfor;  ?>
                </ul>
            </div>
        </div>