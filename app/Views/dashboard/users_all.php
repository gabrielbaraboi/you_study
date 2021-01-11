<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">All Users</h3>
        <div class="table">
            <table id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['firstname'] . ' ' . $user['lastname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                            <td>
                                <?php if (strcmp($user['role'], 'root') != 0): ?>
                                <a class="tnTableAction" href="<?= base_url("dashboard/users/edit/{$user['id']}") ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="tnTableAction" href="<?= base_url("dashboard/users/delete/{$user['id']}") ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <? endif;?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


<?= $this->endSection() ?>