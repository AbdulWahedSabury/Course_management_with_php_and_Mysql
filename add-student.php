<?php require_once "./partials/header.php";  ?>
<div id="app">
    <!-- Navbar -->
    <?php require_once "./partials/navbar.php"; ?>

    <!-- Sidebar -->
    <?php require_once "./partials/sidebar.php"; ?>


    <?php
    

    if(isset($_POST["full_name"])) {

        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $file = $target_file;
            } else {
                $file = 'img/default';
            }
        }
        $fullname = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO students (full_name,email,password,image,role) VALUES ('$fullname','$email','$password','$file',2)";
        $flag = $db->query($sql);
        
        if($flag){
            echo '
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <p>Student added successfully.</p>
            </div>
            ';
        }
    }
?>
    <!-- Main section -->
    <section class="section main-section" style="min-height:calc(100vh - 190px);">
    <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        Add Student
                    </p>
                </header>
                <div class="card-content">

                    <form method="GET" action="./test.php" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" autocomplete="on" name="full_name"
                                            value="" class="input" required>
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
                                            value="" class="input" required>
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">password</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="password" autocomplete="on" name="password"
                                            value="" class="input" required>
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">photo</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="file" name="image" class="input file" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button green">
                                    Add student
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
