<?php
// add-game.php

// Предзаполнение: сначала POST (для первой отправки), потом COOKIE
$title          = $_POST['title']          ?? $_COOKIE['title']          ?? '';
$price          = $_POST['price']          ?? $_COOKIE['price']          ?? '';
$release_date   = $_POST['release_date']   ?? $_COOKIE['release_date']   ?? '';
$developer_email= $_POST['developer_email']?? $_COOKIE['developer_email']?? '';
$game_url       = $_POST['game_url']       ?? $_COOKIE['game_url']       ?? '';
$description    = $_POST['description']    ?? $_COOKIE['description']    ?? '';
$genre          = $_POST['genre']          ?? $_COOKIE['genre']          ?? '';
$rating         = $_POST['rating']         ?? $_COOKIE['rating']         ?? '16';

$platforms      = $_POST['platforms']      ??
    (isset($_COOKIE['platforms']) ? json_decode($_COOKIE['platforms'], true) : []);

$features       = $_POST['features']       ??
    (isset($_COOKIE['features']) ? json_decode($_COOKIE['features'], true) : []);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новую игру — Game-Store</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 700px; }
        label { display: block; margin: 15px 0 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 12px 30px; background: #28a745; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

<h1> Добавить новую игру в каталог</h1>

<form action="process-add-game.php" method="POST" enctype="multipart/form-data">

    <label>Название игры *</label>
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required>

    <label>Цена (руб) *</label>
    <input type="number" name="price" value="<?= htmlspecialchars($price) ?>" min="0" step="0.01" required>

    <label>Дата выхода игры</label>
    <input type="date" name="release_date" value="<?= htmlspecialchars($release_date) ?>">

    <label>Email разработчика</label>
    <input type="email" name="developer_email" value="<?= htmlspecialchars($developer_email) ?>">

    <label>Официальный сайт игры</label>
    <input type="url" name="game_url" value="<?= htmlspecialchars($game_url) ?>" placeholder="https://">

    <label>Описание игры</label>
    <textarea name="description" rows="6"><?= htmlspecialchars($description) ?></textarea>

    <label>Жанр *</label>
    <select name="genre" required>
        <option value="">— Выберите жанр —</option>
        <option value="action" <?= $genre=='action'?'selected':'' ?>>Action</option>
        <option value="rpg" <?= $genre=='rpg'?'selected':'' ?>>RPG</option>
        <option value="shooter" <?= $genre=='shooter'?'selected':'' ?>>Шутер</option>
        <option value="strategy" <?= $genre=='strategy'?'selected':'' ?>>Стратегия</option>
        <option value="adventure" <?= $genre=='adventure'?'selected':'' ?>>Приключения</option>
        <option value="sports" <?= $genre=='sports'?'selected':'' ?>>Спорт</option>
    </select>

    <label>Платформы (можно выбрать несколько)</label>
    <select name="platforms[]" multiple size="4" style="height:120px;">
        <option value="pc" <?= in_array('pc', $platforms)?'selected':'' ?>>PC</option>
        <option value="ps5" <?= in_array('ps5', $platforms)?'selected':'' ?>>PlayStation 5</option>
        <option value="xbox" <?= in_array('xbox', $platforms)?'selected':'' ?>>Xbox Series X/S</option>
        <option value="nintendo" <?= in_array('nintendo', $platforms)?'selected':'' ?>>Nintendo Switch</option>
        <option value="mobile" <?= in_array('mobile', $platforms)?'selected':'' ?>>Мобильные устройства</option>
    </select>

    <label>Возрастной рейтинг</label>
    <?php foreach(['0','6','12','16','18'] as $r): ?>
        <input type="radio" name="rating" value="<?= $r ?>" <?= $rating==$r?'checked':'' ?>> <?= $r ?>+ &nbsp;
    <?php endforeach; ?>

    <label>Дополнительно</label>
    <input type="checkbox" name="features[]" value="multiplayer" <?= in_array('multiplayer', $features)?'checked':'' ?>> Многопользовательский режим<br>
    <input type="checkbox" name="features[]" value="co-op" <?= in_array('co-op', $features)?'checked':'' ?>> Кооператив<br>
    <input type="checkbox" name="features[]" value="dlc" <?= in_array('dlc', $features)?'checked':'' ?>> Поддержка DLC<br>
    <input type="checkbox" name="features[]" value="vr" <?= in_array('vr', $features)?'checked':'' ?>> Поддержка VR

    <label>Обложка игры (изображение)</label>
    <input type="file" name="cover_image" accept="image/*">

    <label>Скриншоты игры (можно несколько)</label>
    <input type="file" name="screenshots[]" multiple accept="image/*">

    <br><br>
    <button type="submit">Добавить игру в каталог</button>
</form>

</body>
</html>