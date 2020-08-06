<?php
//require "config/constants.php";

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Vegatable</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Vegatable</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order details</h1>
						<hr/>
						<div class="card">
            <div class="card-body">

            <?php
				include_once("db.php");
				if(isset($_POST["product_title"]))
				{
							$product_title = $_POST["product_title"];	
							$total_price = $_POST["product_price"];				
							$qty = $_POST["qty"];
							$user_id = $_SESSION["uid"];
											}
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                      
						<tr>
							  
							  <th>Order#</th>
							  <th>User ID</th>
							  <th>Product Name</th>
							  <th>KiloGram</th>
							  <th>Total Price</th>
						</tr>
                            

                    </thead>
            <?php
			$orders_list = "SELECT  user_id, order_id, product_name, kilo_gram, total_price FROM orders  WHERE user_id='".$_SESSION["uid"]."'";
			$query = mysqli_query($con, $orders_list);
			
			
                if($query)
                {
					while ($row=mysqli_fetch_array($query)) {
					
					$product_id = $row["order_id"];
					$product_title = $row["product_name"];
					$product_price = $row["total_price"];
					
					//$cart_item_id = 2;
					$qty = $row["kilo_gram"];

                   
          echo '
                    <tbody>
                        <tr>
						 
			
						<div class="row">
								
								<input type="hidden" id="product_id" name="product_id" value="'.$product_id.'"/>
						
								<td><input type ="hidden" ></div></td>
								<td><input type="text" class="form-control qty" value="'.$_SESSION["uid"].'"></div></td>
								<td><input type="text" class="form-control qty" id="product_title" name="product_title" value="'.$product_title.'" ></div></td>
								<td><input type="text" class="form-control qty" id="qty" name="qty" value="'.$qty.'" ></div></td>
								<td><input type="text" class="form-control"  value="'.$product_price.'"></div></td>
							</div>
                           
                        </tr>
                    </tbody>';
					}   
                    
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                </table>
            </div>
        </div>
		  
		  
		  
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
		<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>
		  
            
          </thead>
          <tbody id="customer_order_list">
           
          </tbody>
        </table>
      </div>
  </div>
</div>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>