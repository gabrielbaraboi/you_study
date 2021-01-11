<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Quiz #<?= $quiz['id'] ?></h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="<?= base_url("quiz/{$quiz['id']}/answer"); ?>" accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;" class="form">
                    <?php for ($i = 1; $i <= $quiz['questions_count']; $i++): ?>
                        <span><?= unserialize($quiz['questions'])[$i - 1] ?></span>
                        <div class="form-group login-group">
                            <select name="answer-<?= $i ?>" id="answer-<?= $i ?>" class="form-control">
                                <option value="" selected disabled hidden>Choose here</option>
                                <?php foreach ($answers[$i - 1] as $answer): ?>
                                    <option value="<?= $answer; ?>"><?= $answer; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endfor; ?>
                    <?= csrf_field() ?>
                    <button type="submit" name="registerButton" class="btn btn-primary btn-main">Answer</button>
                </form>
            </div>
        </div>
    </div>
<?php
$end_time = strtotime($quiz['end_time']);
?>
    <script>
        window.setInterval(function () {
            let end_time = <?= $end_time ?> + '000';
            let now = new Date();
            if (Date.parse(now) == end_time)
                location.reload();
        }, 1000);
    </script>

<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>