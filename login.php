<!DOCTYPE html>
<?php
session_start();
  if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header('Location: index.php');
  }
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rokto Lagbe?</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

<?php
    $err = '';

    if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    if (empty($email) || empty($password)) {
        $err = 'empty';
    } else{
        // check in database
        include 'res/dbconnector.php';
        $sql = "SELECT * FROM admin WHERE email = '$email' AND pass = '$password';";
            $result = mysqli_query($conn, $sql);
            $result_check = mysqli_num_rows($result);

            if( $result_check > 0 ){
            $_SESSION['login'] = 1;
            header('Location: index.php');
            } else{
            $err = 'not_matched';
            }
        // check in database
    }
    }

    ?>
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Rokto Lagbe??</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Admin Login <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About Rokto Lagbe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">About Rokto Lagbe</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
    </nav>


    <div class="container pt-5 mb-5">
    <form class="mx-auto pt-5" action="#" method="post" style="max-width: 400px">
    <div class="form-group">
        <div class="text-center mb-5">
            
        <p class="display-4">Login</p>
        
        <hr>
        </div>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <!-- error message -->
    <?php
        if ($err == 'empty'){
        ?>
        <div class="alert alert-danger" role="alert">
            <b>ERROR!</b> Fill al fields
        </div>
        <?php
        }
        else if($err == 'not_matched'){
        ?>
        <div class="alert alert-danger" role="alert">
            <b>ERROR!</b> Invalid Email or Password
        </div>
        <?php
        }
    ?>
    <!-- error message -->
    <button type="submit" name="login" class="btn btn-secondary btn-block">Log in</button>
    <hr class="mt-5">
    <p class="lead text-center"> Copyright &copy; <?php echo date('Y'); ?> | All Rights Reserved <b>Team RoktoLagbe</b> </p>
    </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>