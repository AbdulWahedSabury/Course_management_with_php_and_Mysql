<?php  require_once './partials/header.php';  ?>
<pre>
<?php  
if (isset($_GET['student_id'])) {
            $id = $_GET['student_id'];
            $sql = "SELECT * From students where id = $id";
            $result = $db->query($sql);
            if ($result->num_rows === 1) {
                $row = $result->fetch_all(1);
            }
}

if (isset($_POST['full_name'])) {
    $id = $_GET['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POgST['email'];
    $image = $_FILES['image']['name'];
    $temp_loaction = $_FILES['image']['tmp_name'];

    $sql = "UPDATE students SET full_name = '$full_name', email = '$email', image = '$image' WHERE id = $id";
    $result = $db->query($sql);
    if ($result) {
        move_uploaded_file($temp_loaction,'./img/'.$image);
        header('location:students.php');
    }
}
?>
</pre>
<div id="app">
    <!-- Navbar -->
    <?php require_once "./partials/navbar.php"; ?>

    <!-- Sidebar -->
    <?php require_once "./partials/sidebar.php"; ?>


    <!-- Main section -->
    <section class="section main-section" style="min-height:calc(100vh - 190px);">

        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        Profile
                    </p>
                </header>
                <div class="card-content">
                    <div class="image w-48 h-48 mx-auto">
                        <img src="<?=  $row[0]['image'] ? $row[0]['image'] : '/img/default-avatar.png'?>"
                            alt="John Doe" class="rounded-full">
                    </div>
                    <hr>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input type="text" readonly value="<?= $row[0]['full_name']?>" class="input is-static">
                        </div>
                    </div>
                    <hr>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input type="text" readonly value="<?= $row[0]['email']?>" class="input is-static">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        Edit Profile
                    </p>
                </header>
                <div class="card-content">

                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" autocomplete="on" name="full_name"
                                            value="<?= $row[0]['full_name']?>" class="input" required>
                                    </div>
                                    <p class="help">Required. Your name</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="email" autocomplete="on" name="email"
                                            value="<?= $row[0]['email']?>" class="input" required>
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">E-mail</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="file" name="image" class="input file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>


</div>
<?php  require_once "./partials/footer.php";  ?>