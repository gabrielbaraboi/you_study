<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    Home Page. <br>
    <span>Hello, <?= $user['role'] ?></span>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>