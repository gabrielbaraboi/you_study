<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New User</h3>
        <form method="POST" action="<?= base_url("dashboard/quizzes/new/1"); ?>" accept-charset="UTF-8"
              onsubmit="registerButton.disabled = true; return true;" class="form">
            <div class="form-group login-group">
                <input type="number" id="questions_count" name="questions_count"
                       min="1" max="8"
                       class="login-form"
                       required>
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <select name="group_id" id="group_id" class="login-form">
                    <?php foreach ($groups as $group): ?>
                        <?php if (unserialize($currentUser['groups'])): if (in_array($group['id'], unserialize($currentUser['groups']))): ?>
                            <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                        <?php endif; endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <button type="submit" name="registerButton" class="login-btn">Register</button>
        </form>
    </div>


<?= $this->endSection() ?>