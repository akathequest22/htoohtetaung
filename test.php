<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <form action="send_email.php" method="post">
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Name"
                required
            />
        </div>
        <div class="form-group">
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                required
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                id="company"
                name="company"
                placeholder="Company"
            />
        </div>
        <div class="form-group">
            <textarea
                name="message"
                id="message"
                cols="30"
                rows="5"
                class="form-control"
                placeholder="Message"
                required
            ></textarea>
        </div>
        <button
            type="submit"
            class="btn btn-primary btn-block rounded w-lg"
        >
            Send Message
        </button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $company = htmlspecialchars($_POST['company']);
        $message = htmlspecialchars($_POST['message']);

        $to = "htoohtetaung.officially@gmail.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nCompany: $company\nMessage: $message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<p>Message sent successfully!</p>";
        } else {
            echo "<p>Failed to send message.</p>";
        }
    }
    ?>
</body>
</html>