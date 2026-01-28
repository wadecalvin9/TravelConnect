<?php
// Check if the application is running and test the API
echo "Checking if the application is running...\n";

// Test with cURL to see if we can reach the currencies endpoint
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/currencies");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Currencies endpoint - Response code: " . $httpCode . "\n";
if ($httpCode == 200) {
    echo "Currencies endpoint is accessible\n";
} else {
    echo "Currencies endpoint not accessible. Response: " . $result . "\n";
}

// Test the conversion endpoint
$postData = json_encode([
    'amount' => 100,
    'from_currency' => 'USD',
    'to_currency' => 'EUR'
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/currency-convert");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Conversion endpoint - Response code: " . $httpCode . "\n";
echo "Conversion endpoint response: " . $result . "\n";