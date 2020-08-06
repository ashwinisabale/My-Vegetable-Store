<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>
<!DOCTYPE html>
<html>
	<head>
	<div class="container-fluid">
	<div class="row">
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
							$user_id = $_POST["uid"];
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
                            
                    <tbody>
                        <tr>
						 

						<div class="row">
								
						</div>
						
						<?php
			$orders_list = "SELECT  * FROM orders ";
			$query = mysqli_query($con, $orders_list);
			
			
                if($query)
                {
					while ($row=mysqli_fetch_array($query)) {
					
					$product_id = $row["order_id"];
					$user_id = $row["user_id"];
					$product_title = $row["product_name"];
					$product_price = $row["total_price"];
					

					$qty = $row["kilo_gram"];
                
          echo '
                    <tbody>
                        <tr>
						 
			
						<div class="row">
								
								<input type="hidden" id="product_id" name="product_id" value="'.$product_id.'"/>			
								<td><input type ="hidden" ></div></td>
								<td><input type="text" class="form-control qty" value="'.$user_id.'"></div></td>
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
                           
                        </tr>
                    </tbody>
            
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