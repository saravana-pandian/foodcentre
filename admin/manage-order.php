<?php include('partial/menu.php') ?>
	<!-----------menu section ends-------->

	<!-----------main section-------->
	<div class="main-content">
		<div class="wrapper">
			<br>
<h1>Manage Orders</h1>
<br>
<br>
 <?php

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['update-fail'])) {
                echo $_SESSION['update-fail'];
                unset($_SESSION['update-fail']);
            }

            ?>
			<table class="tbl-full">
				<tr>
					<th>S.n.</th>
					<th>Food</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Date</th>
					<th>Status</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
					<th>Actions</th>
				</tr>
				<?php 
				//get data
				$sql="SELECT * FROM tbl_order ORDER BY id DESC";
				//execute query
				$res=mysqli_query($conn, $sql);
				//count rows
				$count=mysqli_num_rows($res);
				//create serrial numbr and assign value
				$sn=1;
				//check wthr we have data in data base
				if ($count>0) {
					//we have data in sql
					//get data and display
					while ($row=mysqli_fetch_assoc($res)) {
						$id=$row['id'];
						$food=$row['food'];
						$price=$row['price'];
						$qty=$row['qty'];
						$total=$row['total'];
						$order_date=$row['order_date'];
						$status=$row['status'];
						$customer_name=$row['customer_name'];
						$customer_contact=$row['customer_contact'];
						$customer_email=$row['customer_email'];
						$customer_address=$row['customer_address'];
						?>
				<tr>
					<td><?php echo $sn++; ?></td>
					<td><?php echo $food; ?></td>
					<td><?php echo $price; ?></td>
					<td><?php echo $qty; ?></td>
					<td><?php echo $total; ?></td>
					<td><?php echo $order_date; ?></td>
					<td>

					<?php 

					if ($status=="Ordered") {
						echo "<label>$status</label>";
					}
					elseif ($status=="On Delivery") {
						echo "<label style='color: orange'>$status</label>";
					}
					elseif ($status=="Delivered") {
						echo "<label style='color: green'>$status</label>";
					}
					elseif ($status=="Canceled") {
						echo "<label style='color: red'>$status</label>";
					}

					?>
						
					</td>
					<td><div><?php echo $customer_name; ?></div></td>
					<td><div><?php echo $customer_contact; ?></div></td>
					<td><div><?php echo $customer_email; ?></div></td>
					<td><div><?php echo $customer_address; ?></div></td>
					<td>
						<a href="<?php echo SETURL; ?>admin/update-order.php?id=<?php echo $id; ?>"" class="btn-secondary">Update</a>
						<a href="#" class="btn-danger">Delete</a>
					</td>
				</tr>
					<?php
						}
					}
					else{
					//we dont have data
					//display msg insert table
					?>
					
					<tr>
						<td colspan="12"><div class="text-centre">No Category Added</div></td>	
					</tr>

					<?php
				}

				 ?>

			</table>
		</div>
		
	</div>
	<!-----------main section ends-------->

	<!-----------foot section-------->
	<?php include('partial/footer.php')  ?>