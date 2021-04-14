<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mj";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {

	echo "connection failed". $conn ->connect_error;
}
else{
	// echo"connection successfull"; 
}

//variables to store product upload
$product_name = $price = '';
$product_images = '';

if (isset($_POST['save'])) {
	$target= "productimages/" .basename($_FILES['product_image']['name']);
	$product_name = $_POST['product_name'];
	$price = $_POST['price'];
	$product_images = $_FILES['product_image']['name'];
	
    echo  $product_images . $product_name . $price;

$stmt = $conn->prepare("INSERT INTO products(product_name,price,productimage) VALUES (?,?,?)");
	$stmt->bind_param("sss",$product_name,$price,$product_images);

	 if ($stmt->execute() === TRUE) {
        header('location: index.php');
       //here moving uploaded file to the folder
    move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
    echo "record created <br>  " ;
    echo "<script>
         alert('image moved');
                 
        
    </script>";
     } else {
            echo "record not created <br>" . $conn->error;
        } 
        

}



?>