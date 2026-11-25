<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = trim($_POST["name"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $qualification = trim($_POST["qualification"] ?? "");
    $percentage = trim($_POST["percentage"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $mode = trim($_POST["mode"] ?? "");
    $declaration = $_POST["declaration"] ?? "";

    // Mandatory field validation
    if (
        empty($name) ||
        empty($dob) ||
        empty($gender) ||
        empty($email) ||
        empty($phone) ||
        empty($address) ||
        empty($qualification) ||
        empty($percentage) ||
        empty($course) ||
        empty($mode) ||
        empty($declaration)
    ) {
        die("Error: Please fill in all mandatory fields.");
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Please enter a valid email address.");
    }

    // Phone validation
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Error: Please enter a valid 10-digit mobile number.");
    }

    // Generate acknowledgement number
    $acknowledgement = "ADM" . date("YmdHis");

} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admission Acknowledgement</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .acknowledgement {
            padding: 35px;
        }

        .success {
            text-align: center;
            background: #e8f8ee;
            border: 1px solid #b7e4c7;
            color: #1b7a3d;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .success h1 {
            margin-bottom: 8px;
        }

        .details {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .detail-row {
            display: flex;
            border-bottom: 1px solid #ddd;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-title {
            width: 35%;
            background: #f4f5ff;
            padding: 13px;
            font-weight: bold;
        }

        .detail-value {
            width: 65%;
            padding: 13px;
        }

        .ack-number {
            text-align: center;
            margin: 25px 0;
            font-size: 18px;
            font-weight: bold;
            color: #243b55;
        }

        .back-btn {
            display: block;
            width: fit-content;
            margin: 25px auto 0;
            text-decoration: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            border-radius: 7px;
        }

        @media print {
            .back-btn {
                display: none;
            }
        }

        @media (max-width: 600px) {

            .detail-row {
                flex-direction: column;
            }

            .detail-title,
            .detail-value {
                width: 100%;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">
        <h1>ABC College of Technology</h1>
        <p>Admission Acknowledgement</p>
    </div>

    <div class="acknowledgement">

        <div class="success">
            <h1>✓ Application Submitted Successfully!</h1>
            <p>Your admission application has been received.</p>
        </div>

        <div class="ack-number">
            Acknowledgement No:
            <?php echo htmlspecialchars($acknowledgement); ?>
        </div>

        <h2>Applicant Details</h2>

        <div class="details">

            <div class="detail-row">
                <div class="detail-title">Applicant Name</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($name); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Date of Birth</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($dob); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Gender</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($gender); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Email</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($email); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Mobile Number</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($phone); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Address</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($address); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Qualification</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($qualification); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Percentage / CGPA</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($percentage); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Course Applied</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($course); ?>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-title">Study Mode</div>
                <div class="detail-value">
                    <?php echo htmlspecialchars($mode); ?>
                </div>
            </div>

        </div>

        <a href="index.php" class="back-btn">
            Apply Another Application
        </a>

    </div>

</div>

</body>
</html>