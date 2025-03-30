<?php
require_once 'C:\Windows\System32\vendor\phpoffice\phpexcel\Classes\PHPExcel.php';
require_once 'C:\Windows\System32\vendor\phpoffice\phpexcel\Classes\PHPExcel\IOFactory.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "icbtuser_airsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Load the Excel file
$file = "C1.xlsx"; // Path to your Excel file
$objPHPExcel = PHPExcel_IOFactory::load($file);
$worksheet = $objPHPExcel->getActiveSheet();
$data = $worksheet->toArray();

// Remove the first row (header)
$data = array_slice($data, 1); // Skips the first row

foreach ($data as $row) {
    $sql = "INSERT INTO requests (`id`,`timestamp`,`username`, `stream`, `paperCode`, `paperTitle`, `authorName`, `authorCategory`, `paperPresenter`, `paymentConfirmation`, `type`) VALUES ('" . 
        $conn->real_escape_string('') . "', '" . 
        $conn->real_escape_string(time()) . "', '" . 
        $conn->real_escape_string($row[0]) . "', '" . 
        $conn->real_escape_string($row[1]) . "', '" . 
        $conn->real_escape_string($row[2]) . "', '" . 
        $conn->real_escape_string($row[3]) . "', '" . 
        $conn->real_escape_string($row[4]) . "', '" . 
        $conn->real_escape_string($row[5]) . "', '" . 
        $conn->real_escape_string($row[6]) . "', '" . 
        $conn->real_escape_string($row[7]) . "', '" . 
        $conn->real_escape_string($row[8]) . "')";
        $result = $conn->query($sql);
       
        if ($result) {
            printf("Record inserted successfully.<br />");
         }
         if ($conn->error) {
            printf("Could not insert record into table: %s<br />", $conn->error);
         }
}

echo "Data imported successfully!";
$conn->close();
?>