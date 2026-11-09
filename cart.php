<?php
session_start();

// 商品マスターデータ（単価 price を数値で管理）
$all_products = [
  1 => ['id' => 1, 'name' => 'Vanilla Dream', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '甘くやさしい香りが、何気ない日常を特別なひとときに。', 'img' => 'images/shop-1.png'],
  2 => ['id' => 2, 'name' => 'Ocean Breeze', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '海辺を吹き抜ける風のように、心をすっと軽くする香り。', 'img' => 'images/shop-2.png'],
  3 => ['id' => 3, 'name' => 'Rose Elegance', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '華やかなバラの香りが、空間を上品に彩る。', 'img' => 'images/shop-3.png'],
  4 => ['id' => 4, 'name' => 'Lavender Night', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '落ち着いた紫色の香りが、心を癒す。', 'img' => 'images/shop-4.png'],
  5 => ['id' => 5, 'name' => 'Citrus Sunshine', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '爽やかな柑橘系の香りが、元気をくれる。', 'img' => 'images/shop-5.png'],
  6 => ['id' => 6, 'name' => 'Forest Whisper', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '自然の香りが、心を落ち着ける。', 'img' => 'images/shop-6.png'],
  7 => ['id' => 7, 'name' => 'Amber Glow', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '温かみのある香りが、心を包む。', 'img' => 'images/shop-7.png'],
  8 => ['id' => 8, 'name' => 'Moonlight Jasmine', 'price' => 1000, 'price_text' => '1,000円', 'desc' => '夜の香りが、心を癒す。', 'img' => 'images/shop-8.png'],
  9 => ['id' => 9, 'name' => '商品名 9', 'price' => 0, 'price_text' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-9.png'],
  10 => ['id' => 10, 'name' => '商品名 10', 'price' => 0, 'price_text' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-10.png'],
  11 => ['id' => 11, 'name' => '商品名 11', 'price' => 0, 'price_text' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-11.png'],
  12 => ['id' => 12, 'name' => '商品名 12', 'price' => 0, 'price_text' => '価格未掲載', 'desc' => '商品情報は準備中です。', 'img' => 'images/shop-12.png'],
];

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// POSTリクエスト処理（追加・数量変更・削除）
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['product_id']) && !isset($_POST['action'])) {
    $id = (int)$_POST['product_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
  }
  if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = (int)$_POST['product_id'];
    unset($_SESSION['cart'][$id]);
  }
  if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $id = (int)$_POST['product_id'];
    $change = (int)$_POST['change'];
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id] += $change;
      if ($_SESSION['cart'][$id] <= 0) {
        unset($_SESSION['cart'][$id]);
      }
    }
  }
}

// カート内選択商品の計算処理
$cart_items = [];
$total_count = 0;
$total_price = 0;
$has_unpriced_item = false; // 価格未掲載商品が含まれるかのフラグ

