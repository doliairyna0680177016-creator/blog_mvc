<?php
require __DIR__ . '/layout/header.php';

$parsedown = new Parsedown();
$currentSearch = isset($_GET['search']) ? (string) $_GET['search'] : '';
?>

<div class="container" style="max-width: 800px;">
    <form method="GET" action="" class="row g-2 mb-4">
        <div class="col-sm-9">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Пошук поста за назвою..."
                value="<?= htmlspecialchars($currentSearch, ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>
        <div class="col-sm-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">Знайти</button>
            <?php if ($currentSearch !== ''): ?>
                <a href="index.php" class="btn btn-outline-secondary">Скинути</a>
            <?php endif; ?>
        </div>
    </form>

    <?php if (empty($posts)): ?>
        <div class="alert alert-warning">
            За запитом «<?= htmlspecialchars($currentSearch, ENT_QUOTES, 'UTF-8') ?>» постів не знайдено.
        </div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <article class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h4">
                        <?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8') ?>
                    </h2>
                    <h6 class="card-subtitle mb-3 text-muted">
                        Дата публікації: <?= htmlspecialchars($post->createdAt, ENT_QUOTES, 'UTF-8') ?>
                    </h6>
                    <div class="card-text">
                        <?= $parsedown->text($post->content) ?>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/layout/footer.php'; ?>