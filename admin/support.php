	
<?php include ('header.php');?>	
<head>
    <title>Website</title>
    <style type="text/css">
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }body{
            font-family: calibri;
            background-color: skyblue;
        }
        .con{
            width:450px;
            height:550px;
            
            position:absolute;
            top:50%;
            left:30%;
            transform: translate(-10%,-10%);

        }#head{
            width:100%;
            height:50px;
            margin-top:20px;
            background-color: #0077fb
        }
        .body{
            width:100%;
            height:450px;
            overflow-y: auto;
            background-color: white;
    
        }
        #btm{
            width:100%;
            height:80px;
            background-color: #0077fb
        }
        img{
            width:40px;
            height:40px;
            border-radius:50px;
            margin-top: 5px;
            margin-left: 10px;
            background-color:black;
        }
        h1{
            margin-top: -45px;
            margin-left: 55px;
            color:white;
            font-size: 25px;
        }    h3{
            margin-top: -5px;
            margin-left: 55px;
            color:white;
            font-size: 15px;
        }
        #usermsg{
            font-size: 18pt;
            height:45px;
            width:430px;
            outline: none;
            border:none;
            padding: 10px;
            border-radius: 50px;
            margin-top:7px;
            margin-left: 10px;

        }
        .user1{
            padding: 10px;
            float:left;
            margin:2px;
            max-width:90%;
            display: table;
            clear:both;margin-left: 15px;
            background-color:#edefed;
            border-radius:10px;
        }
        .user1_time{
            padding-left: 10px;
            float:left;
            margin:0px;
            max-width:90%;
            display: table;
            clear:both;margin-left: 15px;
           
        }
        .user2{
            padding: 5px;
            padding-top:0px;
            float:right;
             max-width:70%;
            background-color: #0077fb;
            border-radius:10px;
            margin:5px;
            color:white;
            margin-right: 15px;
            display: table;
            clear:both;
        }
        .user2_time{
            padding-right: 10px;
            float:right;
             max-width:70%;
            margin:0px;
            margin-right: 15px;
            display: table;
            clear:both;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand" href="#	">Chat&nbsp;Support</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      						
					  Welcome : Support System
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('support_navside.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        
                                    <?php include ('connect.php');
                                    if($_SERVER['REQUEST_METHOD']=='GET'){
                                    $get_name=$_GET['name'];?>


<div class="con">
    <div id="head">
        <img src="images/chat_icon.png"><h1><?php echo $get_name;?></h1>
    </div>
    <div class="body">
        <div class="anyclass">

        </div>
        </div>
        
    
    <div id="btm">
    <input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="message here" ><br>
    <button class=" col-md-12 text-center btn btn-success " name="submitmsg" id="submitmsg">send</button>
    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
//check for new msgs every 1 sec
setInterval(runFunction,1000);
function runFunction() {
  $.post("htcont.php",{user_to: '<?php echo $get_name  ?>' },
    function (data,status) {

      document.getElementsByClassName('anyclass')[0].innerHTML=data
    }
    )
}

// Get the input field
var input = document.getElementById("usermsg");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});


  //if user submits the form
 
  $("#submitmsg").click(function(){
     var clientmsg= $("#usermsg").val();
  $.post("postmsg.php", {text: clientmsg, user_to: '<?php echo $get_name ?>' ,user_from: 'admin'
  },
  function(data,status){
    document.getElementsByClassName('anyclass')[0].innerHTML=data; });

  $("#usermsg").val("");
  return false;
});
</script>


                                    <?php }?>
                                        
                                
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
