document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.getElementById('js-hamburger');
  const navOverlay = document.getElementById('js-nav-overlay');

  if (hamburger && navOverlay) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('is-active');
      navOverlay.classList.toggle('is-active');
    });
  }
});

// =========================================
// レッスン一覧 カテゴリーフィルター切り替え
// =========================================
document.addEventListener('DOMContentLoaded', () => {
  const filterBtns = document.querySelectorAll('.lesson-filter__btn');
  const lessonSecs = document.querySelectorAll('.lesson-sec');

  if (filterBtns.length > 0 && lessonSecs.length > 0) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        const currentBtn = e.currentTarget;

        // 1. すべてのボタンから is-active クラスを外す
        filterBtns.forEach(b => b.classList.remove('is-active'));
        // 2. クリックされたボタンに is-active を付与
        currentBtn.classList.add('is-active');

        // 3. 選択されたカテゴリーを取得
        const targetCategory = currentBtn.getAttribute('data-category');

        // 4. セクションの表示・非表示を切り替え
        lessonSecs.forEach(sec => {
          const secCategory = sec.getAttribute('data-category');
          
          if (targetCategory === 'all' || targetCategory === secCategory) {
            sec.style.display = ''; // インラインの display をクリアしてCSS本来の表示に戻す
          } else {
            sec.style.display = 'none'; // 非表示にする
          }
        });
      });
    });
  }
});
