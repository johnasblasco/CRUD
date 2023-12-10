<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_act";

        //connection
        $con = new mysqli($servername,$username,$password,$database);

        $sql = "DELETE FROM contestant WHERE id=$id";
        $con->query($sql); 

        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            You successfully DELETED a contestant!,
        </div>
        ';

        // Redirect after 2 seconds
        echo '<meta http-equiv="refresh" content="2;url=index.php">';
    }
?>
