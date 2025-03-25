<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

function calculateGrade($mq1, $mq2, $mq3, $mq4, $mcs, $mexam) {
    $quizzesAverage = ($mq1 + $mq2 + $mq3 + $mq4) / 4;
    $quizzesGrade = $quizzesAverage * 0.40;
    $mcsGrade = $mcs * 0.10;
    $mexamGrade = $mexam * 0.50;
    return $quizzesGrade + $mcsGrade + $mexamGrade;
}

function calculateTotalGrade($midtermGrade, $finalGrade) {
    return ($midtermGrade * 0.40) + ($finalGrade * 0.60);
}

function calculateEquivalent($totalGrade) {
    if ($totalGrade >= 98 && $totalGrade <= 100) {
        return 1.00;
    } elseif ($totalGrade >= 95 && $totalGrade <= 97) {
        return 1.25;
    } elseif ($totalGrade >= 92 && $totalGrade <= 94) {
        return 1.50;
    } elseif ($totalGrade >= 89 && $totalGrade <= 91) {
        return 1.75;
    } elseif ($totalGrade >= 86 && $totalGrade <= 88) {
        return 2.00;
    } elseif ($totalGrade >= 83 && $totalGrade <= 85) {
        return 2.25;
    } elseif ($totalGrade >= 80 && $totalGrade <= 82) {
        return 2.50;
    } elseif ($totalGrade >= 77 && $totalGrade <= 79) {
        return 2.75;
    } elseif ($totalGrade >= 75 && $totalGrade <= 76) {
        return 3.00;
    } else {
        return 5.00;
    }
}

function calculateRemark($totalGrade) {
    if ($totalGrade >= 98 && $totalGrade <= 100) {
        return "OUTSTANDING";
    } elseif ($totalGrade >= 92 && $totalGrade <= 97) {
        return "EXCELLENCE";
    } elseif ($totalGrade >= 86 && $totalGrade <= 91) {
        return "VERY SATISFACTORY";
    } elseif ($totalGrade >= 75) {
        return "PASSED";
    } else {
        return "FAILED";
    }
}

// Get input from the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mq1 = (int)$_POST['mq1'];
    $mq2 = (int)$_POST['mq2'];
    $mq3 = (int)$_POST['mq3'];
    $mq4 = (int)$_POST['mq4'];
    $mcs = (int)$_POST['mcs'];
    $mexam = (int)$_POST['mexam'];

    $fq1 = (int)$_POST['fq1'];
    $fq2 = (int)$_POST['fq2'];
    $fq3 = (int)$_POST['fq3'];
    $fq4 = (int)$_POST['fq4'];
    $fcs = (int)$_POST['fcs'];
    $fexam = (int)$_POST['fexam'];

    // Calculate Grades
    $midtermGrade = calculateGrade($mq1, $mq2, $mq3, $mq4, $mcs, $mexam);
    $finalGrade = calculateGrade($fq1, $fq2, $fq3, $fq4, $fcs, $fexam);
    $totalGrade = calculateTotalGrade($midtermGrade, $finalGrade);
    $equivalent = calculateEquivalent($totalGrade);
    $remark = calculateRemark($totalGrade);
} else {
    // If the form wasn't submitted, set default values or display a message
    $midtermGrade = 0;
    $finalGrade = 0;
    $totalGrade = 0;
    $equivalent = 0;
    $remark = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Computed Grades</title>
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

        .result-container {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        .result-container h2, .result-container h3 {
            text-align: center;
            color: #bbb;
        }

        .result-container p {
            margin-bottom: 10px;
        }

        .result-container a {
            color: #007bff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .result-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Computed Grades</h2>

        <h3>Midterm Period</h3>
        <p>MGRADE: <?php echo number_format($midtermGrade, 2); ?></p>

        <h3>Final Period</h3>
        <p>FGRADE: <?php echo number_format($finalGrade, 2); ?></p>

        <h3>Total Grade</h3>
        <p>TOTAL GRADE: <?php echo number_format($totalGrade, 2); ?></p>
        <p>EQUIVALENT: <?php echo number_format($equivalent, 2); ?></p>
        <p>REMARK: <?php echo $remark; ?></p>

        <a href="grade.php">Back to Grade Input</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>