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
        <?php
            require_once("connect.php");
            if(isset($_GET['id'])){
                $property_id = $_GET['id'];
            }
            if(isset($property_id)){
                $sql = "SELECT p.propertyId, p.price, p.typeId, t.type, p.townId, h.town  FROM tbl_property AS p INNER JOIN tbl_type as t ON p.typeId = t.typeId INNER JOIN tbl_town AS h ON p.townId = h.townId  WHERE propertyId='$property_id'";
                $result = $link->query($sql);
                $data = $result->fetch_array();
            }
            if(isset($_POST['submit_btn'])){
                $town = $_POST['Town'];
                $type = $_POST['Type'];
                $price = $_POST['Price'];
                
                if(!empty($town) && !empty($type) && !empty($price)){
                    $town = $link->real_escape_string($town);
                    $type = $link->real_escape_string($type);
                    $price = $link->real_escape_string($price);
                    $sql = "SELECT townId FROM tbl_town WHERE town = '$town' ";
                    $sql1 = "SELECT typeId FROM tbl_type WHERE type = '$type'";
                    $result = $link->query($sql);
                    $result1 = $link->query($sql1);
                    $row = $result->fetch_array();
                    $row1 = $result1->fetch_array();
                    $townId = $row['townId'];
                    $typeId = $row1['typeId'];
                    $propertyId = $_GET['id'];
                    
                    $sql3 = "UPDATE tbl_property set price=$price, typeId=$typeId, townId=$townId WHERE propertyId = $propertyId";
                    $link->query($sql3);
                    
                    if($link->affected_rows == 1){
                        header('location: ../views/list.php');
                    }
                    else{
                        echo "something went wrong!";
                        echo "<br/>".$link->error;
                    }
                }
            }
        ?>
        <form action="edit.php?id=<?=$property_id?>" method="post">
                  <div class="form-group">
                    <label for="town">Town:</label>
                    <input type="text" class="form-control" id="town" name="Town" value="<?=$data['town']?>">
                  </div>
                  <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="Type" value="<?=$data['type']?>">
                  </div>
                  <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" id="price" name="Price" value="<?=$data['price']?>">
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