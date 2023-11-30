<?php
include("config/config.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $mysqli = new mysqli(HOST, USER, PASS, DBNAME);

    
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    
    $escapedInput = $mysqli->real_escape_string($input);

    $query = "SELECT * FROM services WHERE service LIKE '$escapedInput%'";

    $result = $mysqli->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output the table
            echo '<table class="table table-bordered table-stripped mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Provider</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $service = $row['service'];
                $description = $row['description'];
                $price = $row['price'];
                $availability = $row['availability'];
                $provider = $row['provider'];

                echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $service . '</td>
                        <td>' . $description . '</td>
                        <td>' . $price . '</td>
                        <td>' . $availability . '</td>
                        <td>' . $provider . '</td>
                      </tr>';
            }

            echo '</tbody></table>';
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
        }
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
