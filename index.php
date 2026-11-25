<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>ABC College of Technology</h1>
        <p>Admission Application Form - 2026</p>
    </div>

    <form action="acknowledgement.php" method="POST">

        <h2>Applicant Details</h2>

        <div class="form-group">
            <label>Applicant Name <span>*</span></label>
            <input type="text" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="row">
            <div class="form-group">
                <label>Date of Birth <span>*</span></label>
                <input type="date" name="dob" required>
            </div>

            <div class="form-group">
                <label>Gender <span>*</span></label>
                <select name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Email Address <span>*</span></label>
            <input type="email" name="email" placeholder="example@gmail.com" required>
        </div>

        <div class="form-group">
            <label>Mobile Number <span>*</span></label>
            <input type="tel" name="phone" placeholder="Enter 10-digit mobile number"
                   pattern="[0-9]{10}" required>
        </div>

        <div class="form-group">
            <label>Address <span>*</span></label>
            <textarea name="address" rows="4"
                      placeholder="Enter your complete address" required></textarea>
        </div>

        <h2>Academic Details</h2>

        <div class="form-group">
            <label>Qualification <span>*</span></label>
            <select name="qualification" required>
                <option value="">Select Qualification</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Diploma">Diploma</option>
                <option value="UG">Undergraduate</option>
            </select>
        </div>

        <div class="form-group">
            <label>Percentage / CGPA <span>*</span></label>
            <input type="text" name="percentage"
                   placeholder="Enter percentage or CGPA" required>
        </div>

        <h2>Course Selection</h2>

        <div class="form-group">
            <label>Course Applied For <span>*</span></label>
            <select name="course" required>
                <option value="">Select Course</option>
                <option value="B.Sc Computer Science">B.Sc Computer Science</option>
                <option value="BCA">Bachelor of Computer Applications (BCA)</option>
                <option value="B.Com">B.Com</option>
                <option value="BBA">BBA</option>
                <option value="B.Sc Mathematics">B.Sc Mathematics</option>
            </select>
        </div>

        <div class="form-group">
            <label>Preferred Study Mode <span>*</span></label>

            <div class="radio-group">
                <label>
                    <input type="radio" name="mode" value="Regular" required>
                    Regular
                </label>

                <label>
                    <input type="radio" name="mode" value="Online">
                    Online
                </label>
            </div>
        </div>

        <div class="declaration">
            <input type="checkbox" name="declaration" value="Accepted" required>
            I declare that the information provided above is true and correct.
        </div>

        <button type="submit">Submit Application</button>
        <button type="reset" class="reset-btn">Clear Form</button>

    </form>

</div>

</body>
</html>