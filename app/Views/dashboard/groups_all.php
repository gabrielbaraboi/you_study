<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">All Groups</h3>
        <div class="table">
            <table id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?= $group['id']; ?></td>
                        <td><?= $group['name']; ?></td>
                        <td>
                            <a class="tnTableAction" href="<?= base_url("dashboard/groups/edit/{$group['id']}") ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>