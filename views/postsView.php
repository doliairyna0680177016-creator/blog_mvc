<?php require __DIR__ . '/layout/header.php'; ?>

<?php foreach ($posts as $post): ?>
    <article class="mb-4">
        <h2><?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8') ?></h2>
        <p><?= htmlspecialchars($post->content, ENT_QUOTES, 'UTF-8') ?></p>
    </article>
<?php endforeach; ?>

<?php require __DIR__ . '/layout/footer.php'; ?>