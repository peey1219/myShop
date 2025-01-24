<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySHOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class = "btn btn-primary" href="/myShop/create.php" role='button'>New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $severname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "myShop";
                // Create connection
                $conn = new mysqli($severname, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // read all fow from database table
                $sql = "SELECT * FROM clients";
                $result = $conn->query($sql);
                 // check if query returns any result
                 if (!$result) {
                    trigger_error('Invalid query: ' . $conn->error);
                }
                //read data of each row
                while ($row =$result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['address']."</td>";
                    echo "<td>".$row['created_at']."</td>";
                    echo "<td>
                            <a class='btn btn-primary' href='/myShop/edit.php?id=".$row['id']."' role='button'>Edit</a>
                            <a class='btn btn-danger' href='/myShop/delete.php?id=".$row['id']."' role='button'>Delete</a>
                        </td>";
                    echo "</tr>";
                }
                ?>

                <tr>
                    <td>10</td>
                    <td>John Doe</td>
                    <td>johh.doe@email.co</td>
                    <td>1234567890</td>
                    <td>123 Main St, City</td>
                    <td>18/05/2022</td>
                    <td>
                        <a class="btn btn-primary" href="/myShop/edit.php" >Edit</a>
                        <a class="btn btn-danger" href="/myShop/delete.php" >Delete</a>
                    </td>
                </tr>

               
            </tbody>
        
</body>
</html>