<?php
// =========================================
// 商品データ（将来MySQLに置き換える部分）
// =========================================
$all_products = [
  ['id' => 1, 'name' => 'Vanilla Dream', 'price' => '1000円', 'desc' => '甘くやさしい香りが、何気ない日常を特別なひとときに。', 'img' => 'images/shop-1.png', 'is_sold_out' => false],
  ['id' => 2, 'name' => 'Ocean Breeze', 'price' => '1000円', 'desc' => '海辺を吹き抜ける風のように、心をすっと軽くする香り。', 'img' => 'images/shop-2.png', 'is_sold_out' => false],
  ['id' => 3, 'name' => 'Rose Elegance', 'price' => '1000円', 'desc' => '華やかなバラの香りが、空間を上品に彩る。', 'img' => 'images/shop-3.png', 'is_sold_out' => false],
  ['id' => 4, 'name' => 'Lavender Night', 'price' => '1000円', 'desc' => '落ち着いた紫色の香りが、心を癒す。', 'img' => 'images/shop-4.png', 'is_sold_out' => false],
  ['id' => 5, 'name' => 'Citrus Sunshine', 'price' => '1000円', 'desc' => '爽やかな柑橘系の香りが、元気をくれる。', 'img' => 'images/shop-5.png', 'is_sold_out' => true],
  ['id' => 6, 'name' => 'Forest Whisper', 'price' => '1000円', 'desc' => '自然の香りが、心を落ち着ける。', 'img' => 'images/shop-6.png', 'is_sold_out' => true],
  ['id' => 7, 'name' => 'Amber Glow', 'price' => '1000円', 'desc' => '温かみのある香りが、心を包む。', 'img' => 'images/shop-7.png', 'is_sold_out' => true],
  ['id' => 8, 'name' => 'Moonlight Jasmine', 'price' => '1000円', 'desc' => '夜の香りが、心を癒す。', 'img' => 'images/shop-8.png', 'is_sold_out' => true],
  // 9件目以降（2ページ目に表示される商品）
  ['id' => 9, 'name' => '商品名 9', 'price' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-9.png', 'is_sold_out' => true],
  ['id' => 10, 'name' => '商品名 10', 'price' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-10.png', 'is_sold_out' => true],
  ['id' => 11, 'name' => '商品名 11', 'price' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-11.png', 'is_sold_out' => true],
  ['id' => 12, 'name' => '商品名 12', 'price' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-12.png', 'is_sold_out' => true],
];

// =========================================
// ページネーション計算処理
// =========================================
$total_products = count($all_products); // 全商品数
$per_page = 8; // 1ページあたりの表示件数
$max_page = ceil($total_products / $per_page); // 最大ページ数

// 現在のページ番号を取得（URLの ?page=1 など）
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
  $current_page = 1;
} elseif ($current_page > $max_page && $max_page > 0) {
  $current_page = $max_page;
}

// 現在のページに表示する商品を切り出し
$offset = ($current_page - 1) * $per_page;
$display_products = array_slice($all_products, $offset, $per_page);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オンラインショップ | ARICO ROOM</title>
  
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
            <li>オンラインショップ</li>
          </ul>
        </nav>
        <p class="section-subtitle">ONLINE SHOP</p>
        <h1 class="page-header__title">オンラインショップ</h1>
      </div>
    </div>

    <!-- オンラインショップ メインコンテンツ -->
    <section class="shop-content">
      <div class="shop-content__inner">

        <!-- 掲載商品についてのご案内アナウンス -->
        <div class="shop-notice">
          <p class="shop-notice__title">掲載商品について</p>
          <p class="shop-notice__text">元原稿では商品名・価格が未掲載のため、商品情報は準備中です。掲載写真はすべてイメージで、実際の販売商品とは異なります。</p>
        </div>

        <!-- 件数表示 ＆ ページ情報 -->
        <div class="shop-bar">
          <p class="shop-bar__count">商品一覧 ／ <?php echo $total_products; ?>点</p>
          <p class="shop-bar__page">PAGE <?php echo $current_page; ?></p>
        </div>

        <!-- 商品カードグリッド (4列) -->
        <div class="shop-grid">
          <?php foreach ($display_products as $product): ?>
            <article class="shop-card">
              <div class="shop-card__image-area">

                <!-- 管理者フラグ(is_sold_out)がtrueの場合のみ表示 -->
                <!-- <?php //if ($product['is_sold_out']): ?>
                  <span class="shop-card__badge-sold">SOLD OUT</span>
                <?php //endif; ?>
                 -->

                <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="shop-card__img">
              </div>

              <div class="shop-card__body">
                <div class="shop-card__content">
                  <p class="shop-card__id">商品ID: <?php echo htmlspecialchars($product['id']); ?></p>
                  <h2 class="shop-card__title"><?php echo htmlspecialchars($product['name']); ?></h2>
                  <p class="shop-card__price"><?php echo htmlspecialchars($product['price']); ?></p>
                  <p class="shop-card__desc"><?php echo htmlspecialchars($product['desc']); ?></p>
                </div>

                <!-- カート追加フォーム -->
                <form action="cart.php" method="post" class="shop-card__form">
                  <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                  <button type="submit" class="btn-more shop-card__btn" <?php echo $product['is_sold_out'] ? 'disabled' : ''; ?>>
                    <?php echo $product['is_sold_out'] ? '売り切れ' : 'カートに入れる <span class="arrow">→</span>'; ?>
                  </button>
                </form>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

        <!-- ページネーション -->
        <?php if ($max_page > 1): ?>
          <nav class="pagination">
            <ul class="pagination__list">
              <?php for ($i = 1; $i <= $max_page; $i++): ?>
                <a href="shop.php?page=<?php echo $i; ?>" class="pagination__link <?php echo ($i === $current_page) ? 'is-active' : ''; ?>">
                <li class="pagination__item">
                    <?php echo $i; ?>
                </li>
                </a>
              <?php endfor; ?>

              <!-- 次へボタン (最終ページでなければ表示) -->
              <?php if ($current_page < $max_page): ?>
                <a href="shop.php?page=<?php echo $current_page + 1; ?>" class="pagination__link pagination__link--next">
                <li class="pagination__item">
                  ›
                </li>
                </a>
              <?php endif; ?>
            </ul>
          </nav>
        <?php endif; ?>

        <!-- お問い合わせエリア -->
        <div class="shop-contact-area">
          <p class="shop-contact-area__text">商品についてのご質問は、お問い合わせよりお知らせください。</p>
          <a href="contact.php" class="btn-more">
            商品について問い合わせる <span class="arrow">→</span>
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
