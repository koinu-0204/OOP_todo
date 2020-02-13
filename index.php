<?php
// 一覧表示機能
//   ①データの取得（タスク）
//     DBから読み込み（接続）
    //    DBの接続
    //    SQLの実行（データベースを操作する言語）
    //      READ(select)
    //    結果を変数に代入する


//   ②１のデータを画面に表示する

// ファイルの読み込み
require_once('Models/Task.php');
// getAllを使いたい
// タスククラスのメソッド
// メソッドを使う場合はクラスをインスタンス化しないといけない
 
// タスククラスをインスタンス化して。$Taskにインスタンスを代入
// タスクの中のゲットオールを使いたかった
// echo'<pre>';
$todo = new Task();
// var_dump($todo);die;

$tasks = $todo->getAll();
// var_dump($tasks);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">Todo</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <span class="nav-link text-light">
                                ログインユーザーのメールアドレス
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="create.php">Create</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link text-light" href="signinform.php">サインイン</a>
                                <a class="nav-link text-light" href="signout.php">サインアウト</a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>

        <div class="row p-3">
        <?php foreach ($tasks as $task):?>
            <div class="col-sm-6 col-md-4 col-lg-3 py-3 py-3">
                <div class="card">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $task['title'];?>/h5>
                        <p class="card-text">
                            <?=$task['contents'];?>
                        </p>
                        <div class="text-right d-flex justify-content-end">
                            <a href="edit.php" class="btn text-success">EDIT</a>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn text-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>