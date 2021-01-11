<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New User</h3>
        <form method="POST" action="<?= base_url("dashboard/quizzes/new/2"); ?>" accept-charset="UTF-8"
              onsubmit="registerButton.disabled = true; return true;" class="form">
            <div class="form-group login-group">
                <input type="text" id="title" name="title"
                       class="login-form"
                       value="<?= old('title') ?>"
                       placeholder="Title"
                       required>
                <span class="login-span"></span>
            </div>
            <?php for ($i = 1; $i <= session()->get('questions_count'); $i++): ?>
                <div class="form-group login-group">
                    <input type="text" id="question-<?= $i; ?>" name="question-<?= $i; ?>"
                           class="login-form"
                           placeholder="Question"
                           required>
                    <span class="login-span"></span>
                </div>
                <div class="form-group login-group">
                    <input type="text" id="correct-<?= $i; ?>" name="correct-<?= $i; ?>"
                           class="login-form"
                           placeholder="Correct answer"
                           required>
                    <span class="login-span"></span>
                </div>
                <div class="form-group login-group">
                    <textarea id="answer-<?= $i; ?>" name="answer-<?= $i; ?>"
                              class="login-form"
                              placeholder="Answers"
                              required></textarea>
                    <span class="login-span"></span>
                </div>
            <?php endfor; ?>
            <div class="form-group login-group">
                <input type="datetime-local" id="start_time" name="start_time"
                       class="login-form"
                       placeholder="Start time"
                       required>
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <input type="datetime-local" id="end_time" name="end_time"
                       class="login-form"
                       placeholder="End time"
                       required>
                <span class="login-span"></span>
            </div>
            <input type="hidden" name="questions_count" value="<?= session()->get('questions_count'); ?>">
            <input type="hidden" name="group_id" value="<?= session()->get('group_id'); ?>">
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <button type="submit" name="registerButton" class="login-btn">Add</button>
        </form>
    </div>


<?= $this->endSection() ?>