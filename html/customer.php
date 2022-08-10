<?php 

function formatDate($date){
    $thirdChar = substr($date, 2, 1);
    if($thirdChar === '/'){
      $sqlDate = subStr($date,6);
      $sqlDate = $sqlDate ."-". subStr($date, 0, 2);
      $sqlDate = $sqlDate ."-". subStr($date, 3, 2);
      return $sqlDate;
    }else{
      $sqlDate = subStr($date, 5, 2);
      $sqlDate = $sqlDate ."/". subStr($date, 8, 2);
      $sqlDate = $sqlDate ."/". subStr($date, 0, 4);
      return $sqlDate;
    }
  }

function formatPhone($phone){
    $firstChar = substr($phone, 0, 1);
    if($firstChar === '('){
      $sqlPhone = subStr($phone, 1, 3);
      $sqlPhone .= subStr($phone, 5, 3);
      $sqlPhone .= subStr($phone, 9, 4);
      return $sqlPhone;
    }else{
      $sqlPhone = "(".subStr($phone, 0, 3);
      $sqlPhone .= ")".subStr($phone, 3, 3);
      $sqlPhone .= "-". subStr($phone, 6, 4);
      return $sqlPhone;
    }
  }

function formatPrice($price){
    $firstChar = substr($price, 0, 1);
    if($firstChar === '$'){
      $sqlPrice = subStr($price, 1);
      return $sqlPrice;
    }else{
      $sqlPrice = "$".subStr($price, 0);

      return $sqlPrice;
    }
  }

if(isset($_POST['date'])){
    $date = $_POST['date'];
    $date = date(formatDate($date));
}


if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
}

if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
}

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $phone = (integer)formatPhone($phone);
}

if(isset($_POST['vehicle'])){
    $vehicle = $_POST['vehicle'];
}

if(isset($_POST['price'])){
    $price = $_POST['price'];
    $price = (double)formatPrice($price);
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

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO `customer` (`id`, `customer_date`, `first_name`, `last_name`, `phone_number`, `vehicle`, `price`, `trade`, `notes`) 
  VALUES (NULL, '$date', '$fname', '$lname', '$phone', '$vehicle', '$price', '$trade', '$notes')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
    

echo <<<_END
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkingMansDB-Customer</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/addCustomer.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="header-h1-a" href="customer.html">
                <h1>WorkingManDB</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="../index.html">Search</a></li>
                    <li><a href="customer.html">Customer</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                </ul>
            </nav>
        </header>
        <main>

        <section id="main-content">
                <h2 id="main-heading">Add Customer</h2>
                <form action="customer.php" method="post" id="form-customer" name="add_customer">
                    <div class="form-column">
                        <label for="date">Date:</label>
                        <input type="text" id="date" name="date" maxlength="10" placeholder="ex. MM/DD/YYYY">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" maxlength="25" placeholder="ex. John">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" maxlength="25" placeholder="ex. Doe">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="phone">Phone #</label>
                        <input type="text" id="phone" name="phone" maxlength="13" placeholder="ex. (555)555-5555">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="vehicle">Vehicle:</label>
                        <input type="text" id="vehicle" name="vehicle" maxlength="25" placeholder="ex. Dodge Ram">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" maxlength="10" placeholder="ex. $9999.99">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="trade">Trade In:</label>
                        <input type="text" id="trade" name="trade" maxlength="25" placeholder="ex. Dodge Ram">
                        <div class="errorState"></div>
                    </div>

                    <div class="form-column">
                        <label for="notes">Notes:</label>
                        <textarea id="notes" name="notes" maxlength="250"
                            placeholder="Write comments in 250 or less..."></textarea>
                        <button id="form-button" type="submit" name="submit">Submit</button>
                        <div class="errorState"></div>
                    </div>

                </form>
            </section>
        </main>
        <footer></footer>
    </div>
    <script src="../js/customer.js"></script>
</body>

</html>
_END;
?>