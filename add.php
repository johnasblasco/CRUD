<?php
    $rank = "";
    $name = "";
    $points = "";
    $nationality = "";

    $errorMessage = "";
    $successMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_act";

    $con = new mysqli($servername,$username,$password,$database);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rank = $_POST ["rank"];
        $name = $_POST ["name"];
        $points = $_POST ["points"];
        $nationality = $_POST ["nationality"];
    }

    do {
        if(empty($rank) || empty($name) || empty($points) || empty($nationality)){
            $errorMessage = "Hello, all fields are required!";
            break;
        }
        

        //add or insert to database
        if(is_numeric($rank) && is_numeric($points)){
            $sql = "INSERT INTO contestant(rank,name,points,nationality)" .
            "VALUES ('$rank','$name','$points','$nationality')";
        }
        else{
            $errorMessage = "Hello, POINTS and RANK are numbers only!";
            break;
        }
        $res = $con->query($sql);

        if(!$res){
            $errorMessage = "Invalid Query: " . $con->error;
            break;
        }
        $successMessage = "users Added successfully!";


        
    } while(false);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User data</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body>
    <div class="container my-5">
        <h2>Add New Contestant</h2>
        <?php
            if(!empty($errorMessage)){
                echo "
                    <div class='alert alert-success alert-dismissible fade show' role = 'alert'>
                        <strong>$errorMessage</strong>
                        <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                ";
            }
         ?>
        <form method = "post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Rank</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rank" value="<?php echo $rank; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Points</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="points" value="<?php echo $points; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nationality" value="<?php echo $nationality; ?>">
                </div>
            </div>

            <?php
                if(!empty($successMessage)){    
                    echo "
                        <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Exit</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>