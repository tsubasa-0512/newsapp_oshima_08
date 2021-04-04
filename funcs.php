<?php
    // DB接続
    function db_conn() {
        try {
            $db_name = "news";
            $db_id   = "root";
            $db_pw   = "";
            $db_host = "localhost";
            $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
            return $pdo;
        } catch (PDOException $e) {
            exit('DB Connection Error:' . $e->getMessage());
        }  
    }

    //SQLエラー関数：sql_error($stmt)
    function sql_error($stmt) {
        $error = $stmt->errorInfo();
        exit("SQLError:" . print_r($error, true));
    }
    
//リダイレクト関数: redirect($file_name)
    function redirect($file_name) {
        header("Location: ".$file_name);
        exit();
    }
?>