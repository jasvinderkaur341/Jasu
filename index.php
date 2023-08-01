<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excel Functions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }

    h2 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"] {
      display: block;
      margin-top: 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
    }

    .result {
      margin-top: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Excel Functions</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label>Enter your numeric values with spaces:</label>
      <input type="text" name="numbers" required value="<?php echo isset($_POST['numbers']) ? $_POST['numbers'] : ''; ?>">

      <label>Select an Excel function:</label>
      <input type="radio" name="operation" value="1" <?php echo (!isset($_POST['operation']) || $_POST['operation'] == '1') ? 'checked' : ''; ?>>AutoSum
      <input type="radio" name="operation" value="2" <?php echo (isset($_POST['operation']) && $_POST['operation'] == '2') ? 'checked' : ''; ?>>Average
      <input type="radio" name="operation" value="3" <?php echo (isset($_POST['operation']) && $_POST['operation'] == '3') ? 'checked' : ''; ?>>Max
      <input type="radio" name="operation" value="4" <?php echo (isset($_POST['operation']) && $_POST['operation'] == '4') ? 'checked' : ''; ?>>Min

      <input type="submit" value="Calculate">
    </form>

    <div class="result">
      <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $input = $_POST['numbers'];
          $input = trim($input);
          $numbers = explode(' ', $input);
          $numbers = array_filter($numbers, 'is_numeric');

          $operation = $_POST['operation'];
          $result = '';

          switch ($operation) {
            case '1':
              $result = array_sum($numbers);
              break;
            case '2':
              $result = count($numbers) > 0 ? array_sum($numbers) / count($numbers) : 0;
              break;
            case '3':
              $result = max($numbers);
              break;
            case '4':
              $result = min($numbers);
              break;
            default:
              $result = '';
              break;
          }
          echo "Result: $result";
        }
      ?>
    </div>
  </div>
</body>
</html>
