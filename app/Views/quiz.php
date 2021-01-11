<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <?= $quiz['title'] ?><br>
    <?= $teacher['firstname'] ?><br>
    <?= $group['name'] ?><br>
    <?= $quiz['start_time'] ?><br>
    <?= $quiz['end_time'] ?><br>
    <?= date('Y-m-d H:i:s'); ?><br>
    <?php if ($start): ?>
        <a href="<?= base_url('quiz/' . $quiz['id'] . '/answer') ?>"><button class="login-btn">Start Quiz</button></a>
    <?php else:?>
        <button class="login-btn disabled">Start Quiz</button>
    <?php endif; ?>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>