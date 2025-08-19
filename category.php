<?php
include 'db.php';
$category = isset($_GET['cat']) ? $_GET['cat'] : 'World';
$filteredNews = array_filter($newsData, function($news) use($category) {
    return $news['category'] === $category;
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $category ?> News - CNN Clone</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <h2><?= $category ?> News</h2>
    <div class="news-grid">
        <?php foreach($filteredNews as $news): ?>
            <div class="news-card">
                <img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>">
                <div class="content">
                    <h3><a href="article.php?id=<?= $news['id'] ?>"><?= $news['title'] ?></a></h3>
                    <p><?= substr($news['content'], 0, 80) ?>...</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>
