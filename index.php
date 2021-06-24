<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP CRUD</title>
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php
        if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
        <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        ?>
    </div>
    <?php endif; ?>
    <?php
        $mysqli = new mysqli ('localhost', 'root', '1234', 'php_crud_data') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
//        pre_r($result);
//        pre_r($result->fetch_assoc());
        ?>
        <div class="row content-justify-center p-5">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>



    <?php
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td>
                    <a href="index.php ? edit=<?php echo $row['id'] ;?>" class="btn btn-info">Edit</a>
                    <a href="index.php ? delete=<?php echo $row['id'] ;?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </table>
        </div>
        <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value = "<?php echo $name ;?>" required>
                    <!--                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                </div>
                <div class="mb-3 form-group">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value = "<?php echo $location ;?>" placeholder="location" required>
                </div>
                <!--            <div class="mb-3 form-check">-->
                <!--                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                <!--            </div>-->


                <div class="d-grid col-4 mx-auto form-group">
                    <?php
                    if($update == true):
                    ?>
                        <button type="submit"class="btn btn-info" name="update">Update</button>
                    <?php else: ?>
                         <button type="submit"class="btn btn-primary" name="save">Save</button>
                    <?php endif; ?>
<!--                    <button class="btn btn-primary" type="submit">Save</button>-->
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>