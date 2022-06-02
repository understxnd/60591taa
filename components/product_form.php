<section class="form">
    <div class="container">
        <h1 class="catalog-title">Добавление продукта</h1>
        <form method="post" action="..\product_add.php" enctype="multipart/form-data">
            <p>
                <label for="id1">Наименование:</label>
                <input type="text" name="title" id="id1">
            </p>
            <p>
                <label for="id2">Цена:</label>
                <input type="text" name="price" id="id2">
            </p>
            <p>
                <label for="id3">Тип:</label>
                <select name="type" id="id3">
                    <option value="furniture">Мебель</option>
                    <option value="lightning">Освещение</option>
                    <option value="textile">Текстиль</option>
                    <option value="furniture">Другое</option>
                </select>
            </p>
            <p>
                <label for="id4">Цвет:</label>
                <select name="colors[]" multiple size="6" id="id4">
                    <option value="yellor">Желтый</option>
                    <option value="red">Красный</option>
                    <option value="green">Зеленый</option>
                    <option value="black">Черный</option>
                    <option value="white">Белый</option>
                    <option value="orange">Оранжевый</option>
                </select>
            </p>
            <p>
                <label for="id5">Описание:</label>
                <textarea name="features" rows="5" id="id5"></textarea>
            </p>
            <p>
                <label for="image" id="id6">Изображение:</label>
                <input name="img_url" type="file">
            </p>
            <p><input type="submit" value="Создать"></p>
        </form>
    </div>
</section>