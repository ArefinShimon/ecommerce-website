<?php 
    require ("controller/user.php");
    require ("controller/Search.php");

    $user = new User();
    $search = new Search();

    if(!$user->checkLogin()){
        header('Location: login.php');
    }

    if(isset($_REQUEST['id'])) {
        $id =  $_REQUEST['id'];
        $list_data = $search->getPtByID($id);
       
        $name = "";
        $img = "";
        $des = "";
      
        if(sizeof($list_data) > 0){
            
            $name = $list_data['name'];
            $img = $list_data['image'];
            $des = $list_data['des'];
           
        }
    }else{
        header('Location: home.php');
    }




?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome for font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Product Details </title>
    <link rel="stylesheet" href="public/styles/css/bootstrap.min.css">
    <script src="public/styles/js/bootstrap.min.js"></script>
    <script src="public/styles/js/bootstrap.min.js"></script>
    <style>
       .body {
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
  font-size: 15px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #fc3c7c;
  text-decoration: none;
}

.btn1 {
  background: #262b80;
  background-image: -webkit-linear-gradient(top, #262b80, #cf40ae);
  background-image: -moz-linear-gradient(top, #262b80, #cf40ae);
  background-image: -ms-linear-gradient(top, #262b80, #cf40ae);
  background-image: -o-linear-gradient(top, #262b80, #cf40ae);
  background-image: linear-gradient(to bottom, #262b80, #cf40ae);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn1:hover {
  background: #3c5cfa;
  text-decoration: none;
}
    </style>

</head>

<body  style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 5%, rgba(2,162,222,1) 34%, rgba(192,2,220,1) 61%, rgba(0,212,255,1) 92%);">



   <section>
        <div class="container ">
            <div class="row">
                <div class="col-md-7 offset-md-2 ">
                    <div class="card text-dark  mt-4 mb-4 p-5"
                    style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 5%, rgba(2,162,222,1) 34%, rgba(192,2,220,1) 61%, rgba(0,212,255,1) 92%);">




                        <section>
                            <div style="margin-bottom: 100px ; background-color: #02475E;" class="team-boxed">
                                <div class="container">
                                    <div class="intro">
                                        <h2 style="color: white; " class="col-md-6 col-lg-4 item">Products Details</h2>


                                    </div>

                                    <div style="background-color: #5F939A; border-radius: 30px;" class="row people">

                                        <div class="col-md-6 col-lg-4 item">

                                            <div style=" border-radius: 15%; background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(41,9,121,1) 5%, rgba(2,162,222,1) 34%, rgba(192,2,220,1) 61%, rgba(0,212,255,1) 92%);

" class="box">
                                                <form action="" method="post">
                                                    <div class="container text-center" >
                                                        <img class="rounded-circle"
                                                            src="images/<?php echo $img; ?>" alt="" />
                                                    </div>
                                                    <!-- <h3 style="color: white;" class="name">Abu Shahed</h3> -->

                                                    <h1 style="color: white;" class="text-center">
                                                        <?php echo $name; ?>
                                                    </h1>
                                                    <div style="color: Green;">
                                                        <h1>
                                                        
                                                        </h1>
                                                    </div>


                                                

                                                    <!--  Name -->
                                                    <div class="mb-3" style="color: white;">
                                                        <label for="lastName" class="form-label">Name</label></br>
                                                        <input name="name" type="text" class="form-control"
                                                            placeholder="Enter Here" id="lastName"
                                                            value="<?php echo $name; ?>" require>
                                                    </div>



                                                    <!--Price -->
                                                    <div class="mb-3" style="color: white;">
                                                        <label for="des" class="form-label">Description</label></br>
                                                        <textarea name="" id="" cols="30" rows="10"><?php echo $des; ?></textarea>
                                                            
                                                    </div>

                                                    <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                                                <input type="text" name="quantity" value="1" class="form-control" />
                                                    <h4 style="color: white;">Add To Cart</h4>

					                        	<input type="submit" name="add_to_cart" style="margin-top:1px;" class="btn" value="" />
                                                </form>
                                                <form action="home.php">
                                                <div class="container text-center mt-3">
                                                        <input type="submit" name="Back to Home" class="btn1 btn-primary"
                                                            value="Back to Home" />
                                                    </div>
                                                </form>
                                                
                                                    
                                                    </div>
                                                    

                                                </form>
                                                

                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                </div>
            </div>
    </section>



</body>

</html>