foreach ($_SESSION['cart'] as $id => $qty) {
  if (isset($all_products[$id])) {
    $item = $all_products[$id];
    $item['qty'] = $qty;
    
    if ($item['price'] > 0) {
      $item['subtotal'] = $item['price'] * $qty;
      $item['subtotal_text'] = number_format($item['subtotal']) . '円';
      $total_price += $item['subtotal'];
    } else {
      $item['subtotal'] = 0;
      $item['subtotal_text'] = '価格未掲載';
      $has_unpriced_item = true;
    }
    
    $cart_items[] = $item;
    $total_count += $qty;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ショッピングカート | ARICO ROOM</title>
  
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
    <!-- ページヘッダー ＆ ステップナビゲーション -->
    <div style="padding: 60px 40px 40px; background-color: #ffffff;">
      <div style="max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
          <nav>
            <ul style="display: flex; gap: 8px; list-style: none; padding: 0; margin: 0 0 16px; font-size: 12px; color: #998A8A;">
              <li><a href="index.php" style="color: #998A8A; text-decoration: none;">ホーム</a> /</li>
              <li><a href="shop.php" style="color: #998A8A; text-decoration: none;">オンラインショップ</a> /</li>
              <li>カート</li>
            </ul>
          </nav>
          <p style="font-size: 12px; color: #936363; letter-spacing: 0.15em; margin: 0 0 8px;">SHOPPING CART</p>
          <h1 style="font-size: 36px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0;">ショッピングカート</h1>
        </div>

        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 8px;">
          <div style="display: flex; flex-direction: column; align-items: center; color: #9E6B6B;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">01</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em; border-bottom: 1.5px solid #9E6B6B; padding-bottom: 2px;">カート</span>
          </div>
          <span style="display: block; width: 40px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>
          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">02</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">購入手続き</span>
          </div>
          <span style="display: block; width: 40px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>
          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">03</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">内容確認</span>
          </div>
          <span style="display: block; width: 40px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>
          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">04</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">完了</span>
          </div>
        </div>
      </div>
    </div>

    <!-- カートメインコンテンツ -->
    <section style="width: 100%; padding: 60px 40px 100px; background-color: #FCFAFA; box-sizing: border-box;">
      <div style="max-width: 1100px; margin: 0 auto;">

        <!-- アナウンスエリア -->
        <div style="background-color: #FBF4F2; border: 1px solid #F0E6E6; border-radius: 6px; padding: 24px; margin-bottom: 60px;">
          <p style="font-size: 14px; color: #9E6B6B; font-weight: 700; margin: 0 0 8px;">掲載商品について</p>
          <p style="font-size: 13px; color: #333333; line-height: 1.6; margin: 0 0 4px;">元原稿では商品名・価格が未掲載のものが含まれるため、一部商品情報は準備中です。</p>
        </div>

        <div style="display: flex; gap: 60px; align-items: flex-start;">

          <!-- 左側：選択された商品リスト -->
          <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; border-bottom: 1px solid #EAE2E2; padding-bottom: 16px; margin-bottom: 24px;">
              <h2 style="font-size: 24px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0;">カートの商品</h2>
              <span style="font-size: 13px; color: #998A8A;"><?php echo $total_count; ?>点</span>
            </div>

            <?php if (empty($cart_items)): ?>
              <div style="padding: 60px 0; text-align: center;">
                <p style="font-size: 15px; color: #998A8A; margin-bottom: 24px;">現在カートに選択された商品はありません。</p>
                <a href="shop.php" style="display: inline-block; padding: 12px 32px; background-color: #9E6B6B; color: #ffffff; text-decoration: none; border-radius: 4px; font-size: 14px;">商品を選ぶ →</a>
              </div>
            <?php else: ?>
              <div style="display: flex; font-size: 12px; color: #998A8A; padding-bottom: 12px; border-bottom: 1px solid #F0E6E6;">
                <span style="flex: 1;">商品情報</span>
                <span style="width: 140px; text-align: center;">数量</span>
                <span style="width: 100px; text-align: right;">小計</span>
              </div>

              <!-- 選択された商品ループ -->
              <div>
                <?php foreach ($cart_items as $item): ?>
                  <div style="display: flex; align-items: center; padding: 32px 0; border-bottom: 1px solid #F0E6E6;">
                    
                    <div style="position: relative; width: 110px; height: 110px; border-radius: 8px; overflow: hidden; flex-shrink: 0; background-color: #F8F4F1;">
                      <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                      <span style="position: absolute; bottom: 6px; right: 6px; background-color: rgba(255, 255, 255, 0.85); font-size: 9px; padding: 2px 4px; border-radius: 2px; color: #333;">イメージ写真</span>
                    </div>

                    <div style="flex: 1; padding: 0 24px;">
                      <h3 style="font-size: 16px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0 0 4px;"><?php echo htmlspecialchars($item['name']); ?></h3>
                      <p style="font-size: 12px; color: #998A8A; margin: 0 0 4px;"><?php echo htmlspecialchars($item['price_text']); ?></p>
                      <p style="font-size: 12px; color: #998A8A; margin: 0; line-height: 1.5;"><?php echo htmlspecialchars($item['desc']); ?></p>
                    </div>

                    <!-- 数量変更ボタン -->
                    <div style="width: 140px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                      <div style="display: flex; align-items: center; border: 1px solid #EAE2E2; border-radius: 4px; background-color: #ffffff;">
                        <form action="cart.php" method="post" style="margin: 0;">
                          <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                          <input type="hidden" name="action" value="update">
                          <input type="hidden" name="change" value="-1">
                          <button type="submit" style="width: 32px; height: 32px; background: transparent; border: none; font-size: 14px; cursor: pointer;">-</button>
                        </form>
                        <span style="width: 36px; text-align: center; font-size: 13px; font-weight: 500;"><?php echo $item['qty']; ?></span>
                        <form action="cart.php" method="post" style="margin: 0;">
                          <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                          <input type="hidden" name="action" value="update">
                          <input type="hidden" name="change" value="1">
                          <button type="submit" style="width: 32px; height: 32px; background: transparent; border: none; font-size: 14px; cursor: pointer;">+</button>
                        </form>
                      </div>

                      <form action="cart.php" method="post" style="margin: 0;">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" style="background: transparent; border: none; font-size: 11px; color: #998A8A; text-decoration: underline; cursor: pointer; padding: 0;">削除する</button>
                      </form>
                    </div>

                    <!-- 個別小計計算 -->
                    <div style="width: 100px; text-align: right; font-size: 13px; color: #333333; font-weight: 500;">
                      <?php echo $item['subtotal_text']; ?>
                    </div>

                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div style="margin-top: 40px;">
              <a href="shop.php" style="font-size: 13px; color: #936363; text-decoration: none;">← お買い物を続ける</a>
            </div>
          </div>

          <!-- 右側：注文合計額の自動動的計算 -->
          <div style="width: 340px; flex-shrink: 0;">
            <div style="background-color: #ffffff; border: 1px solid #EAE2E2; border-radius: 8px; padding: 32px 24px;">
              <h2 style="font-size: 20px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0 0 24px; border-bottom: 1px solid #EAE2E2; padding-bottom: 16px;">ご注文内容</h2>

              <div style="display: flex; justify-content: space-between; font-size: 12px; color: #998A8A; margin-bottom: 12px;">
                <span>商品小計（<?php echo $total_count; ?>点）</span>
                <span style="font-weight: 500; color: #333;"><?php echo number_format($total_price); ?>円</span>
              </div>
              
              <div style="display: flex; justify-content: space-between; font-size: 12px; color: #998A8A; margin-bottom: 12px;">
                <span>送料</span>
                <span>全国一律 0円</span>
              </div>

              <!-- 合計表示 -->
              <div style="display: flex; justify-content: space-between; align-items: baseline; border-top: 1px solid #EAE2E2; padding-top: 20px; margin-top: 20px;">
                <span style="font-size: 14px; color: #333333;">合計 (税込)</span>
                <span style="font-size: 24px; font-family: 'Noto Serif JP', serif; color: #9E6B6B; font-weight: 700;">
                  <?php echo number_format($total_price); ?>円
                </span>
              </div>

              <?php if ($has_unpriced_item): ?>
                <p style="font-size: 11px; color: #998A8A; line-height: 1.6; margin: 16px 0 20px;">
                  ※価格未掲載の商品が含まれているため、上記合計額には含まれておりません。
                </p>
              <?php else: ?>
                <div style="height: 24px;"></div>
              <?php endif; ?>

              <a href="checkout.php"><button style="width: 100%; padding: 14px; background-color: #9E6B6B; color: #ffffff; border: none; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; transition: opacity 0.3s;" <?php echo empty($cart_items) ? 'disabled style="background-color:#CBBAB7; cursor:not-allowed;"' : ''; ?>>
                購入手続きへ進む →
              </button></a>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- 共通CTA -->
    <?php include 'includes/cta.php'; ?>
  </main>

  <!-- 共通フッター -->
  <?php include 'includes/footer.php'; ?>

  <script src="script.js"></script>
</body>
</html>
