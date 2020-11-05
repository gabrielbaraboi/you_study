<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>

    Dashboard. <br>
    <span>Hello, <?= $user['role'] ?></span>

<?= $this->endSection() ?>