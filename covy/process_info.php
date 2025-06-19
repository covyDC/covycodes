<?php
$fullname = $_POST['fullname'];
$birthyear = $_POST['birthyear'];
$sleephours = $_POST['sleephours'];
$city = $_POST['city'];

$current_year = date("Y");

// Validation
if (!is_numeric($birthyear) || !is_numeric($sleephours) || empty($fullname) || empty($city)) {
    echo "<div style='color:red;'>All fields must be filled correctly!</div>";
    exit;
}

// Calculations
$age = $current_year - $birthyear;
$total_sleep_years = ((($sleephours * 365 * $age) / 24)/24)/12;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple Info System - Result</title>
    <style>
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #8338ec;
            --accent-color: #ff006e;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--dark-color);
        }

        /* Card that holds the result */
        .result-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 70%;
            max-width: 400px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 10px;
            border: 1px solid #e9ecef;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Result</h2>
        <table>
            <tr><td>Full Name</td><td><?php echo htmlspecialchars($fullname); ?></td></tr>
            <tr><td>Age</td><td><?php echo $age; ?></td></tr>
            <tr><td>Sleeping Hours per Day</td><td><?php echo $sleephours; ?></td></tr>
            <tr><td>Total Years Sleeping</td><td><?php echo number_format($total_sleep_years, 2); ?></td></tr>
            <tr><td>City</td><td><?php echo htmlspecialchars($city); ?></td></tr>
        </table>

        <div class="message">
            <?php
                if ($age > 50) echo "<p>You might want to start planning for retirement.</p>";
                if ($total_sleep_years > 15) echo "<p>You’ve spent a huge part of your life sleeping!</p>";
                if ($city != "Quezon City") echo "<p>You don’t live in the best city.</p>";
                else echo "<p>Quezon City rocks!</p>";
                if ($age <= 25) echo "<p>You're still young, enjoy learning!</p>";
            ?>
        </div>
    </div>
</body>
</html>
