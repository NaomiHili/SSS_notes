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
              <li class="active"><a href="list.php">Property list</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <?php
                if(isset($_SESSION['user'])){
                    echo "<li class=\"login\"><a href=\"../controllers/logout.php\">Log Out</a></li>";
                   
                }
                else{
                   echo "<li class=\"login\"><a href=\"login.php\">Log In</a></li>";
                }
              ?>
            </ul>
          </div>
        </nav>
            <form class="form-inline" action="../models/arrange.php" method="post">
              <div class="form-group">
                <label for="sel1">Select attribute:</label>
                  <select class="form-control" name="attribute">
                    <option value="Default">Default</option>
                    <option value="Town">Town</option>
                    <option value="Type">Type</option>
                    <option Value="Price">Price</option>
                  </select>
              </div>
              <div class="form-group">
                <label class="radio-inline"><input type="radio" name="index" checked="checked" value="Ascending">Ascending</label>
                <label class="radio-inline"><input type="radio" name="index" value="Descending">Descending</label>
              </div>
              <button type="submit" class="btn btn-default" name="submit_btn">Arrange</button>
            </form>
        <?php
            require_once("../models/connect.php");
            if(isset($_GET['option']) || isset($_GET['index'])){
                $option = $_GET['option'];
                $index = $_GET['index'];

                $sql = "SELECT p.price, p.typeId, t.type, p.townId, h.town  FROM tbl_property AS p INNER JOIN tbl_type as t ON p.typeId = t.typeId INNER JOIN tbl_town AS h ON p.townId = h.townId ORDER BY $option $index";
            }
            else{
                $sql = "SELECT p.propertyId, p.price, p.typeId, t.type, p.townId, h.town  FROM tbl_property AS p INNER JOIN tbl_type as t ON p.typeId = t.typeId INNER JOIN tbl_town AS h ON p.townId = h.townId ORDER BY propertyId";
            }

            $result = $link->query($sql);

            echo "<div class=\"container\">";
            echo "<table class=\"table table-hover\">";
            if(isset($_SESSION['user']))
                echo "<thead><tr><th>Town</th><th>Type</th><th>Price</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";
            else
                echo "<thead><tr><th>Town</th><th>Type</th><th>Price</th></tr></thead><tbody>";
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_array()) {
                    if(isset($_SESSION['user']))
                        echo "<tr><td>".$row['town']."</td><td>".$row['type']."</td><td>\xE2\x82\xAc".$row['price']."</td><td><button><a href=\"../models/edit.php?id=".$row['propertyId']."\">Edit</a></button></td><td><button><a href=\"../controllers/delete.php?id=".$row['propertyId']."\">Delete</a></button></td></tr>";
                    else
                        echo "<tr><td>".$row['town']."</td><td>".$row['type']."</td><td>\xE2\x82\xAc".$row['price']."</td></tr>";
                }

            }
            echo "</tbody></table>";
            if(isset($_SESSION['user']))
                echo "<button><a href=\"insert.php\">Add property</a></button>";
            echo "</div>";
        ?>
    
    </body>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; Max Schroeder 4.2D 2017</p>
        </div>
    </footer>
</html>