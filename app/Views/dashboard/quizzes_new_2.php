<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New Quiz - Step 2</h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form method="POST" autocomplete="off" action="<?= base_url("dashboard/quizzes/new/2"); ?>" accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;" class="form">
                    <div class="form-group login-group">
                        <input type="text" id="title" name="title"
                               class="form-control"
                               value="<?= old('title') ?>"
                               placeholder="Title"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <?php for ($i = 1; $i <= session()->get('questions_count'); $i++): ?>
                        <div class="form-group login-group">
                            <label for="end_time">Question #<?= $i; ?></label>
                            <input type="text" id="question-<?= $i; ?>" name="question-<?= $i; ?>"
                                   class="form-control"
                                   placeholder="Question"
                                   required>
                            <span class="login-span"></span>
                        </div>
                        <div class="form-group login-group">
                            <input type="text" id="correct-<?= $i; ?>" name="correct-<?= $i; ?>"
                                   class="form-control"
                                   placeholder="Correct answer"
                                   required>
                            <span class="login-span"></span>
                        </div>
                        <div class="form-group login-group">
                    <textarea id="answer-<?= $i; ?>" name="answer-<?= $i; ?>"
                              class="form-control"
                              placeholder="Answers"
                              rows="5"
                              required></textarea>
                            <span class="login-span"></span>
                        </div>
                    <?php endfor; ?>
                    <div class="form-group login-group">
                        <label for="start_time">Start Time</label>
                        <input type="datetime-local" id="start_time" name="start_time"
                               class="form-control"
                               placeholder="Start time"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" id="end_time" name="end_time"
                               class="form-control"
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
                    <button type="submit" name="registerButton" class="btn btn-primary btn-main">Create</button>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>