<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    Quizzes Page. <br>
    <span>Hello, <?= $user['role'] ?></span>
<?php foreach ($quizzes as $quiz): ?>
    <?php if ($user['groups'] == $quiz['group_id'] or $user['id'] == $quiz['teacher_id'] or strcmp($user['role'], 'root') == 0): ?>
        <a href="<?= base_url('quizzes/' . $quiz['id']) ?>"><?= $quiz['title'] ?></a>
    <?php endif; ?>
<?php endforeach; ?>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>