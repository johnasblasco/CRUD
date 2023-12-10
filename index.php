<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTIVITY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!-- header -->
    <h1 class = "text-center">ACTIVITY BASIC CRUD</h1>
   
    <!-- table -->
    <table class="table table-hover table-borderless">
  <thead>
    <tr>
    <th>ID</th>
      <th>Rank</th>
      <th>Name</th>
      <th>Points</th>
      <th>Nationality</th>
      <th>Settings</th>

    </tr>
  </thead>
  <tbody>
    <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "db_act";

                $con = new mysqli($servername,$username,$password,$database);

                //read data
                $sql = "SELECT * FROM contestant order by rank";
                $res = $con->query($sql);

        
                
                while($row = $res->fetch_assoc()){
                    echo "
                    <tr>
                        <th scope='row'>$row[id]</th>
                        <td>$row[rank]</td>
                        <td>$row[name]</td>
                        <td>$row[points]</td>
                        <td>$row[nationality]</td>
                        <td>
                            <a href = 'edit.php?id=$row[id]'><button type='button' class='btn btn-success'>Update</button></a> 
                            <a href = 'del.php?id=$row[id]'><button type='button' class='btn btn-danger'>Delete</button></a>
                        </td>
                  </tr>
                    ";
                }
            ?>

  </tbody>
</table>
 <!-- end of table -->


<a href="add.php"><button type="button" class="btn btn-success btn-lg btn-block w-100">Add New Contester</button></a>


</body>
</html>