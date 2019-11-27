<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container w-75">
    <h3 class="display-3 text-center">REGISTER</h3>
        <form action="" method="post">
            <div class="form-group mx-auto p-4 w-50">
                Your name<input type="text" name="name" class="form-control" placeholder="Name">
                Email<input type="email" name="email" class="form-control" placeholder="Email">
                User Name<input type="text" name="username" class="form-control" placeholder="userName">
                Password<input type="password" name="password" class="form-control" placeholder="password">
                <input type="submit" name="save" value="save" class="btn btn-warning form-control my-4">
            </div>          
        </form>
    </div>

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
                        
                        $sql = "SELECT * FROM `login` INNER JOIN `user` ON login.login_id = user.login_id";
                        $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $loginid = $row['login_id'];
                                }
                                header("Location: login.php?id=$loginid");
                            }
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
        


    
</body>
</html>