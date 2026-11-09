<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ご挨拶 | ARICO ROOM</title>
  
  <!-- Noto Serif JP の読み込み -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- 共通ヘッダー -->
  <?php include 'includes/header.php'; ?>

  <!-- 共通ナビゲーション -->
  <?php include 'includes/nav-overlay.php'; ?>

  <main>
    <!-- ページヘッダー ＆ パンくずリスト -->
    <div class="page-header">
      <div class="page-header__inner">
        <nav class="breadcrumb">
          <ul>
            <li><a href="index.php">ホーム</a></li>
            <li>お挨拶</li>
          </ul>
        </nav>
        <p class="section-subtitle">MESSAGE</p>
        <h1 class="page-header__title">ご挨拶</h1>
      </div>
    </div>

    <!-- ★ここに今後、「ご挨拶」ページのメインコンテンツを追加します★ -->

        <!-- MESSAGE メインコンテンツ -->
    <section class="message-content">
      <div class="message-content__inner">
        
        <!-- 左側：画像 ＆ キャッチコピーエリア -->
        <div class="message-content__left">
          <div class="message-content__image-area">
            <img src="images/message-detail.png" alt="キャンドルの写真" class="message-content__img">
          </div>
          <div class="message-content__heading-area">
            <p class="section-subtitle">OUR STORY, SINCE 2013</p>
            <h2 class="message-content__title">楽しくて、<br>楽しくてたまりません。</h2>
            <p class="message-content__note">写真はイメージです。</p>
          </div>
        </div>

        <!-- 右側：本文 ＆ プロフィールエリア -->
        <div class="message-content__right">
          <div class="message-content__body">
            <p>私がキャンドル作りに出会ったのは、2012年。たまたま「何かを作りに行きたい」の「何か」がキャンドルでした。教室に通っている時に、楽しくて楽しくてたまらなくて。</p>
            <p>この楽しい気持ちをもっとたくさんの人にも味わってほしいと思って、2013年、自分の教室を作りました。(Candle Studio IROKA)</p>
            <p>最初は一人暮らしの一室で、OLをしながらのダブルワークから始めました。そこから、教室だけを近くのマンションに移したり、共同経営で路面店を開いてみたり。いろんなことに挑戦中です。</p>
            <p>それでも、「キャンドルの魅力をたくさんの人に知ってもらいたい」と言う気持ちは変わりません。</p>
            <p>そして、今でも、キャンドルを作ってる時、楽しくて楽しくてたまりません。</p>
            <p>現在は1人で営業しておりますので、レッスンやショップのオープン日も多くはありませんが、毎日どこかしらのSNSでキャンドルの魅力を発信中です。</p>
            <p>キャンドルの灯りがみなさんの心を少しでも癒せますように。。</p>
          </div>

          <!-- プロフィール ＆ 戻るボタン -->
          <div class="message-content__profile">
            <p class="message-content__brand">ARICO ROOM</p>
            <p class="message-content__author">アリタ キョウコ</p>
          </div>

          <a href="about.php" class="btn-more">
            ARICO ROOMについてに戻る <span class="arrow">→</span>
          </a>
        </div>

      </div>
    </section>


    <!-- 共通CTA（ご予約とお問い合わせ） -->
    <?php include 'includes/cta.php'; ?>

  </main>

  <!-- 共通フッター -->
  <?php include 'includes/footer.php'; ?>

  <script src="script.js"></script>
</body>
</html>
