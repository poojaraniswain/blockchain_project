<?php
include('header.php');
?>
<body>
    <?php
    include('navtop.php');
    ?>

    <div id="background">

        <div id="page">

            <?php include ('nav_sidebar.php');?>

            <div id="content">
                <div class="hero-unit-table">                        <!-- image slider -->
                    <div class="slider-wrapper theme-default">

                        <div id="slider" class="nivoSlider">
                            <img src="admin/images/market1.jpg" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/market2.jpg" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/market3.jpg" data-thumb="images/wineries.jpg" alt="" />
                            <img src="admin/images/market4.jpg"  alt="" data-transition="slideInLeft" />
                            <img src="admin/images/market5.jpg" data-thumb="images/nemo.jpg" alt=""  />
                        </div>

                     
                    </div>
                    <!-- end slider -->
			<hr/>
		<!--	<center><h3 class = "center alert alert-success" style = "width:500px; font-weight:Bolder;">Latest Item</h3></center>-->
                    <div id="body">

                        <div class="body">
                            <ul>
                               <!-- <li>
								
                                    <a class="figure" href="#pic1" data-toggle = "modal"><img class = "image-rounded"src="images/g1.png" alt=""></a>
                                </li>
                                <li>
                                    <a class="figure" href="#pic2" data-toggle = "modal" ><img class = "image-rounded"src="images/drumset.png" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure" href="#pic3" data-toggle = "modal" ><img class = "image-rounded" src="images/piano.png" alt=""></a>

                                </li>
                                <li>
                                    <a class="figure"  href="#pic4" data-toggle = "modal" ><img class="img-rounded" src="images/violin.png" alt=""></a>         
                                </li>
-->
                            </ul>

                          <?php include ('modal_latest.php');?>
                        </div>

                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer_bottom.php') ?>
</body>
</html>