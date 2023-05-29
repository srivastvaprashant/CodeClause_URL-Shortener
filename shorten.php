<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the original URL from the form submission
  $originalUrl = $_POST['original_url'];

  // Generate a unique short code
  $shortCode = generateShortCode();

  // Save the original URL and short code in a database or file
  saveUrlMapping($originalUrl, $shortCode);

  // Create the shortened URL
  $shortUrl = 'http://yourdomain.com/' . $shortCode;

  // Display the shortened URL to the user
  echo "Shortened URL: <a href=\"$shortUrl\">$shortUrl</a>";
}

function generateShortCode() {
  // Implement your own logic to generate a unique short code
  // For simplicity, this example uses a random string of 6 characters
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $shortCode = '';
  for ($i = 0; $i < 6; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $shortCode .= $characters[$index];
  }
  return $shortCode;
}

function saveUrlMapping($originalUrl, $shortCode) {
  // Implement your own logic to save the URL mapping in a database or file
  // For simplicity, this example just appends the mapping to a text file
  $data = "$originalUrl,$shortCode\n";
  file_put_contents('url_mappings.txt', $data, FILE_APPEND);
}
?>
