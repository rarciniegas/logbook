<!-- <h2><?= esc($title); ?></h2> -->

<?php if (! empty($entries) && is_array($entries)) : ?>

    <?php foreach ($entries as $entry): ?>

        <h3><?= esc($entry['title']); ?></h3>

        <div class="main">
            <?= esc($entry['body']); ?>
        </div>
        <p><a href="/entries/<?= esc($entry['slug'], 'url'); ?>">View entry</a></p>

    <?php endforeach; ?>

<?php else : ?>

    <h3>No Entries</h3>

    <p>Unable to find any entries for you.</p>

<?php endif ?>