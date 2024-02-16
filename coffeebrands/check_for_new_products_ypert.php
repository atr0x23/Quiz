<?php
#Ypertrofeion
$servername = "localhost";
$username = "coffeebr_ypertrofeionUser";
$password = "@Ypertrofeion1";
$dbname = "coffeebr_ypertrofeion";

$previous_count = 0;
$previous_status = 0;
if (file_exists('last_count.txt')) {
    $previous_count = (int)file_get_contents('last_count.txt');
    // echo "the previous count was $previous_count\n";
}
if (file_exists('product_status.txt')) {
    $previous_status = (int)file_get_contents('product_status.txt');
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");

// SQL query total products count
$sql = "SELECT COUNT(id) AS count FROM wp_posts where post_type='product'";
$result = $conn->query($sql);
// Fetching the count
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $count_now = $row["count"];
    }
} else {
    echo "0 results for product count query";
}

//sql query product status
$sqlForTrash = "SELECT count(id) AS product_status_count FROM wp_posts where post_status = 'trash' AND post_type='product'";
$resultForTrash = $conn->query($sqlForTrash);
// Fetching the count
if ($resultForTrash->num_rows > 0) {
    // output data of each row
    while($row = $resultForTrash->fetch_assoc()) {
        $current_status = $row["product_status_count"];
    }
} else {
    echo "0 results for status query";
}



if($count_now == $previous_count){
    echo "its the same: " . $count_now . "\n nothing changed: " . $previous_count;
}
if($current_status == $previous_status){
    echo "same status in trash: " . $current_status . "\n nothing changed in trash: " . $previous_status;
}

if($count_now < $previous_count){
    file_put_contents('last_count.txt', $count_now);
    sendSlack("Product/s has been deleted, count before: $previous_count | count now: $count_now");
}

if($current_status < $previous_status){
    file_put_contents('product_status.txt', $current_status);
    sendSlack("Product/s has been deleted from trash, Trash before: $previous_status | Trash now: $current_status");
}

if($count_now > $previous_count){ 
    file_put_contents('last_count.txt', $count_now);

    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    //query for get product names from the new products
    $names_query = "SELECT post_title FROM wp_posts WHERE DATE(post_date) >= '$yesterday' AND DATE(post_date) <= '$today' AND post_type='product'";
    $result = $conn->query($names_query);
    if (!$result) {
        die("Error executing query: " . $mysqli->error);
    }
        // Fetch the results
        $titles = [];
        while ($row = $result->fetch_assoc()) {
            $titles[] = $row['post_title'];
        }
        $names = implode(", ", $titles);
        //echo $names . " - <br><br>";
    sendSlack("New product/s has been added! count before: $previous_count | count now: $count_now | $names");
}

if($current_status > $previous_status){
    file_put_contents('product_status.txt', $current_status);

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        //query for get product names from the deleted into trash
        $query = "SELECT post_title FROM wp_posts WHERE post_status='trash'";
        $result = $conn->query($query);
        if (!$result) {
            die("Error executing query: " . $mysqli->error);
        }
        // Fetch the results
        $titles = [];
        while ($row = $result->fetch_assoc()) {
            $titles[] = $row['post_title'];
        }
         $names = implode(", ", $titles);
        //echo $names . " - <br><br>";
    sendSlack("Product/s has been moved into trash, Trash before: $previous_status | Trash now: $current_status | $names");
}


function sendSlack($message) {
    // URL where the request is to be sent
    $url = 'https://hooks.slack.com/services/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';
    //$url = 'https://hooks.slack.com/services/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';

    // Data payload
    $data = array('text' => $message);
    $data_json = json_encode($data);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)){
        echo 'cURL error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Optional: Output the response
    return $response;
}

// Example Usage
// $response = sendSlack("Hello, World! 23");
// echo $response;

?>
