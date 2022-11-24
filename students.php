<?php require_once "./partials/header.php";  ?>
<div id="app">
    <!-- Navbar -->
    <?php require_once "./partials/navbar.php"; ?>

    <!-- Sidebar -->
    <?php require_once "./partials/sidebar.php"; ?>


    <!-- Main section -->
    <section class="section main-section" style="min-height:calc(100vh - 190px);">
        <?php  
        $sql = "SELECT * FROM students";
        $results = $db->query($sql);
        $rows = $results->fetch_all(1);
        ?>


        <div class="card has-table">
            <header class="card-header" style="display: flex;justify-content: center; align-items: center;">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Students
                </p>
                <input class="input" type="text" name="keyword" placeholder="search" id="search">
            </header>
            <div class="card-content">
                <?php  require_once './partials/student/table.php';  ?>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php require_once "./partials/footer.php"; ?>
    <script>
    function deleteStudent(id) {
        $.ajax({
            type: 'post',
            url: './function.php',
            data: {
                id: id
            },
            success: function(response) {
                $(".card-content").html(response);
            }
        });

    }

    $(document).on("keyup", '#search', function() {
        var word = $(this).val();
        $.ajax({
            method: 'get',
            url: './function.php?keyword=' + word,
            success: function(response) {
                $(".card-content").html(response);
            }
        })
    });
    </script>