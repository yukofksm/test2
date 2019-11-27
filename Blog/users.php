<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .form-group{
            width: 40%;
        }
    </style>
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

    <header class="container-fluid bg-warning text-white pb-4 mb-4">
        <i class="fas fa-users fa-2x p-4"></i>
        <h1 class="d-inline">Users</h1>
    </header>

    <div class="container w-75 bg-light ">
        <form action="" method="post">
            <div class="form-group mx-auto p-4">
                Your name<input type="text" name="name" class="form-control" placeholder="Name">
                Email<input type="email" name="email" class="form-control" placeholder="Email">
                User Name<input type="text" name="username" class="form-control" placeholder="userName">
                Password<input type="password" name="password" class="form-control" placeholder="password">
                <input type="submit" name="save" value="save" class="btn btn-warning form-control">
            </div>          
        </form>

        <?php
        if(isset($_POST['save'])){
            function getValue(){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $uname = $_POST['username'];
                $pword = md5($_POST['password']);
                insertTable($name,$email,$uname,$pword);
            }
            function insertTable($name,$email,$uname,$pword){
                require_once 'connection.php';
                $insertLogin = "INSERT INTO `login`(username,password) VALUES('$uname','$pword')";
                if($conn->query($insertLogin)){
                    $lastLoginID = $conn->insert_id;

                    $insertUser = "INSERT INTO `user`(name,email,username,password,login_id) VALUES('$name','$email','$uname','$pword', '$lastLoginID')";

                    if($conn->query($insertUser)){
                        header("Location: users.php");
                    }else{
                        echo "error".$conn->error;
                    }
                }else{
                    echo "error".$conn->error;
                }
            }
            getValue();
        }
        ?>

        <table class="table table-striped table-bordered table-hover  mx-auto">
            <thead class="table-dark text-center">
                <th>UserID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>LoginID</th>
            </thead>
            <tbody>
            <?php
                include 'connection.php';
                $display = "SELECT * FROM `user` INNER JOIN `login` ON login.login_id = user.login_id WHERE login.status = 'U'";
                $result = $conn->query($display);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        $userID = $row['user_id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $uname = $row['username'];
                        $loginID = $row['login_id'];
                        echo"
                        <tr>
                            <td>".$userID."</td>
                            <td>".$name."</td>
                            <td>".$email."</td>
                            <td>".$uname."</td>
                            <td>".$loginID."</td>
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