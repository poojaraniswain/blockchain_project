<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/connect.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <?php
        include ('navbarfixed.php');
        ?>

    
           <?php include ('nav_sidebar2.php');?>
            

<!DOCTYPE html>
<html>
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
            left:50%;
            transform: translate(-50%,-50%);

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
            height:60px;
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
            height:42px;
            width:380px;
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
            margin:5px;
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
            padding: 10px;
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
<div class="con">
    <div id="head">
        <img src="images/chat_icon.png"><h1>Support system</h1>
    </div>
    <div class="body">
        <div class="anyclass">

        </div>
        </div>
        
    
    <div id="btm">
    <input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="message here" >
    <button class="btn btn-success" name="submitmsg" id="submitmsg">send</button>
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
  $.post("htcont.php",{user_from: '<?php echo $ses_name  ?>' },
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
  $.post("postmsg.php", {text: clientmsg, user_from: '<?php echo $ses_name ?>' ,user_to: 'admin'
  },
  function(data,status){
    document.getElementsByClassName('anyclass')[0].innerHTML=data; });

  $("#usermsg").val("");
  return false;
});
</script>

</body>
</html>



                    
	
	
	