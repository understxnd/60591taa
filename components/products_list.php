<section class="banner">
  <p>Маркетологи объявили <?= $today ?> года<br>самым удачным временем для покупок!</p>
</section>
<section class="catalog">
  <div class="container">
    <h1 class="catalog-title">Каталог товаров</h1>
    <ol class="pagination">
      <?php for ($i = 1; $i <= $pages_total; $i = $i + 1): ?>
      <li>
        <a href="catalog.php?page=<?= $i ?>" class="<?= $i === $page ? 'current' : '' ?>"><?= $i ?></a>
      </li>
      <?php endfor; ?>
    </ol>
     <ul class="products-list">
      <?php foreach($products_on_page as $i => $item): ?>
      <li>
        <a class="product-card"  href="product.php?product_id=<?= $i ?>">
          <h3><?= $item['title'] ?></h3>
          <img src="<?= $item['img_url'] ?>" width="156" height="120" alt="<?= $item['title'] ?>">
          <div class="product-options">
            <span class="price"><?= $item['price'] ?></span>
            <ul class="colors-list">
              <?php foreach ($item['colors'] as $color): ?>
              <li class="color-<?= $color ?>"></li>
              <?php endforeach;?>
            </ul>
          </div>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
