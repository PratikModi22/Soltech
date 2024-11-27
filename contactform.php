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
$sql = "SELECT name FROM products"; // Fetch
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="shortcut icon" href="https://5.imimg.com/data5/SELLER/Logo/2024/8/442849666/US/UF/EL/226181388/s-120x120.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>
</head>
<body>



<?php include'navbar.php'; ?>
<!-- form -->
<div class=" flex items-center justify-center min-h-screen">
      <div class="w-full max-w-lg bg-gray-100 rounded-lg shadow-lg p-8">
        <header class="bg-[#66A5AD] text-[#080808] py-4 rounded-t-lg text-center mb-6">
          <h1 class="text-2xl font-bold">Get Your Quoate</h1>
        </header>
        <form action="contactform1.php" method="post" enctype="multipart/form-data" class="space-y-6">
          <!-- Name Field -->
          <div>
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full  Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#66A5AD]">
          </div>
          
          <!-- Phone Number Field -->
          <div>
            <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Your Phone Number" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#66A5AD]">
          </div>
          
          <!-- Address Field -->
          <div>
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
            <input type="text" id="email" name="email" placeholder="Your Email Address" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#66A5AD]">
          </div>
          <!-- product type -->
          <div>
                <label for="products" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Type</label>
                <select id="products" name="products" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Select a Product</option>
                    <?php
                    // Step 3: Populate dropdown with products from the database
                    if ($result->num_rows > 0) {
                      // Loop through products and display them as options
                      while ($row = $result->fetch_assoc()) {
                          // Use the product name as the value and text
                          echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                      }
                    } else {
                        echo '<option disabled>No products available</option>';
                    }
                    ?>
                </select>
            </div>

          <!-- queries Field -->
          <div>
            <label for="query" class="block text-gray-700 text-sm font-medium mb-2">Query</label>
            <textarea id="query" name="query" rows="4" placeholder="Enter your queries"
                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#66A5AD]"></textarea>
          </div>
          
          <!-- Submit Button -->
          <div>
            <button type="submit"
                    class="w-full hover:bg-white hover:text-gray-700 border-black border-2 py-2 px-4 rounded-md bg-gray-800 text-white transition duration-200">
              Submit 
            </button>
          </div>
        </form>
      </div>
    </div>

<?php include'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>