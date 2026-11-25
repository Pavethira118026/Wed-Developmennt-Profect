```php
<?php

$name = "";
$email = "";
$phone = "";
$gender = "";
$course = "";
$mode = "";
$date = "";
$address = "";

$errors = [];


// Check whether form was submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Get form values

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $course = $_POST["course"] ?? "";
    $mode = $_POST["mode"] ?? "";
    $date = $_POST["date"] ?? "";
    $address = trim($_POST["address"] ?? "");


    // Validate name

    if (empty($name)) {

        $errors[] = "Name is required.";

    }


    // Validate email

    if (empty($email)) {

        $errors[] = "Email is required.";

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Please enter a valid email address.";

    }


    // Validate phone

    if (empty($phone)) {

        $errors[] = "Mobile number is required.";

    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

        $errors[] =
            "Mobile number must contain exactly 10 digits.";

    }


    // Validate gender

    if (empty($gender)) {

        $errors[] = "Please select your gender.";

    }


    // Validate course

    if (empty($course)) {

        $errors[] = "Please select a course.";

    }


    // Validate mode

    if (empty($mode)) {

        $errors[] = "Please select a study mode.";

    }


    // Validate date

    if (empty($date)) {

        $errors[] = "Please select a start date.";

    }


    // Validate address

    if (empty($address)) {

        $errors[] = "Address is required.";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Result</title>

    <link rel="stylesheet"
          href="style.css">


    <style>

        .result-page {

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 30px 15px;

        }


        .result-card {

            width: 650px;

            max-width: 100%;

            background: white;

            padding: 40px;

            border-radius: 25px;

            box-shadow:
                0 25px 60px rgba(0,0,0,0.3);

        }


        .success-icon {

            width: 80px;

            height: 80px;

            margin: auto;

            display: flex;

            justify-content: center;

            align-items: center;

            border-radius: 50%;

            background: #d9f8e8;

            color: #1fa463;

            font-size: 40px;

        }


        .result-card h1 {

            text-align: center;

            color: #292344;

            margin: 20px 0 8px;

        }


        .success-message {

            text-align: center;

            color: #777;

            margin-bottom: 30px;

        }


        .details {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

        }


        .detail {

            padding: 17px;

            border-radius: 12px;

            background: #f7f6ff;

        }


        .detail.full {

            grid-column: 1 / -1;

        }


        .detail label {

            display: block;

            color: #888;

            font-size: 12px;

            margin-bottom: 6px;

        }


        .detail strong {

            color: #292344;

            font-size: 14px;

            word-break: break-word;

        }


        .error-box {

            padding: 20px;

            border-radius: 12px;

            background: #ffe8e8;

            color: #c62828;

            margin-bottom: 20px;

        }


        .error-box h3 {

            margin-bottom: 10px;

        }


        .error-box ul {

            padding-left: 20px;

            line-height: 1.8;

        }


        .back-button {

            display: block;

            text-align: center;

            margin-top: 25px;

            padding: 14px;

            border-radius: 12px;

            background:
                linear-gradient(
                    90deg,
                    #ff5d95,
                    #8373ff
                );

            color: white;

            text-decoration: none;

            font-weight: bold;

        }


        @media (max-width: 550px) {

            .result-card {

                padding: 25px 18px;

            }

            .details {

                grid-template-columns: 1fr;

            }

            .detail.full {

                grid-column: auto;

            }

        }

    </style>

</head>


<body>


<div class="result-page">

    <div class="result-card">


        <?php if (!empty($errors)) { ?>


            <!-- Error Message -->

            <div class="success-icon"
                 style="background:#ffe2e2;color:#d32f2f;">

                ✕

            </div>


            <h1>
                Registration Failed
            </h1>


            <p class="success-message">

                Please correct the following errors.

            </p>


            <div class="error-box">

                <h3>
                    ⚠️ Please check:
                </h3>

                <ul>

                    <?php foreach ($errors as $error) { ?>

                        <li>
                            <?php
                            echo htmlspecialchars($error);
                            ?>
                        </li>

                    <?php } ?>

                </ul>

            </div>


            <a href="index.html"
               class="back-button">

                ← Go Back to Registration

            </a>


        <?php } else { ?>


            <!-- Successful Registration -->


            <div class="success-icon">

                ✓

            </div>


            <h1>
                Registration Successful!
            </h1>


            <p class="success-message">

                Thank you,
                <strong>
                    <?php
                    echo htmlspecialchars($name);
                    ?>
                </strong>.

                Your course registration has been
                successfully submitted.

            </p>


            <!-- Registration Details -->

            <div class="details">


                <div class="detail">

                    <label>
                        FULL NAME
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($name);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <label>
                        EMAIL
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($email);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <label>
                        MOBILE NUMBER
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($phone);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <label>
                        GENDER
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($gender);
                        ?>
                    </strong>

                </div>


                <div class="detail full">

                    <label>
                        SELECTED COURSE
                    </label>

                    <strong>
                        🎓
                        <?php
                        echo htmlspecialchars($course);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <label>
                        STUDY MODE
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($mode);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <label>
                        START DATE
                    </label>

                    <strong>
                        <?php
                        echo htmlspecialchars($date);
                        ?>
                    </strong>

                </div>


                <div class="detail full">

                    <label>
                        ADDRESS
                    </label>

                    <strong>
                        <?php
                        echo nl2br(
                            htmlspecialchars($address)
                        );
                        ?>
                    </strong>

                </div>


            </div>


            <a href="index.html"
               class="back-button">

                ← Register Another Student

            </a>


        <?php } ?>


    </div>

</div>


</body>

</html>

