<?php
define('MAX_VIEW', 5);//最大５件表示
class DBconnect
{
    protected  $dbh;
    public function __construct()
    {
        $dsn = 'mysql:dbname=todo;host=localhost;charset=utf8';;
        $user = 'root';
        $password = '';
        try
        {    
            $this->dbh = new PDO($dsn, $user, $password); 
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        }
        catch(PDOException $e)
        {
            echo "データベース接続エラー";
            exit();
        }
    }
    function dataBaseDisconnect()
    {
        $this->dbh = null;
    }
}
?>