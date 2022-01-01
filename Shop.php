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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,500;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .search-container {
        max-width: 600px;
        margin: 60px auto;
    }
    .search-container form {
    position: relative;
}
.search-container form button {
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    width: 60px;
    background: transparent;
    border: transparent;
    font-size: 20px;
    color: #4b00ff;
    cursor: pointer;
    outline: 0;
}
    input[type="text"] {
        display: block;
        width: calc(100% - 16px); 
        font-size: 18px;
        font-weight: 600;
        color: #4b00ff;
        padding: 10px;
        border: 2px solid #4b00ff;
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
					<li><a href="About.php">About</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">Account</a></li>
				</ul>
			</nav>
			<img src="images/cart.png" width="30px" height="30px">
		</div>
		<div class="row">
			<div class="col-2">
				<h1>Take Your Shopping<br>To A New Level!</h1>
				<p>If something makes you happier then<br>you should do that again and again...</p>
			</div>
			<div class="col-2">
					<img src="images/image1.png" alt="">
			</div>
	</div>
	</div>
    <div class="search-container">
        <form action="">
            <input type="text" placeholder="Search Shop" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>  
<div class="container">
    <div class="row">
        <div class="col-4">
<?php
        $sequery="SELECT * FROM `shop` ORDER BY RAND() ";
           $query=mysqli_query($con,$sequery);
           $nums=mysqli_num_rows($query);
           while($data= mysqli_fetch_array($query))
           {
               ?>
            <div class="col-4">
            <a href="Product.php?id=<?php echo $data['Shop_id']  ?>"><img src="images/<?php echo $data['Image']  ?>" alt=""></a>
            <a href="Product.php?id=<?php echo $data['Shop_id']  ?>"><h4><?php echo $data['name']  ?></h4></a>
            <p  style="color:green;"><?php echo $data['Type']  ?></p>
            <p  style="color:blue;"><?php echo $data['Address']  ?></p>
         

        </div>
      
<?php       
            }
?>
        </div>
        </div>
</div>
<div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-snapchat"></i></a><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="Home.php">Home</a></li>
                <li class="list-inline-item"><a href="Shop.php">Shop</a></li>
                <li class="list-inline-item"><a href="About.php">About</a></li>
                <li class="list-inline-item"><a href="Terms.php">Terms</a></li>
                <li class="list-inline-item"><a href="Policy.php">Privacy Policy</a></li>
            </ul>
            <p class="copyright">DipteshStore © 2021</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>