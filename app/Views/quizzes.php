<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Quizzes</h3>
        <div class="admin-widgets row">
            <?php foreach ($quizzes as $quiz): ?>
                <?php if ($user['groups'] == $quiz['group_id'] or $user['id'] == $quiz['teacher_id'] or strcmp($user['role'], 'root') == 0): ?>
                    <div class="widget col-md-3">
                        <h4><a href="<?= base_url('quizzes/' . $quiz['id']) ?>"><?= $quiz['title'] ?></a></h4>
                        <div class="w acc-info">
                            <div class="info">
                                <ul class="list-style-none">
                                    <li>
                                        <i class="fas fa-user second"></i>
                                        <span><?= $currentUser['firstname'] . ' ' . $user['lastname'] ?></span>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>