<?php
session_start();

$token = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['token'] = $token;

require_once 'funcs.php';
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM news");
$status = $stmt->execute();

$stmt2 = $pdo->prepare("SELECT tag, COUNT(tag) FROM news GROUP BY tag");
$status2 = $stmt2->execute();

// タグ一覧表示
$tag = "";
if ($status2 == false) {
  sql_error($status);
} else {
  while ($result = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $tag_ele = $result['tag'];
    $tag_ele_n = $result['COUNT(tag)'];
    $tag .= '<span>
                <a href="index_tag.php?tag='.$tag_ele.'">#'.$tag_ele.'('.$tag_ele_n.')</a>
            </span>';
  }
}

// Pickした記事一覧表示
$view = "";
if ($status == false) {
  sql_error($status);
} else {
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $article =  '<a href="'.$result['content'].'"  target="_blank" rel="noopener noreferrer">'.$result['title'].'</a>';
    $view .= '<li>
              '.$article.'
                <form method="POST" action="update_tag.php?id='.$result['id'].'" style="width:15%;">
                  <input type="hidden" name="token" value="'.$token.'"/>
                  <input type="text" name="tag" value="'.$result['tag'].'"/>
                  <input type="submit" value="変更">
                </form>
                <a href="delete.php?id=' . $result['id'] . '"
                style="
                box-sizing: border-box;
                display: inline-block;
                padding: 0.15em 0.8em;
                font-size: 0.8em;
                color: #ccc;
                text-decoration: none;
                user-select: none;
                border: 1px #5c5470 solid;
                border-radius: 3px;
                cursor: pointer;
                background: #5c5470;
                ">
                削除</a>
              </li>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>ニュースアプリ</title>
</head>
<body>
  <aside>
    <?php require_once 'news_title.php'; ?>
    <div class="aside-footer">
      <p>タグ</p>
      <div class="search-tag">
      <?php echo $tag; ?>
      </div>
    </div>
  </aside>
  <main>
    <ul class="article-list">
      <div class="title">Pickした記事一覧</div>
      <?php echo $view; ?>
    </ul>
  </main>
</body>
</html>