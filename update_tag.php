<?php
  $id = $_GET['id'];
  $tag = $_POST["tag"];

  require_once 'funcs.php'; 
  $pdo = db_conn();
  $stmt = $pdo->prepare("UPDATE news SET tag = :tag WHERE id = :id");

  $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

  if($tag) {
    $status = $stmt->execute(); //実行
  }else {
    redirect($_SERVER['HTTP_REFERER']);
  }
  if ($status == false) {
    sql_error($stmt);
  } else {
    redirect($_SERVER['HTTP_REFERER']);
  }
?>