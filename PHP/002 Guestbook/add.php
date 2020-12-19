<?
$PDO = new PDO('mysql:host=localhost;dbname=guestbook', "root", "root");
$data = [
    "name" => $_POST['name'],
    "comment" => $_POST['comment']
];

if ($data["name"] === "") {
    $data["name"] = "Анонимно";
}
if ($data["comment"] != "") {
    $sql = "INSERT INTO `comments` (`id`, `name`, `comment_text`) VALUES (NULL, :name, :comment)";
    $statement = $PDO->prepare($sql);
    $result = $statement->execute($data);
}
?>