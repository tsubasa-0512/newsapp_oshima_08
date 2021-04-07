<?php 
  session_start();
  
  require_once 'funcs.php';

  // POSTデータ取得
  $title = $_POST['title'];
  $content = $_POST['content'];
  $tag = $_POST['tag'];

  $title = h($title);
  $content = h($content);
  $tag = h($tag);

  if (
    empty($_POST['token'])
    || empty($_SESSION['token'])
    || $_POST['token'] !== $_SESSION['token']
  ) {
      throw new Exception('トークンミスマッチ');
  }

  $pdo = db_conn();

  $stmt = $pdo->prepare("INSERT INTO news(title,content,tag)VALUES(:title,:content,:tag)");

  $stmt->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt->bindValue(':content', $content, PDO::PARAM_STR);
  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);

  $status = $stmt->execute();

  if ($status == false) {
    sql_error($stmt);
  } else {
    redirect($_SERVER['HTTP_REFERER']);

  }

?>