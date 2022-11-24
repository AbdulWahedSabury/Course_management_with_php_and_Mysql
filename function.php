<?php  
require_once 'db.php';

if(isset($_POST['id'])){
    $id = intval($_POST['id']);
    $sql = "DELETE From students WHERE id = $id";
    $result = $db->query($sql);
    return require_once './partials/student/table.php';
}

if (isset($_GET['keyword'])) {
        $word = $_GET['keyword'];
        $sql = "SELECT * From students WHERE full_name LIKE '%$word%'";
        $results = $db->query($sql);
        $rows = $results->fetch_all(1);
      return require_once './partials/student/filter.php';
}
?>