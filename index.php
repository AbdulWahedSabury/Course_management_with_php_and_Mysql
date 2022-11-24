<?php require_once "./partials/header.php";  ?>
<?php  
    if (!isset($_COOKIE["signup"])) {
       header("location:login.php");
    }
?>
<div id="app">
    <!-- Navbar -->
    <?php require_once "./partials/navbar.php"; ?>

    <!-- Sidebar -->
    <?php require_once "./partials/sidebar.php"; ?>


    <!-- Main section -->
    <section class="section main-section" style="min-height:calc(100vh - 190px);">

        <!-- Card -->
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        </div>

    </section>



    <!-- Footer -->
    <?php require_once "./partials/copyright.php";?>

</div>
<?php require_once "./partials/footer.php"; ?>