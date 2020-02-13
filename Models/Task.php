<?php

require_once('Model.php');

class Task extends Model
{
    // プロパティ
    protected $table = 'tasks';

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    // DBからデータを全て取得するメソッド
    public function getAll()
    {
        // 実行するSQLを準備
        // $this === このクラスのインスタンス
        // db_manager
        // このクラスのインスタンスのプロパティ
        // DbManagerクラスのインスタンス
        // dbh
        // db_managerのプロパティ
        // PDOクラスのインスタンス
        // prepare
        // dbhのメソッド
        // PDOインスタンスのメソッド
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);

        // $dbh === PDOクラスのインスタンス
        // $dbh->prepare('SELECT * FROM ' . $this->table);

        // 準備したSQLを実行する
        $stmt->execute();

        // 実行結果を取得
        $tasks = $stmt->fetchAll();

        // return === 関数の呼び出し元に、値を返す
        return $tasks;
    }

    // 新規作成に使用するメソッド
    public function create($data)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        // INSERT INTO (カラム名, ,) VALUES (値, 値, 値,)
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (title, contents, created) VALUES (?, ?, ?)');
        $stmt->execute($data);
    }
    // 削除するメソッド
    public function delete($date)
    {
        //何を消すかどこを消すか
        $stmt = $this->db_manager->dbh->prepare
        ('DELETE FROM' . $this->table . 'WHERE id =?');
        //実行
    return $stmt->excute($date);
    }

    //edit.phpで使いたい $idと一致するidレコードを取得
    public function get($id)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
    // 実行する
        $stmt->execute([$id]);

    // 実行結果を変数に代入する
        $task = $stmt->fetch();

    // 結果を関数の呼び出し元に返す
        return $task;

    }

    //アップデートしたい
    public function update($date)
    {
        //この部分を更新
        // タイトル、コンテンツ、どのIDか
        $stmt =$this->db_manager->dbh->prepare
        ('UPDATE ' . $this->table . ' SET title = ?,contents = ? WHERE id =?');
        $stmt->excute($date);
    }
}