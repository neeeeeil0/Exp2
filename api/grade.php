<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grade Portal</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #1a1a1a;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .form-container {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        .form-container h2, .form-container h3 {
            text-align: center;
            color: #bbb;
        }

        .form-container input[type="number"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #444;
            color: #ddd;
        }

        .form-container input[type="submit"] {
            background-color: #5a5a5a;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-container input[type="submit"]:hover {
            background-color: #777;
        }

        .form-container a {
            color: #007bff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Enter Your Grades</h2>
        <form method="post" action="computation.php">
            <h3>Midterm Period</h3>
            <label for="mq1">MQ1:</label>
            <input type="number" name="mq1" id="mq1" required><br>

            <label for="mq2">MQ2:</label>
            <input type="number" name="mq2" id="mq2" required><br>

            <label for="mq3">MQ3:</label>
            <input type="number" name="mq3" id="mq3" required><br>

            <label for="mq4">MQ4:</label>
            <input type="number" name="mq4" id="mq4" required><br>

            <label for="mcs">MCS:</label>
            <input type="number" name="mcs" id="mcs" required><br>

            <label for="mexam">MEXAM:</label>
            <input type="number" name="mexam" id="mexam" required><br>

            <h3>Final Period</h3>
            <label for="fq1">FQ1:</label>
            <input type="number" name="fq1" id="fq1" required><br>

            <label for="fq2">FQ2:</label>
            <input type="number" name="fq2" id="fq2" required><br>

            <label for="fq3">FQ3:</label>
            <input type="number" name="fq3" id="fq3" required><br>

            <label for="fq4">FQ4:</label>
            <input type="number" name="fq4" id="fq4" required><br>

            <label for="fcs">FCS:</label>
            <input type="number" name="fcs" id="fcs" required><br>

            <label for="fexam">FEXAM:</label>
            <input type="number" name="fexam" id="fexam" required><br>

            <input type="submit" value="Calculate Grades">
        </form>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>