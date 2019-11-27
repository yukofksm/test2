<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profire</title>
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
            <i class="fas fa-user fa-2x p-4"></i>
            <h1 class="d-inline">Profire</h1>
    </header>


    <div class="container-fluid row p-4 mb-4">
        <div class="btn-group col-md-4">
            <button type="button" class="btn btn-light"><i class="fas fa-arrow-left fa-lg"></i>Back To Dashboard</button>
        </div>
        <div class="btn-group col-md-4">
                <button type="button" class="btn btn-success"><i class="fas fa-lock  fa-lg"></i>Change Password</button>
        </div>
        <div class="btn-group col-md-4">
            <a href="" class="btn btn-danger" role="button"><i class="fas fa-trash-alt fa-lg"></i>Delete Account</a>
        
    </div>
    <div class="container row mx-auto mt-5">
        <div class="container col-md-7">
            <div>

            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="textarea" class="form-control">
                </div>

            </form>
            <input type="submit" value="Up date" class="btn btn-primary form-control">

        </div>

        <div class="container col-md-5">
            <h3>your avatar</h3>
            <div class="d-block">
                <img src="" alt="" class="img-fluid">
            </div>
            <a href="" class="btn btn-primary form-control" role="button"><i class="fas fa-pencil-alt"></i>Edit Image</a>

        </div>
    </div>
</body>

<footer class="container-fluid bg-dark text-white text-center p-4 mt-4">
        <p> Copyright  Blogen Admin UI</p>
</footer>
</html>