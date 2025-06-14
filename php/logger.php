<?php
// Telegram bot details
$botToken = '7811853820:AAEv88RPwnERm1Xcw8FFQFm9--luDqHyeig';
$chatId = '6142816761';

// Get visitor information
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y-m-d H:i:s');
$timezone = date_default_timezone_get();
$page = $_SERVER['HTTP_REFERER'] ?? 'Direct visit';

// Prepare message
$message = "New website visitor:\n";
$message .= "IP: $ip\n";
$message .= "User Agent: $userAgent\n";
$message .= "Date/Time: $dateTime\n";
$message .= "Timezone: $timezone\n";
$message .= "Visited: $page";

// Send to Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'HTML'
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
file_get_contents($url, false, $context);

// Return empty response (1x1 pixel)
header("Content-Type: image/gif");
echo base64_decode("R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==");
?>