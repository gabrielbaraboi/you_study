<div class="main-menu">
    <div class="menu-content">
        <div class="logo">
            <a href="<?= base_url('/') ?>">YouStudy</a>
        </div>
        <div class="user-bar">
            <div class="user-welcome">
                <?php if (session('isLoggedIn')): ?>
                    <div class="user-avatar">
                        <span><?= substr($user['firstname'], 0,  1) . substr($user['lastname'], 0,  1) ?></span>
                    </div>
                    <span class="welcome-text">Hello, <?= $user['firstname'] . ' ' . $user['lastname']; ?></span>
                    <div class="user-controls">
                        <ul class="list-style-none">
                            <li><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if (session('isLoggedIn')): ?>
        <nav class="navbar navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dreamvibe-navbar" aria-controls="dreamvibe-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dreamvibe-navbar">
                <div class="nav-group">
                    <h6 class="nav-title">General</h6>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <span class="nav-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/quizzes') ?>">
                                <i class="nav-icon fas fa-file-contract"></i>
                                <span class="nav-text">Quizzes</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php if (strcmp($user['role'], 'student') != 0): ?>
                    <div class="nav-group">
                        <h6 class="nav-title">Secret</h6>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
        </nav>
        <?php endif; ?>
    </div>
</div>
