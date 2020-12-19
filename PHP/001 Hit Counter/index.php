<?php
$PDO = new PDO('mysql:host=localhost;dbname=hit_counter', "root", "root");
$update_counts = $PDO->query("UPDATE `counter` SET `counts` = `counts` + 1 WHERE `counter`.`id` = 1;");
$query = $PDO->query("SELECT `counts` FROM `counter` WHERE `counter`.`id` = 1;")->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $counts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Hit Counter</title>
</head>
<body>
    <div class="hits">Страница была загружена <? echo $counts['counts']; ?> раз. Текущее время <? echo date("H:i") ?>.</div>
</body>
</html>