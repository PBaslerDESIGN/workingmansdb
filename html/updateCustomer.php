<?php 
include("functions.php");
if(isset($_GET['id'])){
 $id = $_GET['id'];   
}

$servername = "localhost";
$username = "root";
$password = "#\$Niltac2403";
$dbname = "workingmansdb";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where id='$id'";
        // use exec() because no results are returned
        $result = $conn->query($sql)->fetch();
        if($result > 0){
            if(isset($result['customer_date'])){
                $date = formatDate($result['customer_date']);
            }
            
            
            if(isset($result['first_name'])){
                $fname = $result['first_name'];
            }
            
            if(isset($result['last_name'])){
                $lname = $result['last_name'];
            }
            
            if(isset($result['phone_number'])){
                $phone = formatPhone($result['phone_number']);
            }
            
            if(isset($result['vehicle'])){
                $vehicle = $result['vehicle'];
            }
            
            if(isset($result['price'])){
                $price = formatPrice($result['price']);
            }
            
            if(isset($result['trade'])){
                $trade = $result['trade'];
            }
            
            if(isset($result['notes'])){
                $notes = $result['notes'];
            }
            
        }
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

?>    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkingMansDB-Update Customer</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/updateCustomer.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="header-h1-a" href="customer.php">
                <h1>WorkingManDB</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="../index.php">Search</a></li>
                    <li><a href="customer.php">Customer</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
        </header>
        <main>

        <section id="main-content">
                <h2 id="main-heading">Update Customer</h2>
                <form action="update.php" method="post" id="form-customer" name="add_customer">
                    <div class="form-column">
                        <p id="pageMessage">Customer was successfully updated!</p>
                    </div>
                    <input type="hidden" value="<?php echo $id;?>" name="id">
                    <div class="form-column">
                        <label for="date">Date:</label>
                        <input type="text" id="date" name="date" maxlength="10" placeholder="ex. MM/DD/YYYY" value="<?php echo $date;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" maxlength="25" placeholder="ex. John" value="<?php echo $fname;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" maxlength="25" placeholder="ex. Doe" value="<?php echo $lname;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="phone">Phone #</label>
                        <input type="text" id="phone" name="phone" maxlength="13" placeholder="ex. (555)555-5555" value="<?php echo $phone;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="vehicle">Vehicle:</label>
                        <input type="text" id="vehicle" name="vehicle" maxlength="25" placeholder="ex. Dodge Ram" value="<?php echo $vehicle;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" maxlength="10" placeholder="ex. $9999.99" value="<?php echo $price;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="trade">Trade In:</label>
                        <input type="text" id="trade" name="trade" maxlength="25" placeholder="ex. Dodge Ram" value="<?php echo $trade;?>">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="notes">Notes:</label>
                        <textarea id="notes" name="notes" maxlength="250"
                            placeholder="Write comments in 250 or less..."><?php echo $notes;?></textarea>
                        <button id="form-button" type="submit" name="submit">Submit</button>
                        <div class="errorState"></div>
                    </div>

                </form>
            </section>
        </main>
        <footer></footer>
    </div>
    <script src="../js/updateCustomer.js"></script>
</body>

</html>
