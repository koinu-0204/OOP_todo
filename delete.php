<?php

// データを取得する
require_once('Models/task.php');

// 取得したデータから消す

$id = $_POST['id'];

$task = new Task();
$task->delete([$id]);

// リダイレクト
header('location: index.php');
exit;