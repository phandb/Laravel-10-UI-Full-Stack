

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            justify-content: center;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Password Reset</h2>
        <p>Hello,</p>
        <p>We received a request to reset your password. Click the link below to reset your password:</p>
        <p style="justify-content: center;"><a href="{{ $action_link }}">Reset Your Password</a></p>
        <p>If you didn't request a password reset, you can ignore this email.</p>
        <p>Thank you,<br>Confirmation Team</p>
    </div>

</body>
</html>
