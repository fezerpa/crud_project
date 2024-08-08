<?php include_once('header.php')?>
<?php include_once('dbcon.php')?>

<div class="BOX1">
    <h2>
        Estudiantes
    </h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">AGREGAR ESTUDIANTE</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query="select * FROM students";
        $result = mysqli_query($connection,$query);
        
        if(!$result){
            die("query failed".mysqli_error($connection));
        }
        else{
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</td>
                    <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</td>

                </tr>

                <?php
            }
        }
        ?>
    </tbody>
</table>

<!-- Mensajes de alerta de condicionales -->
<?php
    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }
?>
<!-- Mensaje de validación de formulario bien completado -->

<?php
    if(isset($_GET['insert_msg'])){
        echo "<h6>".$_GET['insert_msg']."</h6>";
    }
?>
<!-- Mensaje de actualización correcta -->
<?php
    if(isset($_GET['update_msg'])){
        echo "<h6>".$_GET['update_msg']."</h6>";
    }
?>
<!-- Mensaje de eliminación correcta -->
<?php
    if(isset($_GET['delete_msg'])){
        echo "<h6>".$_GET['delete_msg']."</h6>";
    }
?>

<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar estudiante</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="f_name">Nombre</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Apellido</label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Edad</label>
                <input type="text" name="age" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" name="add_students" value="Guardar"></button>
        </div>
        </div>
    </div>
    </div>
</form>
<?php include_once('footer.php')?>
