<?php
include_once('dbcon.php');
if(isset($_POST['add_students'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];

    if($f_name=="" || empty($f_name)){
        header('location:index.php?message=Debes indicar el nombre del estudiante');
    } elseif($l_name=="" || empty($l_name)){
        header('location:index.php?message=Debes indicar los apellidos del estudiante');
    } elseif($age=="" || empty($age)){
        header('location:index.php?message=Debes indicar la edad del estudiante');
    } else{
            $query= "insert into students (first_name, last_name, age) values ('$f_name', '$l_name', '$age')";
            $result=mysqli_query($connection, $query);

            if(!$result){
                die("query failed".mysqli_error());
            }
            else{
                header('location:index.php?insert_msg= Se agrego correctamente el estudiante');
            }
    }


}

?>