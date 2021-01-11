<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New User</h3>
        <?php print_r($answers) ?>
        <form method="POST" action="<?= base_url("dashboard/quizzes/new/2"); ?>" accept-charset="UTF-8"
              onsubmit="registerButton.disabled = true; return true;" class="form">
            <?php for ($i = 1; $i <= $quiz['questions_count']; $i++): ?>
                <span><?= unserialize($quiz['questions'])[$i-1] ?></span>
                <div class="form-group login-group">
                    <select name="userGroup" id="userGroup" class="form-control">
                        <?php foreach ($answers[$i-1] as $answer): ?>
                            <option value="<?= $answer; ?>"><?= $answer; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group login-group">
                    <input type="text" id="answer-<?= $i; ?>" name="answer-<?= $i; ?>"
                           class="login-form"
                           placeholder="answer <?= $i; ?>"
                           required>
                    <span class="login-span"></span>
                </div>
            <?php endfor; ?>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <button type="submit" name="registerButton" class="login-btn">Answer</button>
        </form>
    </div>

<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>