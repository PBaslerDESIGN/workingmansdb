<?php 
include("functions.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['date'])){
    $date = formatDate($_POST['date']);
}


if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
}

if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
}

if(isset($_POST['phone'])){
    $phone = (integer)formatPhone($_POST['phone']);
}

if(isset($_POST['vehicle'])){
    $vehicle = $_POST['vehicle'];
}

if(isset($_POST['price'])){
    $price = (double)formatPrice($_POST['price']);
}

if(isset($_POST['trade'])){
    $trade = $_POST['trade'];
}

if(isset($_POST['notes'])){
    $notes = $_POST['notes'];
}
    
    $servername = "localhost";
    $username = "root";
    $password = "#\$Niltac2403";
    $dbname = "workingmansdb";

    if(isset($id)){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `customer` SET `customer_date`= '$date', `first_name`= '$fname', `last_name`= '$lname', `phone_number`= '$phone', `vehicle`= '$vehicle', `price`= '$price', `trade`= '$trade', `notes`= '$notes' WHERE id='$id'";

            // use exec() because no results are returned
            $conn->exec($sql);
            header("Location: http://localhost/projects/workingmansdb/html/updateCustomer.php?id=$id");
            die();
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }     
        
        $conn = null;
    }


?>