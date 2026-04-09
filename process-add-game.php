<?php
// process-add-game.php

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Сохраняем данные в cookies (на 30 дней)
    $expire = time() + 30 * 24 * 3600;

    setcookie('title',           $_POST['title'] ?? '', $expire, '/');
    setcookie('price',           $_POST['price'] ?? '', $expire, '/');
    setcookie('release_date',    $_POST['release_date'] ?? '', $expire, '/');
    setcookie('developer_email', $_POST['developer_email'] ?? '', $expire, '/');
    setcookie('game_url',        $_POST['game_url'] ?? '', $expire, '/');
    setcookie('description',     $_POST['description'] ?? '', $expire, '/');
    setcookie('genre',           $_POST['genre'] ?? '', $expire, '/');
    setcookie('rating',          $_POST['rating'] ?? '16', $expire, '/');

    if (!empty($_POST['platforms'])) {
        setcookie('platforms', json_encode($_POST['platforms']), $expire, '/');
    }
    if (!empty($_POST['features'])) {
        setcookie('features', json_encode($_POST['features']), $expire, '/');
    }

    // Обработка загрузки файлов
    $uploadedFiles = [];

    // Обложка
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $coverPath = $uploadDir . time() . '_' . basename($_FILES['cover_image']['name']);
        if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverPath)) {
            $uploadedFiles['cover'] = $coverPath;
        }
    }

    // Скриншоты
    if (isset($_FILES['screenshots']) && !empty($_FILES['screenshots']['name'][0])) {
        $uploadedFiles['screenshots'] = [];
        foreach ($_FILES['screenshots']['name'] as $key => $name) {
            if ($_FILES['screenshots']['error'][$key] === UPLOAD_ERR_OK) {
                $path = $uploadDir . time() . '_' . rand(1000,9999) . '_' . basename($name);
                if (move_uploaded_file($_FILES['screenshots']['tmp_name'][$key], $path)) {
                    $uploadedFiles['screenshots'][] = $path;
                }
            }
        }
    }

    // === ПОКАЗ РЕЗУЛЬТАТА ===
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Игра добавлена — Game-Store</title>
        <style> body {font-family: Arial; margin: 40px;} img {margin: 10px; border-radius: 8px;} </style>
    </head>
    <body>
    <h1> Игра добавлена в каталог!</h1>

    <h2>Введённые данные:</h2>
    <p><strong>Название:</strong> <?= htmlspecialchars($_POST['title'] ?? '') ?></p>
    <p><strong>Цена:</strong> <?= htmlspecialchars($_POST['price'] ?? '') ?> руб.</p>
    <p><strong>Жанр:</strong> <?= htmlspecialchars($_POST['genre'] ?? '') ?></p>
    <p><strong>Описание:</strong><br><?= nl2br(htmlspecialchars($_POST['description'] ?? '')) ?></p>

    <?php if (!empty($uploadedFiles['cover'])): ?>
        <h3>Обложка:</h3>
        <img src="<?= htmlspecialchars($uploadedFiles['cover']) ?>" width="300">
    <?php endif; ?>

    <?php if (!empty($uploadedFiles['screenshots'])): ?>
        <h3>Скриншоты:</h3>
        <?php foreach($uploadedFiles['screenshots'] as $img): ?>
            <img src="<?= htmlspecialchars($img) ?>" width="250">
        <?php endforeach; ?>
    <?php endif; ?>

    <hr>
    <p>
        <a href="add-game.php">← Добавить ещё одну игру</a>
    </p>
    </body>
    </html>
    <?php
    exit;
}

echo "Ошибка: данные не отправлены.";
?>