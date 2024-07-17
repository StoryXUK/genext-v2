
Copy code
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $terms = isset($_POST['terms']) ? 'Accepted' : 'Not Accepted';

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = 'james@genext.io';
        $subject = 'New Subscription';
        $headers = "From: hello@genext.io\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        // Email body
        $body = "New subscription request:\n\n";
        $body .= "Email: $email\n";
        $body .= "Terms & Conditions: $terms\n";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Subscription successful!";
        } else {
            echo "Failed to send subscription.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>