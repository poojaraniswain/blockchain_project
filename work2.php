<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/connect.php'); ?>

<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <?php
        include ('navbarfixed.php');
        ?>

        <div id="page">
           <?php include ('nav_sidebar2.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                    
                    </div>
                    <div id="body">



                        <h3>Work Done</h3>
                        <p>
                        
						<?php include ('navbar_menu.php');?>
						

                        </p>
                        <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($conn, "select * from tb_products WHERE category = 'work2' and user='$ses_name'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['productID'];

								
									$query1 = mysqli_query($conn, "SELECT * FROM order_details WHERE productID = '$id' ");	
                                    $row1 = mysqli_fetch_array($query1);
                                    $status=$row1['status'];
                                    							
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-success"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>


                                        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <a> Price: <?php echo $row['price']; ?></a>
                                        </p>
                                     										<?php if(mysqli_num_rows($query1)==0){ ?>
                                        <a href="#add<?php echo $id; ?>"   data-toggle="modal" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i>&nbsp;Proceed</a><br><br>
                                        <div class="col-md-12 text-center" >
                        <a href="user_contact.php"><button   class="btn btn-primary"><i class="icon-envelope icon-large"></i>&nbsp;dismiss and complain</button></a><br><br>
						</div>
										<?php }elseif($status=='Delivered'){ ?>
										<span class="label label-important">Payment Done</span>
										<?php }else {?>
                                        <span class="label label-important">Payment pending</span>
                                        <?php }?>
                                        <?php include('order_modal.php'); ?>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        mysqli_query($conn, "insert into order_details (memberID,productID,price,status) values('$member_id','$product_id','$price','Pending')") or die(mysqli_query);
                                     /*    header('location:user_wines.php'); */
										?>
												<script>
																window.location = 'work1.php';				
																</script>
										<?php
                                    }
                                    ?>
                        </ul>

                    </div>
                    <div id="footer">
                        <?php include('footer_user.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php include('footer_bottom.php'); ?>
</body>



</html>