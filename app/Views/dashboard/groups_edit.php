<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Edit Group #<?= $group['id'] ?></h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form method="POST" autocomplete="off" action="<?= base_url("dashboard/groups/edit/{$group['id']}"); ?>"
                      accept-charset="UTF-8"
                      onsubmit="addButton.disabled = true; return true;" class="form">
                    <div class="form-group login-group">
                        <input type="text" name="name" id="name"
                               class="form-control"
                               value="<?= $group['name'] ?>"
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
                    <button type="submit" name="registerButton" class="btn btn-primary btn-main">Edit</button>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>