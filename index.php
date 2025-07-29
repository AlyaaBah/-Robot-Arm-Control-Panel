<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Robot Arm Control Panel</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f5;
      margin: 0;
      padding: 40px;
      text-align: center;
      color: #333;
    }

    h2 {
      font-size: 36px;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .slider-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 30px;
      margin-bottom: 30px;
    }

    .slider-label {
      font-size: 20px;
      margin-bottom: 10px;
    }

    input[type="range"] {
      width: 300px;
    }

    .buttons button {
      font-size: 18px;
      padding: 10px 20px;
      margin: 10px;
      background-color: #3498db;
      border: none;
      border-radius: 5px;
      color: white;
      transition: background-color 0.3s ease;
    }

    .buttons button:hover {
      background-color: #2980b9;
    }

    table {
      width: 80%;
      margin: 40px auto 0;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 15px;
      font-size: 18px;
      border: 1px solid #ccc;
    }

    th {
      background-color: #ecf0f1;
    }

    .action-buttons button {
      padding: 6px 12px;
      font-size: 16px;
      background-color: #e67e22;
      border: none;
      border-radius: 3px;
      color: white;
      margin: 0 4px;
    }

    .action-buttons button:hover {
      background-color: #d35400;
    }
  </style>
</head>
<body>

  <h2>Robot Arm Control Panel</h2>

  <form method="POST" action="y.php">
    <div class="slider-container">
      <div class="slider-label">Motor 1 Position: <span id="val1">90</span></div>
      <input id="motor1Slider" type="range" min="0" max="180" value="90" oninput="updateValue(1, this.value)" name="motor1">
      
      <div class="slider-label">Motor 2 Position: <span id="val2">90</span></div>
      <input id="motor2Slider" type="range" min="0" max="180" value="90" oninput="updateValue(2, this.value)" name="motor2">
    </div>

    <div class="buttons">
      <button type="button" onclick="resetSliders()">Reset</button>
      <button type="submit">Save Pose</button>
      <button type="button" onclick="runPose()">Run Pose</button>
    </div>
  </form>

  <table id="poseTable">
    <thead>
      <tr>
        <th>ID</th><th>Motor 1</th><th>Motor 2</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td><td>90</td><td>115</td>
        <td class="action-buttons">
          <button onclick="loadPose(90, 115)">Load</button>
          <button onclick="removePose(1)">Remove</button>
        </td>
      </tr>
      <tr>
        <td>2</td><td>45</td><td>60</td>
        <td class="action-buttons">
          <button onclick="loadPose(45, 60)">Load</button>
          <button onclick="removePose(2)">Remove</button>
        </td>
      </tr>
    </tbody>
  </table>

  <script>
    function updateValue(motor, value) {
      document.getElementById('val' + motor).textContent = value;
    }

    function resetSliders() {
      document.getElementById('motor1Slider').value = 90;
      document.getElementById('motor2Slider').value = 90;
      updateValue(1, 90);
      updateValue(2, 90);
    }

    function runPose() {
      alert("Pose is now running!");
    }

    function loadPose(m1, m2) {
      document.getElementById('motor1Slider').value = m1;
      document.getElementById('motor2Slider').value = m2;
      updateValue(1, m1);
      updateValue(2, m2);
    }

    function removePose(id) {
      alert("Removing pose with ID: " + id + " (simulated)");
    }
  </script>

</body>
</html>
