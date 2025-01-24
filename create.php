
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myShop";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $email = $phone = $address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do{
        if (empty($name)|| empty($email) || empty($phone) || empty($address)) {
            $errorMessage= "All fields are required";
            break;
        }
    
    //add new client to database
    $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
    $result = $conn->query($sql);

    if (!$result) {
        $errorMessage = "Error adding new client: " . $conn->error;
        break;
    }


    $name="";
    $email="";
    $phone="";
    $address="";
    $successMessage = "New client added successfully";

    header("Location: /myShop/index.php");
    exit;

    }while(false);

}
    


?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <div class= 'container my-5'>
        <h2>New Client</h2>

        <?php if (!empty($errorMessage)) {
            echo "<div class='alert alert-warning alert-dissmissible fade show' role='alert'>
            <strong> $errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } ?>
        <form method = "post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class = "col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class = "col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class = "col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class = "col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            
            <?php if (!empty($successMessage)) {
                echo "<div class='alert alert-success alert-dissmissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } ?>
            <div class = 'row mb-3'>
                <div class ="offset-sm-3 col-sm-3 d-grid">
                    <button type = 'submit' class = 'btn btn-primary'>Submit</button>
            </div>
            <div class = 'col-sm-3 d-grid'>
                <a class = 'btn btn-outline-primary' href = '/myShop/index.php' role = 'button'>Cancel</a>
            </div>
        </form>

</body>
</html>