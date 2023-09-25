<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate input (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
    } else {
        // Email configuration
        $to = "ramin.shrestha057@gmail.com"; // Replace with your email address
        $subject = "Contact Form Submission";
        $headers = "From: $name <$email>";

        // Compose the email message
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message";

        // Send the email
        if (mail($to, $subject, $email_message, $headers)) {
            echo "Your message has been sent successfully!";
        } else {
            echo "There was an error sending your message. Please try again later.";
        }
    }
} else {
    echo "Access denied.";
}
