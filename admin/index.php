<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mj HouseHold Traders</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body style="background-color: #232946">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">MJ HOUSEHOLD TRADERS</a>
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../signin.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../signup.php">SIGN UP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/index.php">ADMIN</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-dark py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">

          <h1 class="display-4 text-white mt-5 mb-2"><img src="../images/mj.jpg" width="200" alt="" class="d-inline-block align-middle mr-2">MJ HOUSEHOLD TRADERS</h1>
        </div>
      </div>
    </div>
  </header>

 	<div class="container"  >
 		<h3 style="color: #b8c1ec"> upload products</h3>
		<hr style=" margin-left: 28px; margin-right: 28px;">
 		<form action="connection.php" method="POST" enctype="multipart/form-data" >
 			<div class="form-group">
 				<input type="text" name="product_name" id="product_name" class="form-control" placeholder="what's the name">
 			</div>

 			<div class="form-group">
 				<input type="text" name="price" id="price" class="form-control" placeholder="what's the price">
 			</div>

 			<div class="form-group">
 				<input type="file" name="product_image" id="productimage" class="form-control">
 			</div>

 			<div class="form-group">
 				<input type="submit" name="save" id="save" class="btn btn-success btn-block" value="upload product">
 			</div>
 			<br>
 			<br>

<div class=" container">

	<?php
	$mysqli =new mysqli("localhost","root", "", "mj") or die($mysqli->error);
	$result = $mysqli->query("SELECT * FROM products") or die($mysqli->error);


	?>
	<caption style="color: #b8c1ec">UPLOADED PRODUCTS</caption>
	<table class="table table-dark">
		
		<tr>
			<th>ID</th>
			<th>PRODUCT NAME</th>
			<th>PRICE</th>
			<th>PRODUCT IMAGE</th>
			<th colspan="2">ACTION </th>
		</tr>
		<?php
		while ($row = $result->fetch_assoc()) :


		?>
		<tr>
			<td><?php echo $row ['id']; ?></td>
			<td><?php echo $row ['product_name']; ?></td>
			<td><?php echo $row ['price']; ?></td>
			<td> <?php
				echo "<img src='productimages/" . $row['productimage'] . "' style='width:120px; height=120px;'>"
				?>
			</td>
			<td>
				<a href="index.php?EDIT=<?php echo $row['id']?>" class="btn btn-success">EDIT</a>
				<a href="index.php?DELETE=<?php echo $row['id']?>" class="btn btn-danger">DELETE</a>

			</td>
		</tr>	
			<?php
		    endwhile;
			?>
	</table>
	



</div>





 		</form>

 	</div>
</html>