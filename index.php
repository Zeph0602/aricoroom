<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aricoroom</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php include 'includes/header.php'; ?>
<?php include 'includes/nav-overlay.php'; ?>

<body>
    <!-- コンセプトセクション -->
<section class="concept">
  <div class="concept__inner">
    
    <!-- 左側：テキストエリア -->
    <div class="concept__text-area">
      <p class="section-subtitle">CANDLE LESSON & CRAFT</p>
      <h2 class="concept__title">つくって、飾って、<br>灯すよろこび。</h2>
      <p class="concept__desc">
        東京・浅草橋にあるキャンドル教室です。少人数制で、体験レッスンから基礎をしっかり学ぶコースまでご用意しております。
      </p>
      <a href="lesson-catalog.php" class="btn-primary">
        あなたに合うレッスンを見つける <span class="arrow">→</span>
      </a>
      <p class="concept__location">ASAKUSABASHI, TOKYO</p>
    </div>

    <!-- 右側：画像エリア -->
    <div class="concept__image-area">
      <!-- Figmaから書き出した画像へのパス（例: images/concept.jpg）を指定してください -->
      <img src="images/top.png" alt="ボタニカルキャンドルのイメージ" class="concept__img">
      <!-- 画像右下のラベル -->
    </div>

  </div>
</section>

<!-- WELCOME / ABOUT セクション -->
<section class="welcome">
  <div class="welcome__inner">
    
    <!-- 左側：キャッチコピーエリア -->
    <div class="welcome__left">
      <p class="section-subtitle">WELCOME TO ARICO ROOM</p>
      <h2 class="welcome__title">aricoroomと<br>キャンドルの世界にようこそ。</h2>
    </div>

    <!-- 右側：文章＆ボタンエリア -->
    <div class="welcome__right">
      <p class="welcome__desc">
        東京・浅草橋にあるキャンドル教室です。2020年10月に、柳橋1丁目に移転いたしました。
      </p>
      <p class="welcome__desc">
        少人数制で、ちょっと作ってみたい方向けの体験レッスンや、基礎からしっかり学ぶコースをご用意しております。お店でもキャンドルを販売しております。ご来店をお待ちしています。
      </p>
      <a href="about.php" class="btn-outline">
        ARICO ROOMについて <span class="arrow">→</span>
      </a>
    </div>

  </div>
</section>

<!-- THREE WAYS TO ENJOY セクション -->
<section class="ways">
  <div class="ways__inner">
    
    <!-- セクションヘッダー -->
    <div class="ways__header">
      <p class="section-subtitle">THREE WAYS TO ENJOY</p>
      <h2 class="ways__title">キャンドルのある時間を、もっと。</h2>
    </div>

    <!-- 3列カードグリッド -->
    <div class="ways__grid">
      
      <!-- カード 1: making -->
      <article class="ways-card">
        <div class="ways-card__image-area">
          <img src="images/make.png" alt="キャンドル制作のイメージ" class="ways-card__img">
        </div>
        <div class="ways-card__content">
          <div class="ways-card__header">
            <h3 class="ways-card__title">making</h3>
            <span class="ways-card__ja">つくる</span>
          </div>
          <p class="ways-card__desc">
            自分で作るからこそ、好きな色や形で作れるキャンドル。灯した時にどんな風になるのか想像しながら作りたくなる人が続出です。
          </p>
          <a href="lesson-catalog.php" class="btn-card">
            気になる方はこちら <span class="arrow">→</span>
          </a>
        </div>
      </article>

      <!-- カード 2: decorating -->
      <article class="ways-card">
        <div class="ways-card__image-area">
          <img src="images/decorating.png" alt="キャンドルのディスプレイのイメージ" class="ways-card__img">
        </div>
        <div class="ways-card__content">
          <div class="ways-card__header">
            <h3 class="ways-card__title">decorating</h3>
            <span class="ways-card__ja">飾る</span>
          </div>
          <p class="ways-card__desc">
            作ったキャンドル、飾って眺めるだけでも癒されるはず！おうちの素敵なインテリアに！
          </p>
          <a href="about.php" class="btn-card">
            気になる方はこちら <span class="arrow">→</span>
          </a>
        </div>
      </article>

      <!-- カード 3: lighting -->
      <article class="ways-card">
        <div class="ways-card__image-area">
          <img src="images/lighting.png" alt="点灯したキャンドルのイメージ" class="ways-card__img">
        </div>
        <div class="ways-card__content">
          <div class="ways-card__header">
            <h3 class="ways-card__title">lighting</h3>
            <span class="ways-card__ja">灯す</span>
          </div>
          <p class="ways-card__desc">
            灯してみるとびっくりするほど、印象が変わります。上手な灯し方、キャンドルをマスターして、1日の終わりのたっぷりに癒されてください。
          </p>
          <a href="shop.php" class="btn-card">
            気になる方はこちら <span class="arrow">→</span>
          </a>
        </div>
      </article>

    </div>

    <!-- 注記 -->
    <p class="ways__note">掲載写真はすべてイメージです。</p>

  </div>
</section>

<!-- NEWS / 最新のお知らせ セクション -->
<section class="news">
  <div class="news__inner">
    
    <!-- 左側：見出しエリア -->
    <div class="news__left">
      <p class="section-subtitle">NEWS</p>
      <h2 class="news__title">最新のお知らせ</h2>
    </div>

    <!-- 右側：案内文章＆Instagramボタンエリア -->
    <div class="news__right">
      <p class="news__desc">
        営業日・オープン時間や、季節限定レッスンの最新情報はInstagramからご確認ください。
      </p>
      
      <!-- Instagramボタン（外部リンク） -->
      <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" class="btn-instagram">
        <span>Instagramを見る</span>
        <span class="arrow">→</span>
      </a>

      <p class="news__subtext">2020年10月に、柳橋1丁目に移転いたしました。</p>
    </div>

  </div>
</section>

<!-- ACCESS セクション -->
<section class="access">
  <div class="access__inner">
    
    <!-- 左側：見出し＆ボタンエリア -->
    <div class="access__left">
      <p class="section-subtitle">ACCESS</p>
      <h2 class="access__title">浅草橋で、お待ちしています。</h2>
      <p class="access__desc">※営業日・オープン時間はInstagramからご確認ください。</p>
      
      <a href="#schedule" class="btn-outline-white">
        営業日・営業時間を確認する <span class="arrow">→</span>
      </a>
    </div>

    <!-- 右側：店舗情報（住所・電話番号）カード -->
    <div class="access__right">
      <div class="access__card">
        <dl class="access__row">
          <dt class="access__label">住所</dt>
          <dd class="access__value">
            〒111-0052<br>
            東京都台東区柳橋1丁目30-2-202
          </dd>
        </dl>
        <dl class="access__row">
          <dt class="access__label">電話番号</dt>
          <dd class="access__value">080-5649-1745</dd>
        </dl>
      </div>
    </div>

  </div>
</section>

<?php include 'includes/cta.php'; ?>

<?php include 'includes/footer.php'; ?>

<script src="script.js"></script>
</body>
</html>