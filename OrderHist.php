<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Farm Vegetables</label>
      <ul>
		<li><a class="active" href="#">Home</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="order.html">New Order </a></li>
		<li><a href="history.php">Order History</a></li>
		<li><a href="#">Logout</a></li>
</ul>
</nav>





    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">


<?php include('conn.php'); ?>
<section>
<div class="card">
            <div class="card-body">

            <?php
                
               

                $query = "SELECT * FROM orderhistory";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Total Amount </th>
                            <th scope="col"> Order Stutus </th>
                            <th scope="col"> Viwe Info </th>
							
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
						 <form action="Details.php" method="POST">
							
                            <td> <?php echo $row['orderid']; ?> </td>                            
                            <td> <?php echo $row['orderdate']; ?> </td>  
							<td> <?php echo $row['totalamount']; ?> </td>							
                            <td> <?php echo $row['orderstatus']; ?> </td>                            
                           
			
                            <td> 
								
                                <button type="button" class="btn btn-success detailbtn"  > Details </button>
						
                            </td> 
                            </form>
                        </tr>
                    </tbody>
            <?php           
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
		
<!-- ####################################################################################################################### -->


				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"> All Record </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>

						<form action="OrderHist.php" method="POST">

							<div class="modal-body">

								<div class="card">
							<div class="card-body">

							<?php
								
							   

								$query = "SELECT * FROM userorderlist";
								$query_run = mysqli_query($conn, $query);
							?>
								<table id="datatableid" class="table table-bordered table-dark">
									<thead>
										<tr>
											<th scope="col"> Item Name</th>
											<th scope="col">Qty</th>
											<th scope="col">Rate </th>
											<th scope="col"> Total </th>
										   
											
										</tr>
									</thead>
							<?php
								if($query_run)
								{
									foreach($query_run as $row)
									{
							?>
									<tbody>
										<tr>
											
											<td> <?php echo $row['itemname']; ?> </td>                            
											<td> <?php echo $row['qty']; ?> </td>  
											<td> <?php echo $row['rate']; ?> </td>							
											<td> <?php echo $row['total']; ?> </td>                            
										   
							
										   
											
										</tr>
									</tbody>
							<?php           
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
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								
							</div>
						</form>

					</div>
				  </div>
				</div>

				<!-- #################################################################################################### -->

		
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

		<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
		<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>

<script>

$(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });

});

</script>
<script>

$(document).ready(function () {
    $('.detailbtn').on('click', function() {
        
        $('#editmodal').modal('show');     
    });
});

</script>










<script>
	Function myfucntion()
	{
		window.location= "Details.php";
	}
	
</script>
		
		
		
</section
<section>

</section>


      <footer><p class=" footer mt-5 mb-3 text-muted">&copy;2020 - Fresh Pharma</p></footer>
  </body>
</html>