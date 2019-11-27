<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-success text-white">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
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


    <header class="container-fluid bg-primary text-white py-4 mb-4">
            <i class="fas fa-cog fa-2x p-4"></i>
            <h1 class="d-inline">Dashboard</h1>
    </header>

    <div class="container-fluid row p-4 mb-4">
        <div class="btn-group col-md-4">
            <a href="post_add.php" class="btn btn-primary text-white" role="button"><i class="fas fa-plus fa-lg"></i>Add Post</a> 
        </div>
        <div class="btn-group col-md-4">
            <a href="category.php" class="btn btn-success text-white" role="button"><i class="fas fa-plus fa-lg"></i>Add Category</a> 
        </div>
        <div class="btn-group col-md-4">
            <a href="users.php" class="btn btn-warning text-white" role="button"><i class="fas fa-plus fa-lg"></i>Add User</a>        
        </div>
    </div>

    <div class="container-fluid row w-75 mx-auto">
        <div class="col-md-8">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date Post</th>
                    <th>Author</th>
                    <th></th>
                </thead>
                <tbody>
                <?php
                    require_once 'connection.php';
                    $display = "SELECT * FROM `post`";
                    $result = $conn->query($display);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $postID = $row['post_id'];
                            $title = $row['title'];
                            $category = $row['category_name'];
                            $date = $row['date'];
                            $author = $row['username'];
                            echo "
                            <tr>
                                <td>".$postID."</td>
                                <td>".$title."</td>
                                <td>".$category."</td>
                                <td>".$date."</td>
                                <td>".$author."</td>
                                <td><a href='post_detalles.php?id=$postID'>Detalle</a></td>
                            </tr>";
                        }
                    }else{
                        echo "No records found";
                    }
                ?>
                </tbody>
            </table>
            
        </div>
        <div class="col-md-4">
            <div class="container text-white bg-primary text-center p-4 m-2">
                <h3>Posts</h3>
                <p> <i class="fas fa-pencil-alt fa-2x"></i></p>
                <a href="post.php?id=$_SESSION['loginid']" class="btn btn-primary" role="button">View</a>
            </div>
            <div class="container text-white bg-success text-center p-4 m-2">
                <h3>Category</h3>
                <p> <i class="far fa-folder-open fa-2x"></i></p>
                <a href="category.php?id=$_SESSION['loginid']" class="btn btn-success" role="button">View</a>
            </div>
            <div class="container text-white bg-warning text-center p-4 m-2">
                <h3>Users</h3>
                <p> <i class="fas fa-users fa-2x"></i></p>
                <a href="users.php?id=$_SESSION['loginid']" class="btn btn-warning" role="button">View</a>
            </div>
        </div>
    </div>
    <footer class="container-fluid bg-dark text-white text-center p-4 mt-4">
        <p> Copyright  Blogen Admin UI</p>
    </footer>
</body>
</html>