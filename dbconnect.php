<?php
function databaseConnect()
{
    $dsn = 'mysql:dbname=todo;host=localhost;charset=utf8';;
    $user = 'root';
    $password = '';
    try
    {    
        $dbh = new PDO($dsn, $user, $password); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
    }
    catch(PDOException $e)
    {
        echo "データベース接続エラー";
        exit();
    }
    return $dbh;
}

?>