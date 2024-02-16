<?php
$servername = "localhost";
$username = "iscooting_karaiskaki_user";
$password = "C+C*qE]gY}3*g;3";
$dbname = "iscooting_karaiskaki_db";

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

// SQL query total products count
$sql = "SELECT COUNT(id) AS count FROM wp_posts";
$result = $conn->query($sql);
// Fetching the count
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $the_count = $row["count"];
    }
} else {
    echo "0 results for product count query";
}

//sql query product status
$sqlForTrash = "SELECT count(id) AS product_status_count FROM wp_posts where post_status = 'trash'";
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


if($the_count == $previous_count){
    //echo "its the same: " . $the_count . "\nnothing changed: " . $previous_count;
}
if($current_status == $previous_status){
    //echo "status its the same: " . $current_status . "\nnothing changed: " . $previous_status;
}

if($the_count < $previous_count){
    file_put_contents('last_count.txt', $the_count);
    sendSlack("Product has been deleted, count before: $previous_count | count now: $the_count");
}

if($current_status < $previous_status){
    file_put_contents('product_status.txt', $current_status);
    sendSlack("Product has been deleted from trash, Trash before: $previous_status | Trash now: $current_status");
}

if($the_count > $previous_count){ 
    file_put_contents('last_count.txt', $the_count);
    sendSlack("New product has been added! count before: $previous_count | count now: $the_count");
}

if($current_status > $previous_status){
    file_put_contents('product_status.txt', $current_status);
    sendSlack("Product has been moved into trash, Trash before: $previous_status | Trash now: $current_status");
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
