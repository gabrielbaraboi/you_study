<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title"><?= $quiz['title'] ?></h3>
        <div class="admin-widgets row">
                    <div class="widget col-md-3">
                        <div class="w acc-info">
                            <div class="info">
                                <ul class="list-style-none">
                                    <li>
                                        <i class="fas fa-user second"></i>
                                        <span><?= $user['firstname'] . ' ' . $user['lastname'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fas fa-question second"></i>
                                        <span><?= $quiz['questions_count'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock second"></i>
                                        <span><?= $quiz['start_time'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock second"></i>
                                        <span><?= $quiz['end_time'] ?></span>
                                    </li>
                                    <li>
                                        <i class="fas fa-poll second"></i>
                                        <span><?= $mark ?></span>
                                    </li>
                                </ul>
                                <br>
                                <?php if ($start and strcmp($user['role'], 'student') == 0): ?>
                                    <a href="<?= base_url('quiz/' . $quiz['id'] . '/answer') ?>">
                                        <button type="submit" name="registerButton" class="btn btn-primary btn-main">Start Quiz</button>
                                    </a>
                                <?php else:?>
                                    <button class="btn btn-primary btn-main disabled">Start Quiz</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>