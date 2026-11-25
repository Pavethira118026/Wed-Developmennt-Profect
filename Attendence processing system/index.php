<?php

// User-defined function to calculate attendance percentage
function calculateAttendance($totalDays, $presentDays)
{
    if ($totalDays <= 0) {
        return 0;
    }

    return ($presentDays / $totalDays) * 100;
}

// User-defined function to determine eligibility
function checkEligibility($percentage)
{
    if ($percentage >= 75) {
        return "Eligible for Examination";
    } else {
        return "Not Eligible for Examination";
    }
}

// User-defined function to return attendance status
function getStatus($percentage)
{
    if ($percentage >= 90) {
        return "Excellent Attendance";
    } elseif ($percentage >= 75) {
        return "Good Attendance";
    } elseif ($percentage >= 65) {
        return "Shortage of Attendance";
    } else {
        return "Very Low Attendance";
    }
}

$name = "";
$registerNo = "";
$totalDays = "";
$presentDays = "";
$percentage = null;
$eligibility = "";
$status = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $registerNo = trim($_POST["register_no"]);
    $totalDays = $_POST["total_days"];
    $presentDays = $_POST["present_days"];

    // Validation
    if (empty($name) || empty($registerNo) || empty($totalDays) || empty($presentDays)) {
        $error = "Please fill in all fields.";
    } elseif (!is_numeric($totalDays) || !is_numeric($presentDays)) {
        $error = "Total days and present days must be numbers.";
    } elseif ($totalDays <= 0) {
        $error = "Total working days must be greater than 0.";
    } elseif ($presentDays < 0 || $presentDays > $totalDays) {
        $error = "Present days must be between 0 and total working days.";
    } else {

        // Calling user-defined functions
        $percentage = calculateAttendance($totalDays, $presentDays);
        $eligibility = checkEligibility($percentage);
        $status = getStatus($percentage);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Processing System</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 850px;
            max-width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .header {
            background: #222;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .header h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .header p {
            color: #ddd;
            font-size: 15px;
        }

        .form-section {
            padding: 30px;
        }

        .form-section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .input-box {
            display: flex;
            flex-direction: column;
        }

        .input-box label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #444;
        }

        .input-box input {
            padding: 13px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        .input-box input:focus {
            border-color: #667eea;
        }

        .btn {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            background: #ffe5e5;
            color: #d00000;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }

        .result {
            margin-top: 30px;
            padding: 25px;
            background: #f5f7ff;
            border-radius: 15px;
            border-left: 6px solid #667eea;
        }

        .result h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 5px;
            border-bottom: 1px solid #ddd;
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-row span:first-child {
            font-weight: bold;
            color: #444;
        }

        .percentage {
            font-size: 28px;
            font-weight: bold;
            color: #667eea;
        }

        .eligible {
            color: green;
            font-weight: bold;
        }

        .not-eligible {
            color: red;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #f0f0f0;
            color: #666;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 24px;
            }

            .result-row {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📊 Attendance Processing System</h1>
        <p>Calculate Attendance & Examination Eligibility</p>
    </div>

    <div class="form-section">

        <h2>Enter Attendance Details</h2>

        <?php if ($error != ""): ?>
            <div class="error">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="form-grid">

                <div class="input-box">
                    <label>Student Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Enter student name"
                        value="<?php echo htmlspecialchars($name); ?>"
                        required
                    >
                </div>

                <div class="input-box">
                    <label>Register Number</label>
                    <input
                        type="text"
                        name="register_no"
                        placeholder="Enter register number"
                        value="<?php echo htmlspecialchars($registerNo); ?>"
                        required
                    >
                </div>

                <div class="input-box">
                    <label>Total Working Days</label>
                    <input
                        type="number"
                        name="total_days"
                        placeholder="Example: 100"
                        min="1"
                        value="<?php echo htmlspecialchars($totalDays); ?>"
                        required
                    >
                </div>

                <div class="input-box">
                    <label>Days Present</label>
                    <input
                        type="number"
                        name="present_days"
                        placeholder="Example: 85"
                        min="0"
                        value="<?php echo htmlspecialchars($presentDays); ?>"
                        required
                    >
                </div>

            </div>

            <button type="submit" class="btn">
                Calculate Attendance
            </button>

        </form>

        <?php if ($percentage !== null && $error == ""): ?>

            <div class="result">

                <h2>📋 Attendance Result</h2>

                <div class="result-row">
                    <span>Student Name</span>
                    <span><?php echo htmlspecialchars($name); ?></span>
                </div>

                <div class="result-row">
                    <span>Register Number</span>
                    <span><?php echo htmlspecialchars($registerNo); ?></span>
                </div>

                <div class="result-row">
                    <span>Total Working Days</span>
                    <span><?php echo $totalDays; ?></span>
                </div>

                <div class="result-row">
                    <span>Days Present</span>
                    <span><?php echo $presentDays; ?></span>
                </div>

                <div class="result-row">
                    <span>Attendance Percentage</span>
                    <span class="percentage">
                        <?php echo number_format($percentage, 2); ?>%
                    </span>
                </div>

                <div class="result-row">
                    <span>Attendance Status</span>
                    <span><?php echo $status; ?></span>
                </div>

                <div class="result-row">
                    <span>Examination Eligibility</span>

                    <span class="<?php
                        echo ($percentage >= 75)
                            ? 'eligible'
                            : 'not-eligible';
                    ?>">
                        <?php echo $eligibility; ?>
                    </span>
                </div>

            </div>

        <?php endif; ?>

    </div>

    <div class="footer">
        Attendance Processing System | PHP User-Defined Functions
    </div>

</div>

</body>
</html>