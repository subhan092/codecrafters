<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
        $MSG = $_POST['message'];

        // Establish a connection to the database
        $con = mysqli_connect("localhost:3306", "root", "", "codecrafters");

        if (!$con) {
            die(mysqli_connect_error($con));
        } else {
            echo "Connection Successful </br>";
        }

        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO sendmsg (name, email, phone, message) VALUES (?, ?, ?, ?)";

        if ($query) {
            ?>
            <script>
                
              alert("YOUR data Submitted Sucessfully");
          
            </script>
            <?php
        }
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssss", $Name, $Email, $Phone, $MSG);

            // Execute the prepared statement
            $result = mysqli_stmt_execute($stmt);
             
          

            if ($result) {
                echo "Inserted Successfully";
            } else {
                die("Error </br>" . mysqli_error($con));
            }
        
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            die("Error in preparing the statement");
        }

        // Close the connection
        mysqli_close($con);
    } else {
        echo "One or more required fields are not set.";
    }
} else {
    echo "Form not submitted.";
}

if  (isset( $_POST['btn'])) {
          
}
?>
