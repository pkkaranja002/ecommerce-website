<?php
session_start();
require '../admin/connection.php';
if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'      =>     $_GET["id"],  
                     'item_name'    =>     $_POST["hidden_name"],  
                     'item_price'   =>     $_POST["hidden_price"],  
                     'item_quantity'=>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
        
      {  
           $item_array = array(  
                'item_id'       =>     $_GET["id"],  
                'item_name'     =>     $_POST["hidden_name"],  
                'item_price'    =>     $_POST["hidden_price"],  
                'item_quantity' =>     $_POST["quantity"]  
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
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MJ HOUSEHOLDTRADERS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body style="background-color: #2b2c34";>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

      <a class="navbar-brand"  style="color: #6246ea" href="#">MJ HOUSEHOLD TRADERS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../landingpage/index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link" href="../aboutpage/about.html">About us</a>
          </li> -->
         <!--  <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4" style="color: #6246ea">MJ HOUSEHOLD TRADERS</h1>
        <!-- <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div> -->

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="../images/mj21.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../images/mj22.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../images/mj23.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php
            require '../admin/connection.php';
            $query = "SELECT * FROM  products";
            $query_run = mysqli_query($conn,$query);
            $check_products = mysqli_num_rows( $query_run)>0;
            if ($check_products) 
            {
              while ($row = mysqli_fetch_array($query_run))
              {
                 ?>

                 <div class="col-lg-4 col-md-6 mb-4">
            <form method="post" action="index.php">
               <img src="../admin/productimages/<?php echo $row['productimage']; ?>" class="card-img-top" alt="product image">
              <div style="border:1px solid#333; background-color: #f1f1f1;border-radius: 5px;padding: 16px; ">
                <h4 class="card-title"> <?php echo $row['product_name'];?></h4>
                <h5><?php echo $row['price'];?></h5>
                <input type="text" name="quantity" class="form-control" value="" placeholder="enter quantity">
                <input type="hidden" name="hidden_name" value="<?php echo $row['product_name'];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
               <!-- <input type="submit" ></a> name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  -->
               <a href="index.php?action=add&id =<?php echo $row['id'];?>" name="add_to_cart" class="btn btn-success">Add to cart</a> 
              </div>
              
            </form>
             
            
          </div>

                 <?php
                
              }
              
            }
            else{
              echo "No products found";
            }
          ?>

          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>

    <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Item Name</th>  
                               <th >Quantity</th>  
                               <th >Price</th>  
                               <th>Total</th>  
                               <th >Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 
  <!-- /.container -->


  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; mjhouseholdtraders.com 2021</p>
        <h2 style="color: #e53170">Contact Us</h2>
        <hr>
        <address style="color: #e53170">
          <strong style="color: #e53170"> MJ HOUSEHOLD TRADERS</strong>
          <br style="color: #e53170">Kamkunji Market(Chui Arcade Building)
          <br style="color: #e53170">Jogoo road opposite KCB Bank
          <br>
        </address>
        <address style="color: #e53170">
          <abbr style="color: #e53170"title="Phone">P:</abbr>
          0718818200
          <br>
          <abbr style="color: #e53170" title="Email">E:</abbr>
          <a style="color: #e53170"href="mailto:#">jeremihmuriu23@gmail.com</a>
        </address>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
