<?php
    
    
    require_once('connection.php');
    $conn = connect();
    
    $query = "select * from student_tbl";
    $result = mysqli_query($conn, $query) or die ("Error in query". mysqli_error($conn));
    
    $userPassword = "123abc";
    $hashPass = password_hash($userPassword,PASSWORD_DEFAULT);

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Revision1</title>
        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="revision.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
            </ul>
           
          </div>
    </nav>
        
        
        
        
        <form method="post">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Age</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                
            </tr>
            </thead>
            
                <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        echo"<tbody>";
                        echo"<tr>";
                        echo "<td id='$id'> $row[0] </td>";
                        echo "<td> $row[1] </td>";
                        echo "<td> $row[2] </td>";
                        echo "<td> $row[3] </td>";
                        echo"<td> <button type='button' class='btn btn-outline-success'> Update </button> </td>";
                        echo"<td> <button type='button'class='btn btn-outline-danger'> <a href='http://localhost/revision1/deleteStudent.php?id=$row[0]'> Delete </a> </button></td>";
                        echo"</tr>";
                        echo"</tbody>";
                     
                    }
                ?>
                
        </table>
        <button type="submit" class="btn btn-outline-info"> Add </button>
        </form>
        
    </body>
</html>


