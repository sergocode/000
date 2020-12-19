<?php
$PDO = new PDO('mysql:host=localhost;dbname=guestbook', "root", "root");
$GetAllComments = $PDO->query("SELECT * FROM `comments`")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Guestbook</title>
</head>
<body>
    <div class="comments">
        <?
        foreach ($GetAllComments as $comment) {?>
            <div class="comments__item">
                <div class="comments__item_header">
                    <div class="comments__date"><? $date = new DateTime($comment['date']); echo $date->format("m.d.Y H:i:s");?></div>
                    <div class="comments__name"><?echo $comment['name'];?></div>
                </div>
                <div class="comments__text">
                    <?echo $comment['comment_text'];?>
                </div>
            </div>
            <?
        }
        ?>
    </div>
    <div class="form">
        <div class="form__inputs">
            <input type="text" placeholder="Имя">
            <textarea class="form__message" maxlength="350" placeholder="Ваше сообщение" type="text" value=""></textarea>
        </div>
        <button>Отправить</button>
    </div>
    <script src="script.js"></script>
</body>
</html>
