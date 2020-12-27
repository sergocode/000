<? include 'backend.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Delivery</title>
</head>
<body>
   <div class="form">
       <select name="city" id="cities">
           <?
           foreach ($data as $city) {
               echo "{$data} => <option>{$city}</option> ";
           }
           ?>
       </select>
       <input type="number" min="0" step="1" placeholder="Вес, кг">
       <input type="button" value="Рассчитать">
   </div>
   <div class="response"></div>
   <script src="script.js"></script>
</body>
</html>