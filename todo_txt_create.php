<?php
// var_dump($_POST);
// exit();

$todo = $_POST["todo"];
$deadline = $_POST["deadline"];
// 「option」 + ¥ \バックスラッシュ
$write_data = "{$deadline} {$todo}\n";
$file = fopen('data/todo.csv','a');
flock($file, LOCK_EX);
fwrite($file, $write_data);
flock($file, LOCK_UN);
fclose($file);
header("Location:todo_txt_input.php");