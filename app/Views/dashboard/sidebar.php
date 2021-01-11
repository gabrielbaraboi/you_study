<nav class="admin-nav">
    <div class="nav-title">
        <h4><i class="fas fa-wrench"></i> Actions</h4>
    </div>
    <div class="nav-group">
        <button class="nav-button" type="button" data-toggle="collapse" data-target="#collapse-home" aria-expanded="true" aria-controls="collapse-home">Home</button>
        <div id="collapse-home" class="collapse show">
            <ul class="list-style-none">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <i class="fas fa-home"></i>
                        <span>Homepage</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="nav-group">
        <button class="nav-button" type="button" data-toggle="collapse" data-target="#collapse-users" aria-expanded="true" aria-controls="collapse-users">Users</button>
        <div id="collapse-users" class="collapse show">
            <ul class="list-style-none">
                <li>
                    <a href="<?= base_url('dashboard/users/all'); ?>">
                        <i class="fas fa-users-cog"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/users/new'); ?>">
                        <i class="fas fa-user-plus"></i>
                        <span>Create User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="nav-group">
        <button class="nav-button" type="button" data-toggle="collapse" data-target="#collapse-groups" aria-expanded="true" aria-controls="collapse-groups">Groups</button>
        <div id="collapse-groups" class="collapse show">
            <ul class="list-style-none">
                <li>
                    <a href="<?= base_url('dashboard/groups/all'); ?>">
                        <i class="fas fa-users-cog"></i>
                        <span>Manage Groups</span>
                    </a>
                </li>
                <?php if ($currentUser['role'] != 'teacher'): ?>
                <li>
                    <a href="<?= base_url('dashboard/groups/new'); ?>">
                        <i class="fas fa-user-plus"></i>
                        <span>Create Group</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php if ($currentUser['role'] != 'admin'): ?>
    <div class="nav-group">
        <button class="nav-button" type="button" data-toggle="collapse" data-target="#collapse-groups" aria-expanded="true" aria-controls="collapse-quizzes">Quizzes</button>
        <div id="collapse-quizzes" class="collapse show">
            <ul class="list-style-none">
                <li>
                    <a href="<?= base_url('dashboard/quizzes/all'); ?>">
                        <i class="fas fa-users-cog"></i>
                        <span>Manage Quizzes</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard/quizzes/new/1'); ?>">
                        <i class="fas fa-user-plus"></i>
                        <span>Create Quiz</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php endif; ?>
</nav>
