<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Validation System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>Applicant Validation System</h1>
            <p>Enter your details for validation</p>
        </div>

        <form action="validate.php" method="POST">

            <div class="form-group">
                <label>Email ID</label>

                <input
                    type="text"
                    name="email"
                    placeholder="Enter your email ID"
                    required
                >
            </div>

            <div class="form-group">
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <div class="form-group">
                <label>Mobile Number</label>

                <input
                    type="text"
                    name="mobile"
                    placeholder="Enter 10-digit mobile number"
                    required
                >
            </div>

            <button type="submit">Validate Details</button>

            <button type="reset" class="reset-btn">
                Clear
            </button>

        </form>

    </div>

</body>
</html>