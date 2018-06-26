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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="list.php">Property list</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </nav>
        <main>
          <div class="jumbotron">
            <h1>Latest properties for sale </h1>
          </div> 
            <?php
                require_once("../models/connect.php");
                $sql = "SELECT p.price, p.typeId, t.type, p.townId, h.town  FROM tbl_property AS p INNER JOIN tbl_type as t ON p.typeId = t.typeId INNER JOIN tbl_town AS h ON p.townId = h.townId ORDER BY propertyId DESC LIMIT 3";
            
                $result = $link->query($sql);
                
                echo "<div class=\"container\">";
                echo "<table class=\"table table-hover\">";
                echo "<thead><tr><th>Town</th><th>Type</th><th>Price</th></tr></thead><tbody>";
                if ($result->num_rows > 0) {
					
					while ($row = $result->fetch_array()) {
						echo "<tr><td>".$row['town']."</td><td>".$row['type']."</td><td>\xE2\x82\xAc".$row['price']."</td></tr>";
					}
				
                }
                echo "</tbody></table>";
                echo "</div>";
            ?>
        
        </main>
    </body>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">&copy; Max Schroeder 4.2D 2017</p>
        </div>
    </footer>
</html>