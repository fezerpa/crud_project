<?php include_once('dbcon.php')?>

<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE from students WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed: " . mysqli_error($connection));
        }
        else {
            header('location:index.php?delete_msg=Alumno borrado correctamente');
        }
    }
?>