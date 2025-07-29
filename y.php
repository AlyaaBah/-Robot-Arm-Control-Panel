<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "motors";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("
        <div style='
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Segoe UI, sans-serif;
            background-color: #fff0f0;
            text-align: center;
        '>
            <div style='
                padding: 40px;
                background-color: #ffffff;
                border: 2px solid #e74c3c;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            '>
                <h1 style='color: #e74c3c; font-size: 32px;'>❌ Connection Failed</h1>
                <p style='font-size: 20px; color: #333;'>Error: " . $conn->connect_error . "</p>
                <a href='index.php' style='
                    display: inline-block;
                    margin-top: 25px;
                    padding: 10px 20px;
                    font-size: 18px;
                    text-decoration: none;
                    background-color: #3498db;
                    color: white;
                    border-radius: 5px;
                '>Back to Control Panel</a>
            </div>
        </div>
    ");
}

if (isset($_POST['motor1']) && isset($_POST['motor2'])) {
    $motor1 = intval($_POST['motor1']);
    $motor2 = intval($_POST['motor2']);

    $stmt = $conn->prepare("INSERT INTO motors (motor1, motor2) VALUES (?, ?)");
    $stmt->bind_param("ii", $motor1, $motor2);

    if ($stmt->execute()) {
        echo "
            <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Segoe UI, sans-serif;
                background-color: #f0f8ff;
                text-align: center;
            '>
                <div style='
                    padding: 40px;
                    background-color: #ffffff;
                    border: 2px solid #2ecc71;
                    border-radius: 10px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.1);
                '>
                    <h1 style='color: #2ecc71; font-size: 32px;'>✅ Pose Saved Successfully!</h1>
                    <p style='font-size: 20px; color: #333;'>Motor 1: $motor1<br>Motor 2: $motor2</p>
                    <a href='index.php' style='
                        display: inline-block;
                        margin-top: 25px;
                        padding: 10px 20px;
                        font-size: 18px;
                        text-decoration: none;
                        background-color: #3498db;
                        color: white;
                        border-radius: 5px;
                    '>Back to Control Panel</a>
                </div>
            </div>
        ";
    } else {
        echo "
            <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Segoe UI, sans-serif;
                background-color: #fffbea;
                text-align: center;
            '>
                <div style='
                    padding: 40px;
                    background-color: #ffffff;
                    border: 2px solid #f39c12;
                    border-radius: 10px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.1);
                '>
                    <h1 style='color: #f39c12; font-size: 32px;'>⚠️ Save Failed</h1>
                    <p style='font-size: 20px; color: #333;'>Error: " . $stmt->error . "</p>
                    <a href='index.php' style='
                        display: inline-block;
                        margin-top: 25px;
                        padding: 10px 20px;
                        font-size: 18px;
                        text-decoration: none;
                        background-color: #3498db;
                        color: white;
                        border-radius: 5px;
                    '>Back to Control Panel</a>
                </div>
            </div>
        ";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "
        <div style='
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Segoe UI, sans-serif;
            background-color: #fff3e6;
            text-align: center;
        '>
            <div style='
                padding: 40px;
                background-color: #ffffff;
                border: 2px solid #e67e22;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            '>
                <h1 style='color: #e67e22; font-size: 32px;'>⚠️ Missing Input</h1>
                <p style='font-size: 20px; color: #333;'>Please submit both Motor 1 and Motor 2 values.</p>
                <a href='index.php' style='
                    display: inline-block;
                    margin-top: 25px;
                    padding: 10px 20px;
                    font-size: 18px;
                    text-decoration: none;
                    background-color: #3498db;
                    color: white;
                    border-radius: 5px;
                '>Back to Control Panel</a>
            </div>
        </div>
    ";
}
?>
