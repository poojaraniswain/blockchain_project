<?php include('header.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
             <?php include ('nav_sidebar.php');?>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                     

                    </div>
                    <div id="body">
                        <h3>Contact Us</h3>
						
                        <hr>
					<div class = "panel panel-well span6 alert alert-success">	
                        <form method = "POST" >
                            <label for="name"><span>name</span>
                                <input type="text" name="name" id="name">
                            </label>
                            <label for="email2"><span>email</span>
                                <input type="text" name="Email" id="email2">
                            </label>
                            <label for="message"><span>message</span>
                                <textarea id="message" style = "resize:none;" name = "message" cols="30" rows="10"></textarea>
                            </label>
                            <div class="col-md-12 text-center" style="padding-left:100px;">
                            <button   class="btn btn-success " name = "submit" ><i class="icon-envelope icon-large"></i>&nbsp;Submit</button><br><br>
                            </div>
                            						
                        </form>
                        <div class="col-md-12 text-center" style="padding-left:150px;">
                        <a href="contact_login.php"><button   class="btn btn-primary"><i class="icon-envelope icon-large"></i>&nbsp;login to chat</button></a>
						</div>
                        </div>
						<?php include ('admin/connect.php');
						
						if (isset ($_POST ['submit']))
						
						{
							$name = $_POST['name'];	
							$Email = $_POST['Email'];
							$message = $_POST['message'];
						
						
										mysqli_query($conn, "insert into messages(name,Email,message) VALUES('$name','$Email','$message')");
									
									echo "<script>
										alert('Your Messages Successfully Sent');
										header ('location :../index.php');
									</script>";
									 }


									 ?>		
						
						
                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer_bottom.php');
    ?>
</body>
</html>