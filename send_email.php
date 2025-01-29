<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
    if ($name === false) {
        $name = "";
    }
    $email = $_GET['email'];
    $message = $_GET['message'];
    $to = "pavansreddy26@gmail.com"; // Your email address
    $subject = "Message from Portfolio Website";

    $body = "You have received a new message from your portfolio website:\n\n";
    $body .= "Name: " . $name . "\n\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Message:\n" . $message;

    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank_you.html"); // Redirect to thank you page
        exit();
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
}

?>
