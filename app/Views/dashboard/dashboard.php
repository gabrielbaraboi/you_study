<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Dashboard</h3>
        <div class="admin-widgets row">
            <div class="widget col-md-4">
                <h4>Your account info</h4>
                <div class="w acc-info">
                    <div class="info">
                        <ul class="list-style-none">
                            <li>
                                <i class="fas fa-hashtag second"></i>
                                <span><?= $currentUser['id'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-user second"></i>
                                <span><?= $currentUser['firstname'] . ' ' . $currentUser['lastname'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-users-cog second"></i>
                                <span><?= $currentUser['role'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-envelope second"></i>
                                <span><?= $currentUser['email'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-calendar-plus second"></i>
                                <span><?= $currentUser['created_at'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="widget col-md-4">
                <h4>Site statistics</h4>
                <div class="widget-content site-stats">
                    <div class="stats-info">
                        <i class="fas fa-users"></i>
                        <span class="count"><?= $students ?></span>
                        <span class="details">Total Students</span>
                    </div>
                    <div class="stats-info">
                        <i class="fas fa-users"></i>
                        <span class="count"><?= $teachers ?></span>
                        <span class="details">Total Teachers</span>
                    </div>
                    <div class="stats-info">
                        <i class="fas fa-comments"></i>
                        <span class="count"><?= $groups ?></span>
                        <span class="details">Total Groups</span>
                    </div>
                    <div class="stats-info">
                        <i class="fas fa-comment-dots"></i>
                        <span class="count"><?= $quizzes ?></span>
                        <span class="details">Total Quizzes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>