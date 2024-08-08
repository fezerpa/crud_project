<?php include_once('header.php')?>
<?php include_once('dbcon.php')?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = '$id'"; 
    $result = mysqli_query($connection, $query);
    
    if(!$result){
        die("query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

?>

<?php
    if (isset($_POST['update_students'])) {
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', age = '$age' WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?update_msg=Actualizado correctamente');
            exit();
        }
    }
?>

<form action="update_page_1.php?id=<?php echo $id ?>" method="post">
    <div class="form-group">
        <label for="f_name">Nombre</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Apellido</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Edad</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="update_students" value="Update">
</form>

<?php include_once('footer.php')?>
