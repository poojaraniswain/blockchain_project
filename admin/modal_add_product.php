<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Product </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Name:</label>
                                           <input type="text" name="name" class = "form-control" placeholder="Name">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Description:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="description"  placeholder="Description" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Category:</label>
                                    <div class="controls">
                                        <select type="text" name="category" class = "form-control" placeholder="Category" >

                                            <option></option>
                                            <option>work1</option>
                                            <option>work2</option>
                                            <option>work3</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">User:</label>
                                    <div class="controls">
                                        <input type="text" name="user" class = "form-control" placeholder="user">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Price:</label>
                                    <div class="controls">
                                        <input type="text" name="price"  class = "form-control" splaceholder="Price" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Percentage:</label>
                                    <div class="controls">
                                        <input type="text" name="percentage" placeholder="percentage"  class = "form-control" >
                                    </div>
                                </div>

                                <!--<div class="control-group">
                                    <label class="control-label" for="inputPassword">Quantity:</label>
                                    <div class="controls">
                                        <input type="text" name="quantity" placeholder="Quantity"  class = "form-control" >
                                    </div>
                                </div>-->

                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 	
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $category = $_POST['category'];
                                $user = $_POST['user'];
                                $price = $_POST['price'];
                                $percentage=$_POST['percentage'];

                                //image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];


                                mysqli_query($conn, "insert into tb_products (name,description,category,user,price,percentage,location)
                            	values ('$name','$description','$category','$user','$price','$percentage','$location')
                                ") or die(mysqli_error());

                                header('location:product.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>