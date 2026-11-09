<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARICO ROOMについて | ARICO ROOM</title>
  
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
    <!-- ページタイトル＆パンくずリスト -->
    <div class="page-header">
      <div class="page-header__inner">
        <nav class="breadcrumb">
          <ul>
            <li><a href="index.php">ホーム</a></li>
            <li>ARICO ROOMについて</li>
          </ul>
        </nav>
        <p class="section-subtitle">ABOUT ARICO ROOM</p>
        <h1 class="page-header__title">ARICO ROOMについて</h1>
      </div>
    </div>

    <!-- ★ここに今後、セクションを順番に追加していきます★ -->

        <!-- A WORLD OF CANDLES セクション -->
    <section class="about-story">
      <div class="about-story__inner">
        
        <!-- 左側：テキストエリア -->
        <div class="about-story__text-area">
          <p class="section-subtitle">A WORLD OF CANDLES</p>
          <h2 class="about-story__title">灯してみたら、<br>世界が変わった。</h2>
          <p class="about-story__desc">
            キャンドルを作る事に夢中になって<br>
            色を重ねる事で気分があがって<br>
            飾って眺めてるだけで心が踊って<br>
            灯してみたら世界が変わった<br>
            そんな素敵なキャンドルの世界にようこそ！
          </p>
        </div>

        <!-- 右側：画像エリア -->
        <div class="about-story__image-area">
          <img src="images/sakuhin.png" alt="キャンドルのイメージ" class="about-story__img">
          <span class="about-story__img-caption">イメージ写真</span>
        </div>

      </div>
    </section>

        <!-- MESSAGE（ご挨拶）セクション -->
    <section class="about-message">
      <div class="about-message__inner">
        
        <!-- 左側：画像エリア -->
        <div class="about-message__image-area">
          <img src="images/message.png" alt="制作風景のイメージ" class="about-message__img">
        </div>

        <!-- 右側：テキストエリア -->
        <div class="about-message__text-area">
          <p class="section-subtitle">MESSAGE</p>
          <h2 class="about-message__title">ご挨拶</h2>
          <p class="about-message__desc">
            私がキャンドル作りに出会ったのは、2012年。たまたま「何かを作りに行きたい」の「何か」が、キャンドルでした。教室に通い、楽しくて楽しくてたまらなくて。この楽しい気持ちをもっとたくさんの人にも味わってほしいと思って、2013年、自分の教室を作りました。(Candle Studio ROKA)
          </p>
          <a href="message.php" class="btn-more">
            詳しく読む <span class="arrow">→</span>
          </a>
        </div>

      </div>
    </section>

        <!-- CANDLE GALLERY セクション -->
    <section class="about-gallery">
      <div class="about-gallery__inner">
        
        <!-- 見出しエリア -->
        <div class="about-gallery__header">
          <p class="section-subtitle">CANDLE GALLERY</p>
          <h2 class="about-gallery__title">色、かたち、灯りを楽しむ。</h2>
        </div>

        <!-- ギャラリー画像リスト（2列） -->
        <div class="about-gallery__list">
          <div class="about-gallery__item">
            <img src="images/gallery-1.png" alt="ギャラリー画像1" class="about-gallery__img">
          </div>
          <div class="about-gallery__item">
            <img src="images/gallery-2.png" alt="ギャラリー画像2" class="about-gallery__img">
          </div>
        </div>

        <!-- 注記テキスト -->
        <p class="about-gallery__note">掲載写真はすべてイメージです。</p>

      </div>
    </section>

        <!-- BLOG & HISTORY（ARICO ROOMの歩み）セクション -->
    <section class="about-history">
      <div class="about-history__inner">
        
        <!-- 左側：テキストエリア -->
        <div class="about-history__text-area">
          <p class="section-subtitle">BLOG & HISTORY</p>
          <h2 class="about-history__title">ARICO ROOMの歩み</h2>
          <p class="about-history__desc">
            現在は1人で営業しております。毎日どこかしらのSNSでキャンドルの魅力を発信中です。
          </p>
          
          <div class="about-history__btn-group">
            <a href="#" class="btn-more">
              Blogを見る <span class="arrow">→</span>
            </a>
            <a href="#" class="btn-more">
              ARICOROOMの歴史はこちら <span class="arrow">→</span>
            </a>
          </div>
        </div>

        <!-- 右側：画像エリア -->
        <div class="about-history__image-area">
          <img src="images/history.png" alt="キャンドル制作の様子" class="about-history__img">
        </div>

      </div>
    </section>

    <?php include 'includes/cta.php'; ?>


  </main>

  <!-- 共通フッター -->
  <?php include 'includes/footer.php'; ?>

  <script src="script.js"></script>
</body>
</html>
