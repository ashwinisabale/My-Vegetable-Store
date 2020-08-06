<?php



		session_start();
		if(!isset($_SESSION["uid"]))
		{
			header("location:index.php");
		}

		if(isset($_POST["product_title"]))
		{

			include_once("db.php");
			$product_id = $_POST["product_id"];
			$product_title = $_POST["product_title"];
				
			$total_price = $_POST["product_price"];
			//$product_image = $row["product_image"];
			//$cart_item_id = $_POST["id"];
			$qty = $_POST["qty"];
			include_once("db.php");
									
			$sql = "INSERT INTO orders(user_id, product_name, kilo_gram, total_price) VALUES ('".$_SESSION["uid"]."','".$product_title."','".$qty."','".$total_price."')";
			$query_run = mysqli_query($con,$sql);
							
			if($query_run)
			{
				echo '<script> alert("Data Inserted"); </script>';      
				header("location:index.php");
			}
			else
			{
				echo '<script> alert("Data Not Inserted"); </script>';
			}
															
			//header("location:index.php");
		}
?>