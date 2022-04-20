<?php
function databaseConnect()
{
    $dsn = 'mysql:dbname=todo;host=localhost;charset=utf8';;
    $user = 'root';
    $password = '';
    try
    {    
        $dbh = new PDO($dsn, $user, $password); //PDOクラスをインスタンス化
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setAtt~メソッドを参照

    }
    catch(Exception $e)
    {
        echo "データベース接続エラー";
        exit;
    }
    return $dbh;
}
?>