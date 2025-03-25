<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'user' && $password === 'pass') {
        $_SESSION['loggedin'] = true;
        header('Location: grade.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1a1a1a; /* Dark background */
            color: #e0e0e0; /* Light text */
        }

        .form-container {
            background-color: #333; /* Darker form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Stronger shadow for depth */
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #bbb;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555; /* Darker border */
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #444; /* Darker input background */
            color: #ddd; /* Light input text */
        }

        .form-container input[type="submit"] {
            background-color: #5a5a5a; /* Darker button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-container input[type="submit"]:hover {
            background-color: #777; /* Slightly lighter hover */
        }

        .error-message {
            color: #ff6666; /* Red error text, but a bit darker */
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>