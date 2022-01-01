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
$Prodct_id = $_GET["id"];
echo $Prodct_id;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,500;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.container1{
	width: 30px;
	height: 40px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 5px;
}

input[type="number"]{
	margin-top: 0;
	height: 40px;
	width: 100px;
	font-size: 10px;
	margin-bottom: 10px;
	background-color: #fff;
	padding-left: 10px;
}
    .btn-cart{
    position: relative;
	padding: 8px 16px;
	border: none;
	background-color: #0000ad;
	color: #9cccfb;
}
.btn-login{
	padding: 8px 16px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
</style>
<body>
<div class="header">
	<div class="container">
		<div class="navbar">
			<div class="logo">
				<img src="images/logo.png" width="220px">
			</div>
			<nav>
				<ul>
					<li><a href="Home.php">Home</a></li>
					<li><a href="Product.php">Product</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">Account</a></li>
				</ul>
			</nav>
			<img src="images/cart.png" width="30px" height="30px">
		</div>
	</div>
<div class="container">
    <div class="row">
<?php
        $sequery="SELECT * FROM `product` where Prodct_id='$Prodct_id'";
           $query=mysqli_query($con,$sequery);
           $nums=mysqli_num_rows($query);
           while($data= mysqli_fetch_array($query))
           {
               ?>
            <div class="col-4">
            <a href="Product_deatils.php?id=<?php echo $data['Prodct_id']  ?>"><img src="images/<?php echo $data['Image']  ?>" alt=""></a>
            <a href="Product_details.php?id=<?php echo $data['Prodct_id']  ?>"><h4><?php echo $data['name']  ?></h4></a>
            <!-- <p><?php echo $data['Prodct_id']  ?></p>
            <p><?php echo $data['name']  ?></p> -->
            <div class="rating">
    				<i class="fa fa-star"></i>
    				<i class="fa fa-star"></i>
    				<i class="fa fa-star"></i>
    				<i class="fa fa-star"></i>
    				<i class="fa fa-star-half-o"></i>
    		</div>
            <p>Rs.<?php echo $data['price']  ?>.00</p>
            <p><?php echo $data['Details']  ?></p>
            <!-- <a href=""><img src="images/<?php echo $data['Image']  ?>" alt="Oppo K3"></a> -->
        </div>
      
<?php       
            }
?>
    </div>
    <div class="container1">
        <form action="" method="POST">
            <div class="form-input">
				<input type="number" name="count" placeholder="Enter Quantity"/>	
			</div>
            <input type="submit" name="cart" value="Add to Cart" class="btn-cart"/> 
        </form>
    </div>    
    <br>
    <br>
    <br>
        <form action="" method="POST">
			<div class="form-input">
				<input type="name" name="user" placeholder="Enter your name"/>	
			</div>
			<div class="form-input">
				<input type="text" name="msg" placeholder="Comment Here..."/>
			</div>
			<input type="submit" name="submit" value="SEND" class="btn-login"/>
		</form>
    <br>
    <br>
    <br>
    <br>
    <h2 style="color:red;">All Comments: </h2>
    <?php
        $van = "SELECT * FROM `comment` WHERE `Prodct_id`='$Prodct_id'";
           $query=mysqli_query($con,$van);
           $nums=mysqli_num_rows($query);
           while($data= mysqli_fetch_array($query)){
                ?>
            <p style="color:green;">User:<?php echo $data['user']  ?></p>
            <p style="color:blue;">Comment:<?php echo $data['Review']  ?></p>
            <?php

           }
        ?>
        <?php
            if(isset($_POST['submit'])){
                

                $user=$_POST['user'];
                $msg=$_POST['msg'];
                
                $vsql="INSERT INTO `comment`(`id`, `Prodct_id`, `Review`, `user`) VALUES ('','$Prodct_id','$msg','$user')";
                
                if($con->query($vsql) == true){
                    echo "Successfully Commented";
                }
                else{
                    echo "ERROR: $vsql <br> $con->error";
                }

                $con->close();
                
            }
        ?>
            <?php
            if(isset($_POST['cart'])){
                
                $count=$_POST['count'];

                $nsql="INSERT INTO `cartnew`(`id`, `Prodct_id`,`name`, `price`, `count`) VALUES ('','$Prodct_id','','','$count')";
                
                if($con->query($nsql) == true){
                    echo "Successfully Added to Cart";
                }
                else{
                    echo "ERROR: $nsql <br> $con->error";
                }

                $con->close();
                
            }
        ?>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-snapchat"></i></a><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="Home.php">Home</a></li>
                <li class="list-inline-item"><a href="Shop.php">Shop</a></li>
                <li class="list-inline-item"><a href="About.php">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">DipteshStore © 2021</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>