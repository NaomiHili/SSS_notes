<?php
	session_start();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Properties</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="list.php">Property list</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </nav>
        <main>
            <h2>Login</h2>
		
            <?php
                if (isset($_SESSION['user'])) {
                    die("You are already logged in!");
                }
            ?>
            <form action="../models/process_login.php" method="post">
              <div class="form-group">
                <label for="username">Username:</label>
                <input name="user" placeholder="Username" id="username"/>
              </div>
              <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" name="password" placeholder="Password" id="pass"/>
              </div>
              <input type="submit" name="submit_button" value="Login!" />
            </form>
            <?php
                if(isset($_GET['errors'])){
                    $errors = $_GET['errors'];
                    echo $errors;
                }
            ?>
        </main>
        
    </body>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; Max Schroeder 4.2D 2017</p>
        </div>
    </footer>
</html>