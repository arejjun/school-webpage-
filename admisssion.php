navigation bar //new admission 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-row .form-group {
            flex: 1;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
<?php

$conn = new mysqli("localhost", "root", "", "school_admission");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    class VARCHAR(10),
    dob DATE,
    parent_name VARCHAR(100),
    address VARCHAR(255),
    address2 VARCHAR(255),
    district VARCHAR(100),
    state VARCHAR(100),
    country VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100)
)");

if (isset($_POST['insert'])) {
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, class, dob, parent_name, address, address2, district, state, country, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $_POST['first-name'], $_POST['last-name'], $_POST['classes'], $_POST['dob'], $_POST['parent-first'], $_POST['address'], $_POST['address2'], $_POST['district'], $_POST['state'], $_POST['country'], $_POST['phone'], $_POST['email']);
    
    if ($stmt->execute()) {
        echo "<script>alert('Record inserted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
$conn->close();
?>
    <div class="form-container">
        <h1>Student Registration Form</h1>
        <form action="#" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="class" class="required">Class</label>
                    <input type="text" id="class" name="class" required>
                </div>
                <div class="form-group">
                    <label for="dob" class="required">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="parent_name" class="required">Parent/Guardian Name</label>
                <input type="text" id="parent_name" name="parent_name" required>
            </div>
            
            <div class="form-group">
                <label for="address" class="required">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            
            <div class="form-group">
                <label for="address2">Address Line 2</label>
                <input type="text" id="address2" name="address2">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="district" class="required">District</label>
                    <input type="text" id="district" name="district" required>
                </div>
                <div class="form-group">
                    <label for="state" class="required">State</label>
                    <input type="text" id="state" name="state" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="country" class="required">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone" class="required">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-btn">Submit Registration</button>
            </div>
        </form>
    </div>
</body>
</html>
