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
        <h2>Adding a Property</h2><hr/>
        <form action="../models/addProperty.php" method="post">
                  <div class="form-group">
                    <label for="town">Town:</label>
                    <input type="text" class="form-control" id="town" name="Town">
                  </div>
                  <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="Type">
                  </div>
                  <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" id="price" name="Price">
                  </div>
                  <input type="submit" name="submit_btn"/>
                </form>
    </body>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; Max Schroeder 4.2D 2017</p>
        </div>
    </footer>
</html>