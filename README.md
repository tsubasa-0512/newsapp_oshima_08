# newsapp_oshima_08

#各メディアの新着記事をPickしてタグで管理できるアプリ
- 新規事業アイデアを本格的に検討する機会になり、そのインプットを効率的に集めるために作成
- 複数のメディアの記事をブックマークやスプレッドシートで管理すると煩雑になるので、各メディアから新着記事をスクレイピングしてアプリ内に表示し、お気に入りの記事を保存、好きなタグをつけて管理できるようにした
- タグをキーに記事を表示することができたり、タグ毎にPickした記事数を表示させることで、自身の興味がどこにありそうかを定量的に把握できるようにした。
 
# 機能
- 各メディアからのスクレイピング・表示：「Simple HTML DOM Parser」を使用（https://www.searchlight8.com/php-simple-html-dom-parser/）
- 表示記事のタグ付け保存
- タグ毎の記事ソート（左下のタグを押すとそのタグ毎に紐づいた記事が表示される）
- タグ編集・記事削除
- 複数の記事をながら読みしたいので、新たなウィンドウで記事が見られるようにした
- 新たに他のメディアも追加したいとなったら、「index_techcrunch.php」をベースに、スクレイピングするURLとclassの位置変更、「news_title.php」に新たにリスト追加すれば、スクレイピング・記事閲覧が可能

#今後やりたいこと：Laravelなら、ユーザ認証やページネーション等、便利なライブラリがありそうなので以下はLaravel学習後に実装か
- ページネーションの設定
- ログイン機能によるユーザ毎の記事管理
