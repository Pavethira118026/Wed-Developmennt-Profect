```php
<?php

$name = $_POST["name"] ?? "";
$height = $_POST["height"] ?? "";
$weight = $_POST["weight"] ?? "";

$bmi = 0;
$status = "";
$recommendation = "";
$error = "";


/* Validate input */

if (empty($name) || empty($height) || empty($weight)) {

    $error = "Please fill in all the fields.";

}
elseif (!is_numeric($height) || !is_numeric($weight)) {

    $error = "Height and weight must contain valid numbers.";

}
elseif ($height <= 0 || $weight <= 0) {

    $error = "Height and weight must be greater than zero.";

}
else {

    /* Convert height from cm to meters */

    $heightInMeters = $height / 100;


    /* BMI Formula */

    $bmi = $weight /
           ($heightInMeters * $heightInMeters);


    /* Determine BMI category */

    if ($bmi < 18.5) {

        $status = "Underweight";

        $recommendation =
            "Consider eating a balanced and nutritious diet.
            Regular exercise and professional guidance
            may help you maintain a healthy weight.";

    }

    elseif ($bmi >= 18.5 && $bmi < 25) {

        $status = "Normal Weight";

        $recommendation =
            "Great! Maintain a balanced diet,
            regular physical activity, good sleep,
            and healthy lifestyle habits.";

    }

    elseif ($bmi >= 25 && $bmi < 30) {

        $status = "Overweight";

        $recommendation =
            "Consider regular physical activity
            and a balanced diet. Limit highly processed
            and sugary foods.";

    }

    else {

        $status = "Obesity";

        $recommendation =
            "Regular physical activity and a balanced
            eating plan are recommended. Consider
            consulting a healthcare professional
            for personalized guidance.";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>BMI Result</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .result-page {

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 30px;

        }

        .result-card {

            width: 600px;

            max-width: 100%;

            background: white;

            color: #222;

            padding: 40px;

            border-radius: 25px;

            text-align: center;

            box-shadow:
                0 25px 60px rgba(0,0,0,0.4);
        }

        .result-card h1 {

            color: #222;

            margin-bottom: 10px;

        }

        .welcome {

            color: #777;

            margin-bottom: 20px;

        }

        .bmi-number {

            font-size: 65px;

            font-weight: 800;

            color: #ff5c7a;

        }

        .status {

            display: inline-block;

            padding: 10px 25px;

            border-radius: 30px;

            background: #ffe3ea;

            color: #e83e63;

            font-weight: bold;

            margin: 10px 0 25px;

        }

        .recommendation {

            padding: 20px;

            background: #f7f8ff;

            border-radius: 15px;

            text-align: left;

            line-height: 1.7;

            color: #555;

        }

        .back-btn {

            display: inline-block;

            margin-top: 25px;

            padding: 13px 25px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #ff758c,
                    #ff7eb3
                );

            color: white;

            text-decoration: none;

            font-weight: bold;

        }

        .error {

            background: #ffe5e5;

            color: #c62828;

            padding: 15px;

            border-radius: 10px;

            margin: 20px 0;

            font-weight: bold;

        }

        .details {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin: 25px 0;

        }

        .detail-box {

            background: #f5f5f5;

            padding: 15px;

            border-radius: 12px;

        }

        .detail-box strong {

            display: block;

            color: #ff5c7a;

            font-size: 18px;

            margin-top: 5px;

        }

        @media(max-width: 500px) {

            .result-card {

                padding: 25px;
            }

            .details {

                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="result-page">

    <div class="result-card">

        <?php if ($error != "") { ?>

            <h1>⚠️ Invalid Input</h1>

            <div class="error">

                <?php
                echo htmlspecialchars($error);
                ?>

            </div>

            <a href="index.html"
               class="back-btn">
                ← Go Back
            </a>

        <?php } else { ?>

            <h1>🎯 Your BMI Result</h1>

            <p class="welcome">

                Hello,
                <strong>
                    <?php
                    echo htmlspecialchars($name);
                    ?>
                </strong>

            </p>


            <div class="details">

                <div class="detail-box">

                    Height

                    <strong>
                        <?php
                        echo htmlspecialchars($height);
                        ?> cm
                    </strong>

                </div>

                <div class="detail-box">

                    Weight

                    <strong>
                        <?php
                        echo htmlspecialchars($weight);
                        ?> kg
                    </strong>

                </div>

            </div>


            <div class="bmi-number">

                <?php
                echo number_format($bmi, 1);
                ?>

            </div>


            <div class="status">

                <?php
                echo $status;
                ?>

            </div>


            <div class="recommendation">

                <strong>💚 Health Recommendation</strong>

                <br><br>

                <?php
                echo htmlspecialchars($recommendation);
                ?>

            </div>


            <a href="index.html"
               class="back-btn">

                🔄 Calculate Again

            </a>

        <?php } ?>

    </div>

</div>

</body>

</html>
```
