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
                <a href="profire.php" class="nav-link text-white d-inline">Welcome<?php echo $_SESSION['username']?></a>
            </li>
            <li>
                <i class="fas fa-user-times"></i>
                <a href="logout.php" class="nav-link text-white d-inline">Logout</a>
            </li>
        </ul>
    </nav>

    <header class="container-fluid bg-primary text-white pb-4 mb-4">
            <i class="fas fa-pencil-alt fa-2x p-4"></i>
            <h1 class="d-inline">Post</h1>   
    </header>

    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <h5>title</h5>
                <input type="text" name="title" class="form-control" >
            </div>
            <div class="form-group">
                <h5>Date Posted</h5>
                <input type="date" name="date" class="form-control" placeholder="dd/mm/yyyy">
            </div>
            <h5>category</h5>
            <select name="category" class="form-control">
                    <option selected disabled>CHOOSE A CATEGORY:</option>
                        <?php
                            require_once 'connection.php';
                            $sql = "SELECT * FROM `category`";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $categoryname = $row['category_name'];
                                    // $categoryID = $row['category_id'];
                                    echo "<option value='".$categoryname."'>".$categoryname."</option>";
                                }
                            }
                        ?>
                </select>
            <div class="form-group">
                <h5>Post</h5>
                <textarea name="post_text" class="form-control"></textarea>
            </div>
            <h5>Author:  <?php echo $_SESSION['username']?></h5>
                
            
            <input type="submit" name="post" value="post" class="btn btn-primary m-2">
        </form>
    </div>
    
</body>

<footer class="container-fluid bg-dark text-white text-center p-4">
        <p> Copyright  Blogen Admin UI</p>
</footer>
</html>
<?php
    if(isset($_POST['post'])){
        function getValue(){
            $title = $_POST['title'];
            $date = $_POST['date'];
            $category = $_POST['category'];
            $posttext = $_POST['post_text'];
            $uname = $_SESSION['username'];

            // echo $title, $date, $category, $posttext;
            insertPost($uname,$title,$date,$posttext,$category);
        }

        function insertPost($uname,$title,$date,$posttext,$category){
            include 'connection.php';
            $insertPost = "INSERT INTO `post`(username,title,post,category_name,date) VALUES('$uname','$title','$posttext','$category','$date')";
            if($conn->query($insertPost)){
                header("Location: post.php");
            }else{
                echo "error".$conn->error;
            }
        }
        getValue();
        $conn->close();
    }

?>