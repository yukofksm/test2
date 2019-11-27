<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add post</title>
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
                <a href="profire.php" class="nav-link text-white d-inline">Welcome!  <?php echo $_SESSION['username']?></a>
            </li>
            <li>
                <i class="fas fa-user-times"></i>
                <a href="logout.php" class="nav-link text-white d-inline">Logout</a>
            </li>
        </ul>
    </nav>

    <header class="container-fluid bg-primary text-white p-4 mb-4">
            <i class="fas fa-pencil-alt fa-2x p-4"></i>
            <h1 class="d-inline">Post detalle</h1>   
    </header>
    <div class="container w-75">
    <?php
        require_once 'connection.php';
        $loginid = $_GET['id'];
        $getPost = "SELECT * FROM `post` INNER JOIN `login` ON post.username = login.username WHERE post.post_id = $loginid";
        $result = $conn->query($getPost);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $author = $row['username'];
                $title = $row['title'];
                $date = $row['date'];
                $category = $row['category_name'];
                $post = $row['post'];

                echo "
                    <div>
                        <h5>title:</h5> <p>".$title."</p>
                    </div>

                    <div>
                        <h5>Date Posted:</h5><p> ".$date."</p>
                    </div>

                    <div>
                        <h5>category:</h5> <p>".$category."</p>
                    </div>

                    <div>
                        <h5>Post:<br></h5><p> ".$post."</p>
                    </div>

                    <div>
                        <h5>Author:</h5> <p>".$author."<p>
                    </div>
                    ";
            }
        }
    ?>
    </div>
    
    <footer class="container-fluid bg-dark text-white text-center p-4">
            <p> Copyright  Blogen Admin UI</p>
    </footer>
</body>
</html>
