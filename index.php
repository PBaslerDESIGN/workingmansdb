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
    $servername = "localhost";
    $username = "root";
    $password = "#\$Niltac2403";
    $dbname = "workingmansdb";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM customer LIMIT 10");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($result) {
        
    }
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
echo "</table>";
?>
            </section>
        </main>
        <footer></footer>
    </div>
    <script src="js/search.js"></script>
</body>

</html>