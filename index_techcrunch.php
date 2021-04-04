<?php 
  require_once 'simple_html_dom.php';
  require_once 'funcs.php';

  $pdo = db_conn();

  $stmt = $pdo->prepare("SELECT tag, COUNT(tag) FROM news GROUP BY tag");
  $status = $stmt->execute();

  // タグ一覧表示
  $tag = "";
  if ($status == false) {
    sql_error($status);
  } else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $tag_ele = $result['tag'];
      $tag_ele_n = $result['COUNT(tag)'];
      $tag .= '<span>
                  <a href="index_tag.php?tag='.$tag_ele.'">#'.$tag_ele.'('.$tag_ele_n.')</a>
              </span>';
    }
  }

  $url = 'https://jp.techcrunch.com/';
  $html = file_get_html($url);

  $page_title = '';
  $title_array = array();
  $url_array = array();
  $article_array = array();
  
  // タイトルスクレイピング
  foreach ($html->find('.river .block-content h2 a')as $ele) {
    $title =  $ele->plaintext;
    $title_array[] = $title;
  }
  
  // URLスクレイピング
  foreach ($html->find('.river .block-content h2 a')as $ele) {
    $url_ele =  $ele->href;
    $url = 'https://jp.techcrunch.com/'.$url_ele;
    $url_array[] = $url;
  }

  // タイトルにURL埋め込み
  for($i = 0; $i < count($title_array); $i++) {
    $article =  '<a href="'.$url_array[$i].'"  target="_blank" rel="noopener noreferrer">'.$title_array[$i].'</a><br>';
    $article_array[] = $article;
  }

  // 記事一覧表示関数
  function makeArticle($article_array, $title_array, $url_array) {
    for($i=0; $i<count($article_array); ++$i){
      echo '<li>
              '.$article_array[$i].'
              <form method="POST" action="insert_news.php">
                <input type="hidden" name="title" value="'.$title_array[$i].'"/>
                <input type="hidden" name="content" value="'.$url_array[$i].'"/>
                <input type="text" name="tag" placeholder="タグ"/>
                <input type="submit" value="Pick">
              </form>
            </li>';
    }
  }
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>TechCrunch Japan 新着記事</title>
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
    <div class="title">新着記事一覧</div>
    <?php
      makeArticle($article_array, $title_array, $url_array);
    ?>
    </ul>
  </main>
</body>
</html>