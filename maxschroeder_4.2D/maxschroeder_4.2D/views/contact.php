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
              <li class="active"><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </nav>
        <main>
            <div class="centre">
                <form action="../Controllers/writeToTextFile.php" method="post">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email1">
                  </div>
                  <div class="form-group">
                    <label for="number">contact number:</label>
                    <input type="text" pattern="[0-9]{8}" title="Please enter a validnumber" class="form-control" id="number" name="number1">
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="8" id="comment" name="comment1"></textarea>
                  </div>
                  <input type="submit" name="submit_btn"/>
                </form>
            </div>
        </main>
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    if ($id == 1){
                        echo "Please do not leave any fields empty";
                    }
                    else{
                        echo "Form Submitted.";
                    }
                }
            ?>
    
    </body>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; Max Schroeder 4.2D 2017</p>
        </div>
    </footer>
</html>