<?php  
session_start();//session starts here  
?>  
  
  
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
  
</style>  
  
<body>  
  
  
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Sign In</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="login.php">  
                        <fieldset>  
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="E-mail" required name="user_email" type="email" autofocus >  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" required name="user_password" type="password" value="">  
                            </div>  
  
  
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
  
</body>  
  
</html>  
  
<?php  
  
include("database.php");  
  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['user_email'];  
    $user_password= md5($_POST['user_password']);  
  
    $check_user="select * from user WHERE user_email='$user_email'AND user_password='$user_password'";  
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
     $_SESSION['user_email'] =$user_email;//here session is used and value of $user_email store in $_SESSION. 

        echo "<script>window.open('dashboard.php','_self')</script>";  
  
        
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?>  
