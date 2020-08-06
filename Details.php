<?php include('conn.php');

		if(isset($_POST['button']))
		{
		
			$conn = mysqli_connect($servername, $username, $password, $databasename);

		?>
			
				<!-- ####################################################################################################################### -->

				<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

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

	<?php	}	?>
