<?php
session_start();

// カートが空の場合はショップページへ戻す
if (empty($_SESSION['cart'])) {
  header('Location: shop.php');
  exit;
}

// 47都道府県リスト
$prefectures = [
  "北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県",
  "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県",
  "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県",
  "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県",
  "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
  "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県",
  "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
];

// カレンダー指定可能な範囲（3日後 〜 14日後）
$min_date = date('Y-m-d', strtotime('+3 days'));
$max_date = date('Y-m-d', strtotime('+14 days'));

// 商品マスターデータ
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

// カート内商品の抽出と計算
$cart_items = [];
$total_count = 0;
$total_price = 0;
$has_unpriced_item = false;

foreach ($_SESSION['cart'] as $id => $qty) {
  if (isset($all_products[$id])) {
    $item = $all_products[$id];
    $item['qty'] = $qty;
    
    if ($item['price'] > 0) {
      $item['subtotal'] = $item['price'] * $qty;
      $total_price += $item['subtotal'];
    } else {
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
  <title>購入情報の入力 | ARICO ROOM</title>
  
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
    <!-- ページヘッダー ＆ 4ステップナビゲーション -->
    <div style="padding: 60px 40px 40px; background-color: #ffffff;">
      <div style="max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
          <nav>
            <ul style="display: flex; gap: 8px; list-style: none; padding: 0; margin: 0 0 16px; font-size: 12px; color: #998A8A;">
              <li><a href="index.php" style="color: #998A8A; text-decoration: none;">ホーム</a> /</li>
              <li><a href="shop.php" style="color: #998A8A; text-decoration: none;">オンラインショップ</a> /</li>
              <li><a href="cart.php" style="color: #998A8A; text-decoration: none;">カート</a> /</li>
              <li>購入情報の入力</li>
            </ul>
          </nav>
          <p style="font-size: 12px; color: #936363; letter-spacing: 0.15em; margin: 0 0 8px;">CHECKOUT</p>
          <h1 style="font-size: 36px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0;">購入情報の入力</h1>
        </div>

        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 8px;">
          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">01</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">カート</span>
          </div>
          <span style="display: block; width: 30px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>

          <div style="display: flex; flex-direction: column; align-items: center; color: #9E6B6B;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">02</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em; border-bottom: 1.5px solid #9E6B6B; padding-bottom: 2px;">情報入力</span>
          </div>
          <span style="display: block; width: 30px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>

          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">03</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">内容確認</span>
          </div>
          <span style="display: block; width: 30px; height: 1px; background-color: #EAE2E2; margin-bottom: 6px;"></span>

          <div style="display: flex; flex-direction: column; align-items: center; color: #B5A8A8;">
            <span style="font-size: 20px; font-family: 'Noto Serif JP', serif; line-height: 1;">04</span>
            <span style="font-size: 11px; margin-top: 6px; letter-spacing: 0.05em;">完了</span>
          </div>
        </div>
      </div>
    </div>

    <!-- メインコンテンツ -->
    <section style="width: 100%; padding: 40px 40px 100px; background-color: #FCFAFA; box-sizing: border-box;">
      <div style="max-width: 1100px; margin: 0 auto;">

        <!-- 上部アナウンス枠 -->
        <div style="background-color: #FBF4F2; border: 1px solid #F0E6E6; border-radius: 6px; padding: 20px 24px; margin-bottom: 40px;">
          <p style="font-size: 13px; color: #9E6B6B; font-weight: 700; margin: 0 0 4px;">販売開始後を想定した購入フローの記入例です</p>
          <p style="font-size: 12px; color: #666666; line-height: 1.6; margin: 0 0 2px;">現在は販売準備中です。この画面から実際の注文・決済は行われません。</p>
        </div>

        <form action="confirm.php" method="post" style="display: flex; gap: 60px; align-items: flex-start;">

          <!-- 左側：入力フォームエリア -->
          <div style="flex: 1;">

            <!-- 01 お届け先・連絡先 -->
            <div style="margin-bottom: 48px;">
              <div style="display: flex; align-items: baseline; gap: 12px; border-bottom: 1px solid #EAE2E2; padding-bottom: 12px; margin-bottom: 24px;">
                <h2 style="font-size: 20px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0;">
                  <span style="color: #9E6B6B; margin-right: 8px;">01</span>お届け先・連絡先
                </h2>
              </div>

              <!-- 姓 / 名 -->
              <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">姓 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="last_name" placeholder="山田" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">名 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="first_name" placeholder="花子" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
              </div>

              <!-- セイ / メイ -->
              <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">セイ <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="last_name_kana" placeholder="ヤマダ" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">メイ <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="first_name_kana" placeholder="ハナコ" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
              </div>

              <!-- 郵便番号 / 都道府県（47都道府県対応） -->
              <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">郵便番号 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="zip" placeholder="000-0000" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">都道府県 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <select name="pref" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff; color: #333;">
                    <option value="" disabled selected>都道府県を選択してください</option>
                    <?php foreach ($prefectures as $pref): ?>
                      <option value="<?php echo $pref; ?>"><?php echo $pref; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- 市区町村・番地 -->
              <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">市区町村・番地 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                <input type="text" name="address1" placeholder="渋谷区神宮前 1-2-3" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
              </div>

              <!-- 建物名・部屋番号 -->
              <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">建物名・部屋番号</label>
                <input type="text" name="address2" placeholder="サンプルハイツ 101" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
              </div>

              <!-- 電話番号 / メールアドレス -->
              <div style="display: flex; gap: 20px; margin-bottom: 8px;">
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">電話番号 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="tel" name="tel" placeholder="090-0000-0000" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">メールアドレス <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="email" name="email" placeholder="hanako@example.com" required style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
              </div>
              <p style="font-size: 11px; color: #998A8A; margin: 0;">ご注文確認や発送のご案内を受け取るメールアドレスをご入力ください。</p>
            </div>

            <!-- 02 配送方法（カレンダー＆1時間毎指定） -->
            <div style="margin-bottom: 48px;">
              <h2 style="font-size: 20px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0 0 24px; border-bottom: 1px solid #EAE2E2; padding-bottom: 12px;">
                <span style="color: #9E6B6B; margin-right: 8px;">02</span>配送方法
              </h2>

              <div style="border: 1px solid #9E6B6B; border-radius: 4px; padding: 16px 20px; background-color: #fff; margin-bottom: 20px; display: flex; align-items: center; gap: 12px;">
                <input type="radio" name="delivery_method" value="normal" checked style="accent-color: #9E6B6B;">
                <div>
                  <span style="font-size: 13px; color: #333; font-weight: 500;">通常配送</span>
                  <p style="font-size: 11px; color: #998A8A; margin: 2px 0 0;">配送料：全国一律 0円</p>
                </div>
              </div>

              <!-- お届け希望日 (カレンダー) / お届け時間帯 (1時間刻み) -->
              <div style="display: flex; gap: 20px; margin-bottom: 8px;">
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">お届け希望日（カレンダーより選択）</label>
                  <input type="date" name="delivery_date" min="<?php echo $min_date; ?>" max="<?php echo $max_date; ?>" style="width: 100%; padding: 11px 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff; color: #333;">
                </div>
                <div style="flex: 1;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">お届け時間帯</label>
                  <select name="delivery_time" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff; color: #333;">
                    <option value="指定なし" selected>指定なし</option>
                    <option value="9:00〜10:00">9:00 〜 10:00</option>
                    <option value="10:00〜11:00">10:00 〜 11:00</option>
                    <option value="11:00〜12:00">11:00 〜 12:00</option>
                    <option value="12:00〜13:00">12:00 〜 13:00</option>
                    <option value="13:00〜14:00">13:00 〜 14:00</option>
                    <option value="14:00〜15:00">14:00 〜 15:00</option>
                    <option value="15:00〜16:00">15:00 〜 16:00</option>
                    <option value="16:00〜17:00">16:00 〜 17:00</option>
                    <option value="17:00〜18:00">17:00 〜 18:00</option>
                    <option value="18:00〜19:00">18:00 〜 19:00</option>
                    <option value="19:00〜20:00">19:00 〜 20:00</option>
                    <option value="20:00〜21:00">20:00 〜 21:00</option>
                  </select>
                </div>
              </div>
              <p style="font-size: 11px; color: #998A8A; margin: 0;">※お届け希望日は本日より3日後〜14日後までご指定いただけます。</p>
            </div>

            <!-- 03 支払い方法（4種類の選択肢 ＋ 動的カードフォーム） -->
            <div style="margin-bottom: 40px;">
              <h2 style="font-size: 20px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0 0 24px; border-bottom: 1px solid #EAE2E2; padding-bottom: 12px;">
                <span style="color: #9E6B6B; margin-right: 8px;">03</span>支払い方法
              </h2>

              <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 24px;">
                <!-- クレジットカード -->
                <label style="border: 1px solid #EAE2E2; border-radius: 4px; padding: 16px 20px; background-color: #fff; display: flex; align-items: center; gap: 12px; cursor: pointer;">
                  <input type="radio" name="payment_method" value="credit" checked id="pay_credit" style="accent-color: #9E6B6B;">
                  <span style="font-size: 14px; color: #333; font-weight: 500;">クレジットカード一括払い</span>
                </label>

                <!-- 銀行振込 -->
                <label style="border: 1px solid #EAE2E2; border-radius: 4px; padding: 16px 20px; background-color: #fff; display: flex; align-items: center; gap: 12px; cursor: pointer;">
                  <input type="radio" name="payment_method" value="bank" id="pay_bank" style="accent-color: #9E6B6B;">
                  <span style="font-size: 14px; color: #333; font-weight: 500;">銀行振込（前払い）</span>
                </label>

                <!-- コンビニ決済 -->
                <label style="border: 1px solid #EAE2E2; border-radius: 4px; padding: 16px 20px; background-color: #fff; display: flex; align-items: center; gap: 12px; cursor: pointer;">
                  <input type="radio" name="payment_method" value="convenience" id="pay_conv" style="accent-color: #9E6B6B;">
                  <span style="font-size: 14px; color: #333; font-weight: 500;">コンビニ決済（セブンイレブン / ローソン / ファミリーマート）</span>
                </label>

                <!-- PayPay -->
                <label style="border: 1px solid #EAE2E2; border-radius: 4px; padding: 16px 20px; background-color: #fff; display: flex; align-items: center; gap: 12px; cursor: pointer;">
                  <input type="radio" name="payment_method" value="paypay" id="pay_paypay" style="accent-color: #9E6B6B;">
                  <span style="font-size: 14px; color: #333; font-weight: 500;">PayPay決済</span>
                </label>
              </div>

              <!-- クレジットカード入力枠（カード選択時のみ表示） -->
              <div id="card_info_box" style="background-color: #FAF8F8; border: 1px solid #EAE2E2; border-radius: 6px; padding: 24px; margin-bottom: 24px;">
                <div style="margin-bottom: 20px;">
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">カード番号 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="card_no" placeholder="1234 5678 9012 3456" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>

                <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                  <div style="flex: 1;">
                    <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">有効期限 (月/年) <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                    <input type="text" name="card_exp" placeholder="MM / YY" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                  </div>
                  <div style="flex: 1;">
                    <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">セキュリティコード <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                    <input type="password" name="card_cvv" placeholder="123" maxlength="4" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                  </div>
                </div>

                <div>
                  <label style="display: block; font-size: 12px; color: #333333; margin-bottom: 6px;">カード名義 <span style="color: #9E6B6B; font-size: 10px; margin-left: 4px;">必須</span></label>
                  <input type="text" name="card_name" placeholder="HANAKO YAMADA" style="width: 100%; padding: 12px; border: 1px solid #EAE2E2; border-radius: 4px; box-sizing: border-box; font-size: 14px; background-color: #fff;">
                </div>
              </div>

            </div>

            <!-- 次へボタン -->
            <p style="font-size: 12px; color: #666666; margin-bottom: 12px;">次の画面で入力情報とご注文内容をご確認いただけます。</p>
            <button type="submit" style="width: 100%; padding: 16px; background-color: #9E6B6B; color: #ffffff; border: none; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; display: flex; justify-content: center; align-items: center; gap: 8px;">
              注文内容の確認へ進む <span>→</span>
            </button>

            <!-- カートに戻る -->
            <div style="margin-top: 24px;">
              <a href="cart.php" style="font-size: 13px; color: #936363; text-decoration: none;">← カートに戻る</a>
            </div>

          </div>

          <!-- 右側：ご注文内容サイドバー -->
          <div style="width: 340px; flex-shrink: 0;">
            <div style="background-color: #ffffff; border: 1px solid #EAE2E2; border-radius: 8px; padding: 32px 24px;">
              <div style="display: flex; justify-content: space-between; align-items: baseline; border-bottom: 1px solid #EAE2E2; padding-bottom: 16px; margin-bottom: 20px;">
                <h2 style="font-size: 20px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0;">ご注文内容</h2>
                <span style="font-size: 12px; color: #998A8A;"><?php echo $total_count; ?>点</span>
              </div>

              <!-- ミニ商品リスト -->
              <div style="margin-bottom: 24px;">
                <?php foreach ($cart_items as $item): ?>
                  <div style="display: flex; gap: 12px; margin-bottom: 16px; align-items: center;">
                    <div style="position: relative; width: 60px; height: 60px; border-radius: 4px; overflow: hidden; flex-shrink: 0; background-color: #F8F4F1;">
                      <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="flex: 1;">
                      <h3 style="font-size: 13px; font-family: 'Noto Serif JP', serif; font-weight: 400; color: #333333; margin: 0 0 2px;"><?php echo htmlspecialchars($item['name']); ?></h3>
                      <p style="font-size: 11px; color: #998A8A; margin: 0;"><?php echo htmlspecialchars($item['price_text']); ?></p>
                      <p style="font-size: 11px; color: #998A8A; margin: 2px 0 0;">数量 : <?php echo $item['qty']; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- 小計・送料・消費税 -->
              <div style="border-top: 1px solid #F0E6E6; padding-top: 16px;">
                <div style="display: flex; justify-content: space-between; font-size: 12px; color: #666666; margin-bottom: 10px;">
                  <span>商品小計（<?php echo $total_count; ?>点）</span>
                  <span><?php echo $has_unpriced_item ? '未確定' : number_format($total_price) . '円'; ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 12px; color: #666666; margin-bottom: 10px;">
                  <span>送料</span>
                  <span>全国一律 0円</span>
                </div>
              </div>

              <!-- 合計 (税込) -->
              <div style="display: flex; justify-content: space-between; align-items: baseline; border-top: 1px solid #EAE2E2; padding-top: 20px; margin-top: 10px;">
                <span style="font-size: 13px; color: #333333;">合計 (税込)</span>
                <span style="font-size: 22px; font-family: 'Noto Serif JP', serif; color: #9E6B6B; font-weight: 700;">
                  <?php echo $has_unpriced_item ? '未確定' : number_format($total_price) . '円'; ?>
                </span>
              </div>
            </div>
          </div>

        </form>

      </div>
    </section>

    <!-- 共通CTA -->
    <?php include 'includes/cta.php'; ?>
  </main>

  <!-- 共通フッター -->
  <?php include 'includes/footer.php'; ?>

  <!-- JS: 決済方法切替制御 -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const payRadios = document.querySelectorAll('input[name="payment_method"]');
      const cardBox = document.getElementById('card_info_box');

      function toggleCardBox() {
        const selected = document.querySelector('input[name="payment_method"]:checked').value;
        if (selected === 'credit') {
          cardBox.style.display = 'block';
        } else {
          cardBox.style.display = 'none';
        }
      }

      payRadios.forEach(radio => {
        radio.addEventListener('change', toggleCardBox);
      });

      toggleCardBox();
    });
  </script>
</body>
</html>
