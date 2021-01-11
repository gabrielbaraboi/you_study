<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Home</h3>
        <div class="admin-widgets row">
            <div class="widget col-md-4">
                <h4>Your account info</h4>
                <div class="w acc-info">
                    <div class="info">
                        <ul class="list-style-none">
                            <li>
                                <i class="fas fa-hashtag second"></i>
                                <span><?= $user['id'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-user second"></i>
                                <span><?= $user['firstname'] . ' ' . $user['lastname'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-users-cog second"></i>
                                <span><?= $user['role'] ?></span>
                            </li>
                            <?php if (strcmp($user['role'], 'student') == 0): ?>
                            <li>
                                <i class="fas fa-users second"></i>
                                <span><?= $groups[$user['groups']]['name'] ?></span>
                            </li>
                            <?php endif; ?>
                            <li>
                                <i class="fas fa-envelope second"></i>
                                <span><?= $user['email'] ?></span>
                            </li>
                            <li>
                                <i class="fas fa-calendar-plus second"></i>
                                <span><?= $user['created_at'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->include('sidebar') ?>
<?= $this->endSection() ?>