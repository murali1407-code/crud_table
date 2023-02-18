<?php

include "db.php";
$db = db_connection();

if($_REQUEST['action'] == 'fetch_data'){
    if(isset($_POST['id'])){
        $fetchSql = "SELECT * FROM crud_table WHERE id = '".$_POST['id']."'";
        $fetchRsql = mysqli_query($db, $fetchSql);
        $fetchFsql = mysqli_fetch_array($fetchRsql);
        echo json_encode($fetchFsql);
    }
}

?>