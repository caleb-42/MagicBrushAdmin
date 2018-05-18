<!doctype html>
<html>
    <?php  include("scripts/php/login.php");?>
<head>
	<meta charset="UTF-8">
	<title>MagicBrush Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="css/_css/signIn.css" rel="stylesheet">

    <!-- jQuery core for this template -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

</head>

    <body>
        <div class="container">

            <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <br>
                <div id = "mgTitle" class = "pb-5">
                    <img  class = "pb-3" width = 65% height = 65% src = "assets/mglogo.png"/>
                    <h5 class="form-signin-heading">ADMIN PANEL</h5>
                </div><!-- /mgTitle -->
                <br>
                <label for="userName" class="sr-only">Username</label>
                <input type="text" id="userName" class="form-control mb-3" placeholder="Admin Username" required autofocus name="username">
                <label for="pass" class="sr-only">Password</label>
                <input type="password" id="pass" class="form-control" placeholder="Password" required name="password">

                <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="login();">Sign in</button>
            </form>

            <div class="row mt-5 pt-3 justify-content-center">
                <img id="sendGif" class="dropOpacity align-self-start" src="assets/sending2.gif" width="100px" height="100px" style="position: absolute;"/>
                <p id="wang" class=" align-self-end" style="opacity:0; font-size:17px; margin-left:10px; margin-top:20px; font-weight: 500;" ><?php echo "<script type = 'text/javascript'>
            jQuery(function(){
            jQuery('#sendGif').css('visibility', 'hidden');
            if('$error' != ''){
            if ('$error' != 'Authorization Granted') {
                jQuery('#wang').css('color', '#DD2A2A');
            } else {
                jQuery('#wang').css('color', '#2FC143');
            }
            jQuery('#wang').text('$error').fadeTo('slow', 1).delay(2000)
            .fadeTo('slow', 0);
            jQuery('.btn').prop('disabled', false);}
            });</script>"?></p>
            </div>

        </div> <!-- /container -->
</body>
    <script>
        function login(){
            /*$(".btn").prop('disabled', true);*/
            if($("#userName").val() != ""){
                $("#sendGif").css("visibility", "visible");
            }
        }

    </script>
</html>
