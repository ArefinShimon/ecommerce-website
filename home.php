<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "weblab");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="home.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<?php
require ("controller/user.php");
require ("controller/home.php");

$user = new User();
$home = new Home();

            if(!$user->checkLogin()){
                header('Location: login.php');
            }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>My website</title>
    <style>
        body {
            background-color: #11324D;
        }

        .team-boxed {
            color: #313437;
            background-color: #eef4f7;
        }

        .team-boxed p {
            color: #7d8285;
        }

        .team-boxed h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .team-boxed h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-boxed .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-boxed .intro p {
            margin-bottom: 0;
        }

        .team-boxed .people {
            padding: 50px 0;
        }

        .team-boxed .item {
            text-align: center;
        }

        .team-boxed .item .box {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .team-boxed .item .name {
            font-weight: bold;
            margin-top: 28px;
            margin-bottom: 8px;
            color: inherit;
        }

        .team-boxed .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #d0d0d0;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .team-boxed .item .description {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .team-boxed .item img {
            max-width: 160px;
        }

        .team-boxed .social {
            font-size: 18px;
            color: #a2a8ae;
        }

        .team-boxed .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-boxed .social a:hover {
            opacity: 1;
        }

.container {
    width: 900px
}

.card {
    background-color: #fff;
    border: none;
    border-radius: 10px;
    width: 190px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.image-container {
    position: relative
}

.thumbnail-image {
    border-radius: 10px !important
}

.discount {
    background-color: red;
    padding-top: 1px;
    padding-bottom: 1px;
    padding-left: 4px;
    padding-right: 4px;
    font-size: 10px;
    border-radius: 6px;
    color: #fff
}

.wishlist {
    height: 25px;
    width: 25px;
    background-color: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.first {
    position: absolute;
    width: 100%;
    padding: 9px
}

.dress-name {
    font-size: 13px;
    font-weight: bold;
    width: 75%
}

.new-price {
    font-size: 13px;
    font-weight: bold;
    color: red
}

.old-price {
    font-size: 8px;
    font-weight: bold;
    color: grey
}

.btn {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    padding: 3px
}

.creme {
    background-color: #fff;
    border: 2px solid grey
}

.creme:hover {
    border: 3px solid grey
}

.creme:focus {
    background-color: grey
}

.red {
    background-color: #fff;
    border: 2px solid red
}

.red:hover {
    border: 3px solid red
}

.red:focus {
    background-color: red
}

.blue {
    background-color: #fff;
    border: 2px solid #40C4FF
}

.blue:hover {
    border: 3px solid #40C4FF
}

.blue:focus {
    background-color: #40C4FF
}

.darkblue {
    background-color: #fff;
    border: 2px solid #01579B
}

.darkblue:hover {
    border: 3px solid #01579B
}

.darkblue:focus {
    background-color: #01579B
}

.yellow {
    background-color: #fff;
    border: 2px solid #FFCA28
}

.yellow:hover {
    border-radius: 3px solid #FFCA28
}

.yellow:focus {
    background-color: #FFCA28
}

.item-size {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid grey;
    color: grey;
    font-size: 10px;
    text-align: center;
    align-items: center;
    display: flex;
    justify-content: center
}

.rating-star {
    font-size: 10px !important
}

.rating-number {
    font-size: 10px;
    color: grey
}

.buy {
    font-size: 12px;
    color: purple;
    font-weight: 500
}

.voutchers {
    background-color: #fff;
    border: none;
    border-radius: 10px;
    width: 190px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    overflow: hidden
}

.voutcher-divider {
    display: flex
}

.voutcher-left {
    width: 60%
}

.voutcher-name {
    color: grey;
    font-size: 9px;
    font-weight: 500
}

.voutcher-code {
    color: red;
    font-size: 11px;
    font-weight: bold
}

.voutcher-right {
    width: 40%;
    background-color: purple;
    color: #fff
}

.discount-percent {
    font-size: 12px;
    font-weight: bold;
    position: relative;
    top: 5px
}

.off {
    font-size: 14px;
    position: relative;
    bottom: 5px
}

.row {
  margin-top: 50px;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-around;
}

.col-2 {
  flex-basis: 50%;
  min-width: 300px;
}
.col-2 img {
  max-width: 100%;
  padding: 50px 0;
  /* top and bottom 50 left and right 0 */
}
.col-2 h1 {
  font-size: 50px;
  line-height: 60px;
  margin: 25px 0;
}


.categories {
  margin: 70px 0;
}

.col-3 {
  flex-basis: 30%;
  min-width: 250px;
  margin-bottom: 30px;
}

.col-3 img {
  width: 100%;
}

.col-4 {
  flex-basis: 25%;
  padding: 10px;
  min-width: 200px;
  margin-bottom: 50px;
  transition: transform 0.5s;
}

.col-4 img {
  width: 100%;
}

.title {
  text-align: center;
  margin: 0 auto 80px;
  position: relative;
  line-height: 60px;
  color: #555;
}

.title::after {
  content: "";
  background: #ff523b;
  width: 80px;
  height: 5px;
  border-radius: 5px;
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
}

.small-container {
  max-width: 1080px;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
}


/* -----Testimonial----- */

.testimonial {
  padding-top: 100px;
}
.testimonial .col-3 {
  text-align: center;
  padding: 40px 20px;
  box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: transform 0.5s;
}
.testimonial .col-3 img {
  width: 150px;
  margin-top: 20px;
  border-radius: 50%;
}

.testimonial .col-3:hover {
  transform: translateY(-10px);
}

.fa.fa-quote-left {
  font-size: 34px;
  color: #ff523b;
}

.col-3 p {
  font-size: 12px;
  margin: 12px 0;
  color: #777;
}

.testimonial .col-3 h3 {
  font-weight: 600;
  color: #555;
  font-size: 16px;
}

/* brands */

.brands {
  margin: 100px auto;
}
.col-5 {
  width: 160px;
}
.col-5 img {
  width: 100%;
  cursor: pointer;
  filter: grayscale(100%);
}

.col-5 img:hover {
  filter: grayscale(0);
}
/* btn */
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
    </style>

		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

<body  style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 5%, rgba(2,162,222,1) 34%, rgba(192,2,220,1) 61%, rgba(0,212,255,1) 92%);">


    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #370665;">
        <div class="container-fluid">
            <a style="color: white;" class="navbar-brand" href="#">AIM Higher's Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="color: white;  font-size: 20px;" class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;  font-size: 20px;" class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;  font-size: 20px;" class="nav-link" href="register.php">Register</a>
                    </li>


                    <li class="nav-item">
                      <a style="color: white;  font-size: 20px;" class="nav-link" href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                      <a style="color: white;  font-size: 20px;" class="nav-link" href="logout.php">Logout</a>
                    </li>

            </div>
        </div>
    </nav>

<div class="row">
          <div class="col-2">
            <h1 style="margin-left: 200px; color:white;">
              AIM Higher's Shop<br />
            </h1>
            <h2 style="margin-left: 200px;">Our website assures latest products and great quality.</h2>

            <!-- <a href="" class="btn">Explore Now &#8594;</a> -->
          </div>
          <div class="col-2">
            <img src="images/a.png" alt="" width="600" height="600" />
          </div>
        </div>




<section>
	<br />
	<div class="container">
        <h2 class="title" style="color:Black;">Featured Products</h2>
			<br />
			<!-- <br />
			<br /> -->
			<br /><br />
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#020024; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
            <h4 style="color: white;">Add To Cart</h4>

						<input type="submit" name="add_to_cart" style="margin-top:1px;" class="btn" value="" />
                        

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />

		</div>
	</div>
    </section>
    <section>
	<br />
	<div class="container">
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">

					<div style="border:1px solid #333; background-color:#020024; border-radius:5px; padding:16px;" align="center">
					<a href="user_details.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">	

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />

		</div>
	</div>
    </section>




    <section>
	<br />
	<div class="container">
        <h2 class="title" style="color:Black;">Latest Products</h2>
			<br />
			<!-- <br />
			<br /> -->
			<br /><br />
			<?php
				$query = "SELECT * FROM tbl_product2 ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#020024; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
            <h4 style="color: white;">Add To Cart</h4>

						<input type="submit" name="add_to_cart" style="margin-top:1px;" class="btn" value="" />
                        

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />

		</div>
	</div>
    </section>
<section>
	<br />
	<div class="container">
			<?php
				$query = "SELECT * FROM tbl_product2 ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">

					<div style="border:1px solid #333; background-color:#020024; border-radius:5px; padding:16px;" align="center">
					<a href="user_details.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">	

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />

		</div>
	</div>
</section>
   <!-------- Offer --------->
   <div align="center" class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img src="images/a.png" class="offer-img" alt="" />
          </div>
          <div align="center" class="col-2">
            <p>Exclusively available on OurStore</p>
            <h1>Gaming PC</h1>
            <small
              >For exclusive Gagets Visit Our Store!
            </small>

          </div>
        </div>
      </div>
    </div>

    <section>
    <div style="color:white;" class="small-container">
      <h2 style="color:white;" class="title">Gaming PC</h2>
      <div class="row">
        <div class="col-4">
    
            <img src="images/pc2.jpeg" alt=""
          /></a>
          <h4>HP Gaming Desktop Tower Computer Bundle with 24" Monitor, Intel Core i5,</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$720.00</p>
        </div>

        <div class="col-4">
          <img src="images/pc1.jpeg" alt="" />
          <h4>HP EliteDesk 800G3 Mini PC, Small Form Computer Desktop</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$590.00</p>
        </div>

        <div class="col-4">
          <img src="images/pc3.jpeg" alt="" />
          <h4>Diesel Men's Griffed Chronograph Green Canvas Watch, DZ4563</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          <p>$130.00</p>
        </div>
 </section>

<!-------- Offer --------->
<div align="center" class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img src="images/exclusive.png" class="offer-img" alt="" />
          </div>
          <div align="center" class="col-2">
            <p>Exclusively available on OurStore</p>
            <h1>Mi Band 6</h1>
            <small
              >For exclusive Gagets Visit Our Store!
            </small>

          </div>
        </div>
      </div>
    </div>

    
<section>
    <div style="color:white;" class="small-container">
      <h2 style="color:white;" class="title">Watch</h2>
      <div class="row">
        <div class="col-4">
    
            <img src="images/w.jpeg" alt=""
          /></a>
          <h4>T6 Smart Watch Bluetooth Wrist Watch</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$15.00</p>
        </div>

        <div class="col-4">
          <img src="images/ww.jpeg" alt="" />
          <h4>TSV Smart Watch, Fitness Tracker with Heart Rate Blood Pressure Monitor</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$40.00</p>
        </div>

        <div class="col-4">
          <img src="images/www.jpeg" alt="" />
          <h4>Diesel Men's Griffed Chronograph Green Canvas Watch, DZ4563</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          <p>$130.00</p>
        </div>
 </section>



 <section>
    <div style="color:white;" class="small-container">
      <h2 style="color:white;" class="title">HeadPhone</h2>
      <div class="row">
        <div class="col-4">
    
            <img src="images/h.jpeg" alt=""
          /></a>
          <h4>onn. Bluetooth On-Ear Headphones, Blue</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$15.00</p>
        </div>

        <div class="col-4">
          <img src="images/h2.jpeg" alt="" />
          <h4>Ear Headphones with Mic, Jelly Comb Foldable Corded</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$10.00</p>
        </div>

        <div class="col-4">
          <img src="images/h3.jpeg" alt="" />
          <h4>JLab Audio JBuddies Studio Volume Safe, Folding</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
          </div>
          <p>$16.00</p>
        </div>
 </section>
 <section style="color: white;">
    <!------ Testimonial  ------>
    <div  class="testimonial">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p style="color: white;"> <h4>Abu Shahed Shah Md. Nazmul Arefin</h4>
             
             
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/shahed.png" alt="" />
            <h3 style="color: white;">183-15-12000</h3>
          </div>

          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p style="color: white;"><h4>
              S.M. Ishtiaque Ahammed Khan</h4>
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/ish.png" alt="" />
            <h3 style="color: white;">183-15-11988</h3>
          </div>


          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p style="color: white;">
            <h4>Abul Khair</h4>
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/khair.jpg" alt="" />
            <h3 style="color: white;">183-15-12002</h3>
          </div>

         
        </div>
      </div>
    </div>
    </section>
    <section>
    <div  class="testimonial">
      <div class="small-container">
        <div class="row">
     
          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p style="color: white;">
            <h4 style="color: white;">Mst. Marium Akter</h4>
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/munni.jpg" alt="" />
            <h3 style="color: white;">183-15-12019</h3>
          </div>

         
        </div>
      </div>
    </div>
    </section>


    <footer class="text-center text-white" style="background-color: #45637d;">

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright By:
    <a class="text-white" href=""> <span> AIM Higher</span></a>
</div>
<!-- Copyright -->
</footer>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>
