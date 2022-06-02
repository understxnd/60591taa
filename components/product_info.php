<section class="item">
    <div class="container">
        <h1 class="item-title"><? echo $title ?></h1>
        <img src="<? echo $img_url ?>" width="510" height="392" alt="<?= $title ?>">
        <h1 class="item-title"><?= 'Цена ' ?><? echo $price ?></h1>
        <?php
        if ($_SESSION['username'])
        {
            ?>
            <form method="post" action="..\order.php">
                <p>
                    <lable for="id1">Количество:</lable>
                    <input type="text" name="quantity" id="id1" value="1">
                </p>

                <p>
                    <label for="id1">Цвет:</label>
                    <select name="color" id="id2">
                        <?php
                        foreach (explode(', ',$colors) as $color):
                            ?>
                            <option class="color-<?= $color ?>"><?=$color?></option>
                        <?php endforeach;?>
                    </select>

                </p>

                <input type="hidden" name="id" id="id3" value="<?=$id?>">
                <input type="hidden" name="price" id="id4" value="<?=$price?>">

                <p>
                    <input type="submit" value="Добавить в заказ">
                </p>
            </form>
        <?}
        ?>
    </div>
</section>