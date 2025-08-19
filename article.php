<?php
include 'db.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$article = array_filter($newsData, function($news) use($id) {
    return $news['id'] === $id;
});
$article = array_values($article)[0];
$relatedNews = array_filter($newsData, function($news) use($article) {
    return $news['category'] === $article['category'] && $news['id'] !== $article['id'];
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $article['title'] ?> - CNN Clone</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <div class="article-container">
        <h1><?= $article['title'] ?></h1>
        <p><?= $article['content'] ?></p>

        <h3>Related News</h3>
        <div class="news-grid">
            <?php foreach($relatedNews as $news): ?>
                <div class="news-card">
                    <img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>">
                    <div class="content">
                        <h3><a href="article.php?id=<?= $news['id'] ?>"><?= $news['title'] ?></a></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</body>
</html>
