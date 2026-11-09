<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レッスン一覧 | ARICO ROOM</title>
  
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
    <div class="page-header page-header--lessons">
      <div class="page-header__inner page-header__inner--lessons">
        
        <!-- 左側：タイトル＆説明文 -->
        <div class="page-header__text">
          <nav class="breadcrumb">
            <ul>
              <li><a href="index.php">ホーム</a></li>
              <li>レッスン一覧</li>
            </ul>
          </nav>
          <p class="section-subtitle">LESSON COLLECTION</p>
          <h1 class="page-header__title">つくる時間を、あなたらしく。</h1>
          <p class="page-header__desc">
            はじめてのひとつから、資格を目指す学びまで。<br>
            ARICO ROOMの7つのレッスンから、心惹かれるコースを見つけてください。
          </p>
        </div>

        <!-- 右側：カウントバッジ -->
        <div class="page-header__count">
          <span class="page-header__number">07</span>
          <span class="page-header__label">LESSONS</span>
        </div>

      </div>
    </div>

    <!-- カテゴリーフィルターセクション -->
    <section class="lesson-filter">
      <div class="lesson-filter__inner">
        
        <!-- フィルターボタン群 -->
        <div class="lesson-filter__buttons">
          <button type="button" class="lesson-filter__btn is-active" data-category="all">すべて <span>7</span></button>
          <button type="button" class="lesson-filter__btn" data-category="trial">体験・単発 <span>2</span></button>
          <button type="button" class="lesson-filter__btn" data-category="basic">基礎・専門 <span>3</span></button>
          <button type="button" class="lesson-filter__btn" data-category="license">資格取得 <span>2</span></button>
        </div>

        <!-- 注記テキスト -->
        <p class="lesson-filter__note">掲載写真はすべてイメージです。</p>

      </div>
    </section>

    <!-- レッスン一覧 メインコンテンツ -->
    <div class="lesson-sections">

      <!-- SECTION 1: 体験・単発 -->
      <section class="lesson-sec" data-category="trial">
        <div class="lesson-sec__inner">
          <div class="lesson-sec__header">
            <div class="lesson-sec__title-group">
              <p class="section-subtitle">TRY & ENJOY</p>
              <h2 class="lesson-sec__title">まずは、つくる楽しさから。</h2>
              <p class="lesson-sec__desc">はじめてのキャンドル作りや、季節のものづくりを楽しみたい方へ。</p>
            </div>
            <span class="lesson-sec__badge">体験・単発 / 2レッスン</span>
          </div>

          <div class="lesson-grid lesson-grid--2col">
            <!-- カード 1 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-1.png" alt="ワンタイムレッスン" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">体験レッスン</p>
                <h3 class="lesson-card__title">ワンタイムレッスン</h3>
                <p class="lesson-card__text">キャンドル作りが初めての方でも楽しめる体験レッスンです。</p>
                <div class="lesson-card__meta">
                  <p>1レッスン（2時間）</p>
                  <p>当日お持ち帰り可能</p>
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-title">商品ごとに異なります</p>
                  <p class="lesson-card__price-sub">商品・料金の詳細は準備中です。</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>

            <!-- カード 2 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-2.png" alt="季節限定レッスン" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">期間限定レッスン</p>
                <h3 class="lesson-card__title">季節限定レッスン</h3>
                <p class="lesson-card__text">期間限定でレッスン内容が変わります。最新情報はInstagramで告知します。</p>
                <div class="lesson-card__meta">
                  <p>レッスン内容は期間限定</p>
                  <p>最新情報はInstagramへ</p>
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-title">商品ごとに異なります</p>
                  <p class="lesson-card__price-sub">商品・料金の詳細は準備中です。</p>
                </div>
                <a href="#" class="btn-more">Instagramで最新情報を見る <span class="arrow">→</span></a>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- SECTION 2: 基礎・専門 -->
      <section class="lesson-sec" data-category="basic">
        <div class="lesson-sec__inner">
          <div class="lesson-sec__header">
            <div class="lesson-sec__title-group">
              <p class="section-subtitle">LEARN & CREATE</p>
              <h2 class="lesson-sec__title">基礎から、表現を深める。</h2>
              <p class="lesson-sec__desc">しっかり学ぶクラフトコースから、素材や技法を探究するレッスンまで。</p>
            </div>
            <span class="lesson-sec__badge">基礎・専門 / 3レッスン</span>
          </div>

          <div class="lesson-grid lesson-grid--3col">
            <!-- カード 3 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-3.png" alt="クラフトコース" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">日本キャンドル協会認定</p>
                <h3 class="lesson-card__title">クラフトコース</h3>
                <p class="lesson-card__text">基礎からしっかり学び、思い描いたキャンドルをおうちでも作れるようになりたい方へ。修了時にはJCAの修了認定を受け、修了証が発行されます。</p>
                <div class="lesson-card__meta">
                  <p>初心者・中級者・上級者</p>
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-title">コースごとに異なります</p>
                  <p class="lesson-card__price-sub">各コースの回数・料金は後日ご案内します。</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>

            <!-- カード 4 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-4.png" alt="ジェルキャンドルコース" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">ARICO ROOM オリジナル</p>
                <h3 class="lesson-card__title">ジェルキャンドルコース</h3>
                <p class="lesson-card__text">ジェル概論の座学で知識を深めた後、色々な硬さのジェルワックスについて学ぶオリジナルコースです。</p>
                <div class="lesson-card__meta">
                  <p>全1回 ／ 15コマ・43作品</p>
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-num">56,000円</p>
                  <p class="lesson-card__price-sub">aricoの卒業生は28,000円</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>

            <!-- カード 5 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-5.png" alt="Pレッスン" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">JCA認定クラフトコース修了者向け</p>
                <h3 class="lesson-card__title">Pレッスン</h3>
                <p class="lesson-card__text">JCA認定クラフトコース修了者向けのレッスン。ARICO ROOM以外で修了された方もご受講いただけます。</p>
                <div class="lesson-card__meta">
                  <p>P1〜25</p>
                </div>
                <div class="lesson-card__notice">
                  キャンドル作り初心者の方はご受講いただけません。
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-title">各レッスンで異なります</p>
                  <p class="lesson-card__price-sub">各レッスンの内容・料金の詳細は準備中です。</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- SECTION 3: 資格取得 -->
      <section class="lesson-sec" data-category="license">
        <div class="lesson-sec__inner">
          <div class="lesson-sec__header">
            <div class="lesson-sec__title-group">
              <p class="section-subtitle">STEP INTO YOUR NEXT CHAPTER</p>
              <h2 class="lesson-sec__title">好きなことを、次のステップへ。</h2>
              <p class="lesson-sec__desc">これまでの学びを活かし、JCAの資格取得を目指す方のためのコースです。</p>
            </div>
            <span class="lesson-sec__badge">資格取得 / 2レッスン</span>
          </div>

          <div class="lesson-grid lesson-grid--2col">
            <!-- カード 6 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-6.png" alt="キャンドルアーティストコース" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">日本キャンドル協会（JCA）公式認定</p>
                <h3 class="lesson-card__title">キャンドルアーティストコース</h3>
                <p class="lesson-card__text">キャンドルアーティストの資格を取得するための、JCA公式認定コースです。</p>
                <div class="lesson-card__meta">
                  <p>全3回</p>
                </div>
                <div class="lesson-card__notice">
                  対象：JCA認定クラフトコースを修了された方
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-num">42,500円</p>
                  <p class="lesson-card__price-sub">受講料</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>

            <!-- カード 7 -->
            <article class="lesson-card">
              <div class="lesson-card__image-area">
                <img src="images/lesson-7.png" alt="キャンドルインストラクターコース" class="lesson-card__img">
              </div>
              <div class="lesson-card__body">
                <p class="lesson-card__category">日本キャンドル協会（JCA）公式認定</p>
                <h3 class="lesson-card__title">キャンドルインストラクターコース</h3>
                <p class="lesson-card__text">キャンドルインストラクター資格を取得するコース。JCA認定後は認定校を開校し、クラフト・アーティスト両コースをご自身のスクールで開講できます。直営校で講師として働くことも可能です。</p>
                <div class="lesson-card__meta">
                  <p>全3回</p>
                </div>
                <div class="lesson-card__notice">
                  対象：JCA認定キャンドルアーティスト資格認定者
                </div>
                <div class="lesson-card__price-box">
                  <p class="lesson-card__price-num">39,000円</p>
                  <p class="lesson-card__price-sub">受講料</p>
                </div>
                <a href="#" class="btn-more">このレッスンを予約・相談 <span class="arrow">→</span></a>
              </div>
            </article>
          </div>
        </div>
      </section>
      
    </div>

    <!-- 共通CTA（ご予約とお問い合わせ） -->
    <?php include 'includes/cta.php'; ?>

  </main>

  <!-- 共通フッター -->
  <?php include 'includes/footer.php'; ?>

  <script src="script.js"></script>
</body>
</html>
