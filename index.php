<?php

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer LIMIT 10";
        // use exec() because no results are returned
        $reuslt = $conn->query($sql)->fetchAll();
        if($result > 0){
            $myTable = "<table><tr>
            <td>ID</td>
            <td>Customer Date</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Phone Number</td>
            <td>Vehicle</td>
            <td>Price</td>
            <td>Trade</td>
        </tr></table></table>";
            foreach($result as $row){
                echo print_r($result);
                $myTable .= "<tr>";
                $myTable .= "<td>".$row['id']."</td>";
                $myTable .= "<td>".$row['cutomer_date']."</td>";
                $myTable .= "<td>".$row['first_name']."</td>";
                $myTable .= "<td>".$row['last_name']."</td>";
                $myTable .= "<td>".$row['phone_number']."</td>";
                $myTable .= "<td>".$row['vehicle']."</td>";
                $myTable .= "<td>".$row['price']."</td>";
                $myTable .= "<td>".$row['trade']."</td>";
                $myTable .= "</tr>";
            }
        }
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkingMansDB-Home</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/searchbar.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="header-h1-a" href="index.php">
                <h1>WorkingManDB</h1>
            </a>
            <!--Search types
            Date-Name-Phone number-vehicle-price-trade-notes
        -->
            <section id="searchbar">
                <form action="" name="search" id="searchbar-form">
                    <input type="text" name="search" placeholder="Search for client...">
                    <button id="search-button" type="button">Search</button>
                    <button id="advanced-button" type="button">Advanced</button>
                    <div id="searchbar-advanced" name="searchbar-advanced">
                        <label for="search-items">Search By:</label>
                        <select name="search-items" id="search-items">
                            <option value="date">Date</option>
                            <option value="fname">First Name</option>
                            <option value="lname">Last Name</option>
                            <option value="phone">Phone Number</option>
                            <option value="vehicle">Vehicle</option>
                            <option value="price">Price</option>
                            <option value="trade">Trade</option>
                            <option value="notes">Notes</option>
                        </select>
                        <button>Search</button>
                    </div>
                </form>
            </section>
            <nav>
                <ul>
                    <li><a href="index.php">Search</a></li>
                    <li><a href="html/customer.php">Customer</a></li>
                    <li><a href="html/faq.php">FAQ</a></li>
                </ul>
            </nav>
        </header>
        <main id="main-container">
            <h2>Recent Customer</h2>
            <section>
            <?php
                echo $myTable;
            ?>
            </section>
        </main>
        <footer></footer>
    </div>
    <script src="js/search.js"></script>
</body>

</html>