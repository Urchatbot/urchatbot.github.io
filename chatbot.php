<?php

function getBotResponse($input) {
    // Normalize the input to make it case-insensitive
    $input = strtolower(trim($input));

    // Replace with your Brainshop API details
    $apiKey = 'I0rvAT59Qkz5Se41'; // Your API key
    $botId = '183270'; // Your bot ID
    $url = "http://api.brainshop.ai/get?bid=183270&key=I0rvAT59Qkz5Se41&uid=183270&msg=" . urlencode($input);
    
    // Use cURL to send the request to Brainshop
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Decode the response
    $responseData = json_decode($response, true);
    
    // Return the response message
    return $responseData['cnt'] ?? "I'm sorry, I don't understand that.";
}

// Handle user input
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_input'])) {
    $userInput = $_POST['user_input'];
    $botResponse = getBotResponse($userInput);
    echo $botResponse;
    exit; // Prevent further processing
}
?>
