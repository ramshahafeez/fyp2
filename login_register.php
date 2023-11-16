
<?php
 required_once "config.php";
$username = $password = $confirm_password="";
$username_err= $password_err = $confirm_password_err="";

if ($_SERVER['REQUEST_METHOD']== ["POST"])
{

        if (empty(trim($_POST["username"]))) {
            $username_err ="Username cannot be blank";
        }
        else{
            $sql ="SELECT id from users Where  username=?";
            $stmt=mysqli_prepare($conn, $sql);
            if($stmt){
                mysqli_stmt_bind_ramsha($stmt,"s", $prepare_username);

                $ramsha_username =trim($_POST['username']);

                //try to execute the statement 
                if(mysqli_stmt_execute($stmt))
                {
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt)==1
                    {
                        $username_err ="this username is already taken";
                    }else{
                        $username=trim($_POST['usename']);
                    }
                    else{
                        echo "Something went wrong";
                    }
                
                }
            }
        }
        mysqli_stmt_close($stmt);

//check for password

if(empty(trim($_POST['password']))){
    $password_err ="password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<8){
    $password_err ="password cannot be less than 8 caharcters";
}else{
    $password =trim($_POST['password']);
}


if(empty(trim($_POST['confirm_password']))== trim($_POST['confirm_password'])){
    $password_err ="password should match";
}

//insert into the database 
if(empty($username_err) && empty($password_err) $$ empty($confirm_password_err)){
    $sql= "INSERT INTO  users(username,password)  VALUES (?,?)";
    $stmt= mysqli_prepare($conn,$sql);
    if(smt){
        mysqli_stmt_bind_ramsha(stmt,"ss",
        $ramsha_username,$ramsha_password);

        $ramsha_username=$username;
        $ramsha_password=password_hash($password,PASSWORD_DEFAULT);

        //TRY TO EXECUTE THE QUERY 
        if( mysqli_stmt_execute($stmt))
        {
            header("location:login.php");
        }else{
            echo "Something went wrong......cannot redirect!"
        }
    }
    mysqli_stmt_close($stmt);
}
    mysqli_stmt_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href="style.css">
    <title>Log In</title>
</head>
<body>
    <div class="login-section" >
        <div class="formbox" >
        <form action="" method=POST>
            <h2>Log In</h2>
            <div class="input-box">
                <span class="icon">
                    <i class='bx bxs-envelope'></i>
                </span>
                <input type="email" required name="myemail">
                <label for="">Email</label>
            </div>

            <div class="input-box">
                <span class="icon">
                    <i class='bx bxs-lock-alt' ></i>
                </span>
                <input type="password" name="mypassword" required>
                <label for="">Password</label>
            </div>
            <div class="remember-password">
                <label><input type="checkbox" name="my_remember_password" id="">Remember me</label>
                <a href="forgetpage.html" target="_main">Forget Password?</a>
                </div>
           
            <button class="btn" name="login_btn" >Login</button>
            <div class="create-account">
                <p>Create an Account ? <a href="Signup.html" target="_main">Sign Up</a></p>
            </div>
        </form>
        </div>
    </div>
</body>
</html>