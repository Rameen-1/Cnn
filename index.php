<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CNN Clone</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <section class="featured-news">
        <h2>Featured News</h2>
        <div class="news-grid">
            <?php foreach($newsData as $news): ?>
                <div class="news-card">
                    <img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>">
                    <div class="content">
                        <h3><a href="article.php?id=<?= $news['id'] ?>"><?= $news['title'] ?></a></h3>
                        <p><?= substr($news['content'], 0, 80) ?>...</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="categories">
        <h2>Categories</h2>
        <div class="category-grid">
            <a href="category.php?cat=World" class="category-card">World</a>
            <a href="category.php?cat=Sports" class="category-card">Sports</a>
            <a href="category.php?cat=Technology" class="category-card">Technology</a>
            <a href="category.php?cat=Entertainment" class="category-card">Entertainment</a>
        </div>
    </section>
</main>
</body>
</html>
