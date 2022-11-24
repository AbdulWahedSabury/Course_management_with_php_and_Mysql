<?php require_once "./partials/header.php" ?>
<div id="app">

    <?php 
        if (isset($_POST["full_name"])) {
            $fullname = $_POST["full_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql = "INSERT INTO user (full_name,email,password,role) VALUES ('$fullname','$email','$password',2)";
            $flag = $db->query($sql);
            if ($flag) {
                $_SESSION['success_signup'] = 1;
                $_SESSION['signup'] = 1;
                setcookie("signup",1,time() + (24 * 60 * 60));
                header("location:index.php");
            }   
        }
    ?>
    <section class="section main-section">
        <div class="card" style ="width:30% ">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    Register Form
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="">

                    <div class="field spaced">
                        <label class="label">Name</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="full_name"
                                autocomplete="fullname">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>
                    <div class="field spaced">
                        <label class="label">Email</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="email"
                                autocomplete="email">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                        </div>
                    </div>

                    <div class="field spaced">
                        <label class="label">Password</label>
                        <p class="control icons-left">
                            <input class="input" type="password" name="password" 
                                autocomplete="current-password">
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                        </p>
                    </div>
                    <hr>

                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Register
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>
</div>
<script>
document.querySelector("html").classList.add("form-screen");
</script>
<?php  require_once "./partials/footer.php";?>