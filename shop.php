 
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>

 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Farm Vegetables</label>
      <ul>
		<li><a class="AdminHome.html" href="#">Home</a></li>
		<li><a href="#">UserProfile</a></li>
		<li><a href="#">New Order </a></li>
		<li><a href="AdminOrderHist.php">Order History</a></li>
		<li><a href="AdminProduct.php">Product Update</a></li>
		<li><a href="ALogOut.php">Logout</a></li>
	   </ul>
	</nav>

<body>  

<?php include('conn.php'); ?>

 <button type="button" class="btn btn-primary addbtn"> Add Product </button>
<?php
session_start();



if(isset($_POST['btn_save']))
{
	$product_name=$_POST['product_name'];
	$details=$_POST['details'];
	$price=$_POST['price'];
	$c_price=$_POST['c_price'];
	$product_type=$_POST['product_type'];


	//picture coding
	$picture_name=$_FILES['picture']['name'];
	$picture_type=$_FILES['picture']['type'];
	$picture_tmp_name=$_FILES['picture']['tmp_name'];
	$picture_size=$_FILES['picture']['size'];

	if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
	{
		if($picture_size<=50000000)
		
			$pic_name=time()."_".$picture_name;
			move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
			
			mysqli_query($conn,"insert into productinfo (product_title, product_price, product_desc, product_image) values ('$product_name','$price','$details','$pic_name')") or die ("query incorrect");

			header("location: sumit_form.php?success=1");
	}

			mysqli_close($con);
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="picture" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
					
					 <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
                      </div>
                    </div>
				
                  </div>

              </div>
              
            </div>
          </div>
			

        </div>
         </form>
          
        </div>
      </div>
    
<!-- Add Product Modal end -->



<!-- ####################################################################################################################### -->

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Pruduct Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="AdminProduct2.php" method="POST">

            <div class="modal-body">

                
				<div class="form-group">
					<label> Product Name  </label>
					<input type="text" name="txtCname" class="form-control " placeholder="Product name" required autofocus></div>
                <div class="form-group">
                    <label> Product Price </label>
                    <input type="text" name="txtEmail" class="form-control " placeholder="Product Price" required >
                </div>

                <div class="col-12">
        			<div class="form-group">
		        		<label>Product Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>       
            </div>
			<div>
			<input type="hidden" name="updatedata" value="1">
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-primary updatedata">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->



<!-- ####################################################################################################################### -->

<!-- DELETE POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Product Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="AdminDeleteProduct.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">


<?php include('conn.php'); ?>
<section>
<div class="card">
            <div class="card-body">

            <?php
                
               

                $query = "SELECT * FROM productinfo";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price </th>
							 <th scope="col">Product Description </th>
                            <th scope="col"> product Image </th>                       
                            <th scope="col"> EDIT </th>
                            <th scope="col"> DELETE </th>
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
							
                            <td> <?php echo $row['product_id']; ?> </td>                            
                            <td> <?php echo $row['product_title']; ?> </td>  
							<td> <?php echo $row['product_price']; ?> </td>
							<td> <?php echo $row['product_desc']; ?> </td>                            
                            <td> <?php echo $row['product_image']; ?> </td>  
                           
							<td>  
                                <img src="data:image/jpeg;base64,'.base64_encode($row['itemimage'] ).'" height="100" width="100" class="img-thumnail" />  
                            </td>  
                            <td> 
                                <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            </td> 
                            <td>
                                <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                            </td>
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
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
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

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
      
    });
});

</script>



<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');     
		   $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
    });
});

</script>
<script>

$(document).ready(function () {
    $('.addbtn').on('click', function() {
        
        $('#addmodal').modal('show');     
		 $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#add_id').val(data[0]);
    });
});

</script>

  </body>
</html>
<footer><p class=" footer mt-5 mb-3 text-muted">&copy;2020 - Fresh Pharma</p></footer>