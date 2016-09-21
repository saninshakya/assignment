<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Authentication</title>
    </head>

    <body>
    <h1>asfadsfaasfadsfds</h1>
        <div id="profile">
            <?php
            if (isset($_SESSION["username"])) {
                echo "Welcome " . $_SESSION['username'];
                ?>
                <a href='logout.php'>Logout</a>
            <?php } ?>
        </div>
        
        <?php if (!isset($_SESSION["username"])) { ?>
            <div class="container">
                <form method="post" id="login-form">
                    <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />
                    <div id="error"></div>
                    <div>
                        <input type="text" placeholder="Enter Username" required="" id="username"  name="username"/>
                    </div>
                    <br/>
                    <div>
                        <input type="password" placeholder="Enter Password" required="" id="password"  name="password"/>
                    </div>
                    <hr />
                    <div>
                        <button type="submit" name="btn-login" id="btn-login">Sign In</button> 
                    </div>  
                </form>
            </div>
            <?php } ?>

        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/validation.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>    
    </body>
</html>