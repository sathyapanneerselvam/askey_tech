<?php
$servername = "localhost";
$username = "root";
$password = "Sathya@2002";
$dbname = "employee_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$empno = trim($_POST['empno']);
$empname = trim($_POST['empname']);
$age = trim($_POST['age']);
$salary = trim($_POST['salary']);


if (!is_numeric($empno) || !preg_match("/^[a-zA-Z\s]+$/", $empname) || $age < 18 || $age > 65 || $salary <= 0) {
  die("Invalid input. Please check your data.");
}


$stmt = $conn->prepare("INSERT INTO employees (empno, empname, age, salary) VALUES (?, ?, ?, ?)");


$stmt->bind_param("isid", $empno, $empname, $age, $salary);


if ($stmt->execute()) {
  echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Success</title>
      <link rel='stylesheet' href='style.css'>
      <style>
        body {
          margin: 0;
          height: 100vh;
          background: url('img/img1.jpg') no-repeat center center;
          background-size: cover;
          display: flex;
          justify-content: center;
          align-items: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-box {
          background: #FFFFFF;
          padding: 30px 40px;
          border-radius: 15px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.1);
          text-align: center;
          border: 1px solid #E0E0E0;
          max-width: 400px;
          width: 100%;
        }

        .success-box h1 {
          color: #67595e;
          margin-bottom: 10px;
          font-size: 24px;
        }

        .success-box p {
          color: #333333;
          font-size: 16px;
          margin-bottom: 20px;
        }

        .success-box a {
          text-decoration: none;
          background-color: #a49393;
          color: white;
          padding: 10px 20px;
          border-radius: 8px;
          transition: background 0.3s;
        }

        .success-box a:hover {
          background-color: #67595e;
        }
      </style>
    </head>
    <body>
      <div class='brand-name'>ASKEY TECH</div>
      <div class='success-box'>
        <h1>✅ Success!</h1>
        <p>New employee record created successfully.</p>
        <a href='index.html'>← Back to Form</a>
      </div>
    </body>
    </html>";
} else {
  echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
