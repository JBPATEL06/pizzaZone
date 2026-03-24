<!DOCTYPE html>
<html lang="en">
<?php
include("./pages/connection.php");	
include("./pages/header.php");
session_start();

if(!isset($_SESSION['userData'])){
   header('location:pages/login.php');
   exit();
}
?>

<?php
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My Orders</title>
	<link rel="stylesheet" href="fontawsome/all.min.css">
	<style type="text/css" rel="stylesheet">
		

.btn1 {
   display: inline-block;
   border-radius: .5rem;
   padding: 1rem 1.5rem;
   background-color: #ff4d4d;
   color: var(--white) !important;
   cursor: pointer;
   text-align: center;
   transition: all 0.3s ease;
}

.btn1 i {
   color: var(--white) !important;
}

.btn1:hover {
   background-color: var(--black);
   transform: translateY(-2px);
}
.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}

table { 
	width: 130rem; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
 tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 15px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 14px;
	
	} 

</style>

	</head>


        <div class="page-wrapper">
       
               
            <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
                <div class="container"> </div>
        
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
    
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                          </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">
								
							<table class="table table-bordered table-hover responsive-table">
						 	 <thead style = "background: #404040; color:white;">
							<tr>
							
							  <th>Item</th>
							  <th>Payment Method</th>
							  <th>Price</th>
							   <th>Status</th>
								   <th>Action</th>
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							<?php 
						 $userId = $_SESSION['userId'];
						$query_res= mysqli_query($conn,"select * from orders WHERE userId='$userId'") or die('query failed');
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have no floral orders yet.</center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
						
							?>
												<tr>	
														 <td data-label="Item"> <?php echo $row['total_products']; ?></td>
														  <td data-label="Method"> <?php echo $row['method']; ?></td>
														  <td data-label="Price">₹<?php echo $row['total_price']; ?></td>
														   <td data-label="Status"> 
														   <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<button type="button" class="bt"><span class="fa fa-spa"  aria-hidden="true" ></span> Preparing</button>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																				<button type="button" class="bt"><span class="fa fa-truck-fast fa-beat"  aria-hidden="true" ></span> Delivering</button>
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			 <button type="button" class="bt" ><span  class="fa fa-circle-check" aria-hidden="true"></span> Arrived</button> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			 <button type="button" class="bt"> <i class="fa fa-circle-xmark"></i> Cancelled</button>
																			<?php 
																			} 
																			?>
																  </td>

																  <?php
           															 if($status=="closed")
												
																{
                												  ?>
																	<td data-label="Action"> Order Delivered <a><i class="fa fa-check-circle" style="font-size:16px"></i></a></td> 
            												      <?php
          														  } else {
             												     ?>
																	<td data-label="Action"> <a href="delete_orders.php?order_del=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn1"><i class="fas fa-trash" style="font-size:16px"></i></a></td> 

             									</tr>
																	
										<?php }} ?>					
								</tbody>
							</table>
						 </div>
                      </div>
                  </div>
            </div>
         </div>
     </div>
</section>

</body>
<?php } ?>
</html>