<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post</title>
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

    <header class="container-fluid bg-primary text-white p-4 mb-4">
        <i class="fas fa-pencil-alt fa-2x p-4"></i>
        <h1 class="d-inline">Posts</h1>
    </header>

    <div class="container">
    <?php 
        $loginid = $_SESSION['loginid'];
        echo"<h5 class='btn'><a href='post_add.php?id=$loginid'>creat new post</a></h5>";?>

        <table class="table table-striped table-bordered table-hover  mx-auto">
            <thead class="table-dark">
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Author</th>
                <th></th>
            </thead>
            <tbody>
            <?php
                require_once 'connection.php';
                $login_author = $_SESSION['username'];
                $display = "SELECT * FROM `post` WHERE post.username = '$login_author'";
                $result = $conn->query($display);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $postID = $row['post_id'];
                        $title = $row['title'];
                        $category = $row['category_name'];
                        $date = $row['date'];
                        $author = $row['username'];
                        echo"
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
    

    <footer class="container-fluid bg-dark text-white text-center p-4">
        <p> Copyright  Blogen Admin UI</p>
    </footer>
</body>
</html>