<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-success text-white">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item">
                <a href="dashborad.php" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="post.php" class="nav-link text-white">Post</a>
            </li>
            <li class="nav-item">
                <a href="category.php" class="nav-link text-white">Categories</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link text-white">Users</a>
            </li>
        </ul>
        <ul  class="nav navbar-nav float-right">
            <li>
                <i class="fas fa-user"></i>
                <a href="profire.php" class="nav-link text-white d-inline">Welcome<?php echo $_SESSION['username']?></a>
            </li>
            <li>
                <i class="fas fa-user-times"></i>
                <a href="logout.php" class="nav-link text-white d-inline">Logout</a>
            </li>
        </ul>
    </nav>

    <header class="container-fluid bg-danger text-white pb-4 mb-4">
        <i class="far fa-folder-open fa-2x p-4"></i>
        <h1 class="d-inline">Categories</h1>
    </header>

    <div class="container mx-auto w-50 mb-4">
        <form action="" method="post" class="form-inline bg-light">
            <div class="form-group">
                <p class="p-4">Add Categories</p>
                <input type="text" name="category" class="form-control">
                <input type="submit" name="add" value="add" class="btn btn-outline-dark">
            </div>
        </form>
            <?php
                if(isset($_POST['add'])){
                    function getValue(){
                        $categoryname = $_POST['category'];
                        insertTable($categoryname);
                    }
                    
                    function insertTable($categoryname){
                        require_once 'connection.php';
            
                        $insertCategory = "INSERT INTO `category`(category_name) VALUES('$categoryname')";
                            if($conn->query($insertCategory)){
                                header("Location: category.php");
                            }else{
                                echo "error".$conn->error;
                            }
                    }
                    getValue();
                }
            ?>

        <table class="table table-striped table-bordered table-hover  mx-auto">
            <thead  class="table-dark">
                <th>Category ID</th>
                <th>Category Name</th>
            </thead>
            <tbody>
            <?php
                require_once 'connection.php';
                $display = "SELECT * FROM `category`";
                $result = $conn->query($display);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $categoryID = $row['category_id'];
                        $categoryname = $_SESSION['catgoryname'] = $row['category_name'];
                        echo "
                        <tr>
                            <td>".$categoryID."</td>
                            <td>".$categoryname."</td>
                        </tr>";
                    }
                }else{
                    echo "No records found";
                }
                $conn->close();
            ?>
            </tbody>
        </table>
    </div>

    <footer class="container-fluid bg-dark text-white text-center p-4">
        <p> Copyright  Blogen Admin UI</p>
    </footer>
</body>
</html>



