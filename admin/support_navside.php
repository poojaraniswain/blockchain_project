 

<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li>
                        <a href="#"><i class="fa fa-dashboard"></i> user</a>
                    </li>
                <?php include ('connect.php'); 
                $query = mysqli_query($conn, "select * from tb_member") or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['memberID'];
                    $name=$row['Firstname']." ".$row['Lastname'];
                    $firstname=$row['Firstname'];?>

					<li>
                        <a href="support.php<?php echo'?name='.$firstname;?>"><i class="fa fa-user"></i> <?php echo $name; ?> </a>
                    </li>
                    <?php }?>
					   <li>
                        <a href="logout.php"><i class="fa fa-user"></i> Log out </a>
                    </li>


               
                 
                </ul>

            </div>

        </nav>
      