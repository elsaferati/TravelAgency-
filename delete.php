<?php
// Include database connection
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // ID to delete

    // SQL Query to delete data
    $sql = "DELETE FROM logintable WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
