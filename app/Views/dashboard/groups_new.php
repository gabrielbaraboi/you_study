<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New Group</h3>
        <form method="POST" action="<?= base_url("dashboard/groups/new"); ?>" accept-charset="UTF-8"
              onsubmit="addButton.disabled = true; return true;" class="form">
            <div class="form-group login-group">
                <input type="text" name="name" id="name"
                       class="login-form"
                       value="<?= old('name') ?>"
                       placeholder="Group Name"
                       required>
                <span class="login-span"></span>
            </div>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <button type="submit" name="addButton" class="login-btn">Add</button>
        </form>
    </div>


<?= $this->endSection() ?>