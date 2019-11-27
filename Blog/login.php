<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d98ab22c54.js" crossorigin="anonymous"></script>
    <style>
        .p{
            color: gray;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-primary text-white p-4">
        <i class="fas fa-user fa-2x"></i>
        <h1 class="d-inline">LOG-IN</h1>
    </header>

    <div class="container mx-auto mt-5 w-50">
        <form action="" method="POST">
            <h5 class="display-4 text-center">ACCOUNT LOGIN</h5>
            <div class="container mx-auto mt-5 w-50">
                <div class="form-group">
                    <h5>Email</h5>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <h5>Password</h5>
                    <input type="password" name="pword" class="form-control" placeholder="password">
                </div>
                <input type="submit" name="login" value="LOGIN" class="btn btn-primary form-control">
                <p class="text-right"><a href="register.php">make an account</a></p>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['login'])){
        function getValue(){
            $email = $_POST['email'];
            $pword = md5($_POST['pword']);
            checkLogin($email,$pword);
        }
        function checkLogin($email,$pword){
            require_once 'connection.php';
            $checkUser = "SELECT * FROM `login` INNER JOIN `user` ON login.login_id = user.login_id WHERE user.email= '$email' AND login.password = '$pword'";
            $result = $conn->query($checkUser);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $email = $row['email'];
                    $pword = $row['password'];
                    $_SESSION['username'] = $row['username'];
                    $status = $row['status'];
                    $loginid = $_SESSION['loginid']= $row['login_id'];

                    echo $email, $pword, $status;
                    if($status == 'U'){
                        header("Location: post.php?id=$loginid");
                    }else if($status == 'A'){
                        header("Location: dashboard.php?id=$loginid");
                    }
                }
            }else{
                echo "email and Password Error.";
            }
        }
        getValue();
    }

?>