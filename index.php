<?php 
$host="localhost";
$user="root";
$password="";
$db="demo";

$con=mysqli_connect($host,$user,$password,$db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Form</title>
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<style>
    body{
	margin: 0 auto;
	background-image: url("/DipteshStore/images/tech1.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

.container{
	width: 500px;
	height: 450px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="email"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
</style>
<body>
	<div class="container">
	<img src="images/user1.jpg"/>
		<form action="" method="POST">
			<div class="form-input">
				<input type="email" name="email" placeholder="testing@gmail.com"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="diptesh123"/>
			</div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login"/>
		</form>
        <?php
            if(isset($_POST['submit'])){
                
                $mail=$_POST['email'];
                $password=$_POST['password'];
                
                $sql="select * from `loginform` where `Email`='$mail'AND `Pass`='$password'";
                
                $result=mysqli_query($con,$sql);
                
                if(mysqli_num_rows($result)==1){
                    echo "Successfully Login";
                    echo "<script> window.location.assign('Home.php'); </script>";
                    exit();
                }
                else{
                    echo " You Have Entered Incorrect Password";
                    exit();
                }

                    
            }
        ?>
	</div>
    Click here to clean <a href = "logout.php" tite = "Logout">Session.
</body>
</html>