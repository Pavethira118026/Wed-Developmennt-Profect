<?php

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$mobile = trim($_POST["mobile"] ?? "");

$errors = [];

/* -----------------------------
   EMAIL VALIDATION
------------------------------ */

if (empty($email)) {

    $errors[] = "Email ID is required.";

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors[] = "Please enter a valid email ID.";

}


/* -----------------------------
   PASSWORD VALIDATION
------------------------------ */

if (empty($password)) {

    $errors[] = "Password is required.";

} elseif (strlen($password) < 8) {

    $errors[] = "Password must contain at least 8 characters.";

} elseif (!preg_match("/[A-Z]/", $password)) {

    $errors[] = "Password must contain at least one uppercase letter.";

} elseif (!preg_match("/[a-z]/", $password)) {

    $errors[] = "Password must contain at least one lowercase letter.";

} elseif (!preg_match("/[0-9]/", $password)) {

    $errors[] = "Password must contain at least one number.";

}


/* -----------------------------
   MOBILE NUMBER VALIDATION
------------------------------ */

if (empty($mobile)) {

    $errors[] = "Mobile number is required.";

} elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {

    $errors[] = "Mobile number must contain exactly 10 digits.";

}


/* -----------------------------
   DISPLAY RESULT
------------------------------ */

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Validation Result</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .result {
            padding: 30px;
        }

        .success {
            background: #e8f8ee;

            border: 1px solid #b7e4c7;

            color: #18743c;

            padding: 20px;

            border-radius: 10px;

            text-align: center;

            margin-bottom: 20px;
        }

        .error {
            background: #fff0f0;

            border: 1px solid #f0b5b5;

            color: #c62828;

            padding: 20px;

            border-radius: 10px;

            margin-bottom: 20px;
        }

        .error h2 {
            margin-bottom: 12px;
        }

        .error ul {
            padding-left: 20px;
        }

        .error li {
            margin-bottom: 8px;
        }

        .details {
            background: #f5f6ff;

            padding: 18px;

            border-radius: 10px;

            margin-top: 20px;
        }

        .details p {
            margin: 10px 0;

            color: #333;
        }

        .back-btn {
            display: block;

            text-align: center;

            text-decoration: none;

            background: linear-gradient(
                135deg,
                #667eea,
                #764ba2
            );

            color: white;

            padding: 13px;

            border-radius: 7px;

            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>Validation Result</h1>

        <p>Applicant Validation System</p>

    </div>


    <div class="result">

        <?php if (empty($errors)) { ?>

            <!-- SUCCESS MESSAGE -->

            <div class="success">

                <h2>✓ Validation Successful!</h2>

                <p>
                    All applicant details are valid.
                </p>

            </div>

            <div class="details">

                <p>
                    <strong>Email:</strong>
                    <?php echo htmlspecialchars($email); ?>
                </p>

                <p>
                    <strong>Mobile:</strong>
                    <?php echo htmlspecialchars($mobile); ?>
                </p>

                <p>
                    <strong>Password:</strong>
                    Valid password
                </p>

            </div>

        <?php } else { ?>

            <!-- ERROR MESSAGE -->

            <div class="error">

                <h2>✗ Validation Failed</h2>

                <p>Please correct the following errors:</p>

                <br>

                <ul>

                    <?php foreach ($errors as $error) { ?>

                        <li>
                            <?php echo htmlspecialchars($error); ?>
                        </li>

                    <?php } ?>

                </ul>

            </div>

        <?php } ?>


        <a href="index.php" class="back-btn">
            ← Go Back to Application
        </a>

    </div>

</div>

</body>

</html>