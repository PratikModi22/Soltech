<?php
// Step 1: Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soltech";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve Products from Database
$sql = "SELECT * FROM products"; // Fetch all products
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="shortcut icon" href="https://5.imimg.com/data5/SELLER/Logo/2024/8/442849666/US/UF/EL/226181388/s-120x120.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>
</head>
<body>



<?php include'navbar.php'; ?>


<div class="w-full grid grid-cols-3 gap-9 mx-24">
    <?php while ($row = $result->fetch_assoc()) { ?>
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="md:h-96 h-auto max-w-full rounded-lg" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
        </a>
        <div class="px-5 pb-5">
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                    <?php echo $row['name']; ?>
                </h5>
            </a>
            <div class="flex items-center justify-between mt-3">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">
                    <?php echo  $row['price']; ?>
                </span>
            </div>
            <p class="mt-3 text-gray-600 dark:text-gray-400">
                <?php echo $row['description']; ?>
            </p>
        </div>
    </div>
    <?php } ?>
</div>


<?php include'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>