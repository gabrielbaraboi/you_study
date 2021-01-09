<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Edit User #<?= $user['id'] ?></h3>
        <form method="POST" action="<?= base_url("dashboard/users/edit/{$user['id']}"); ?>" accept-charset="UTF-8"
              onsubmit="registerButton.disabled = true; return true;" class="form">
            <div class="form-group login-group">
                <input type="text" name="firstname" id="firstname"
                       class="login-form"
                       value="<?= $user['firstname'] ?>"
                       placeholder="First Name"
                       required>
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <input type="text" name="lastname" id="lastname"
                       class="login-form"
                       value="<?= $user['lastname'] ?>"
                       placeholder="Last Name"
                       required>
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <input type="email" name="email" id="email"
                       class="login-form"
                       value="<?= $user['email'] ?>"
                       placeholder="Email"
                       required>
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <input type="password" name="password" id="password"
                       class="login-form"
                       value=""
                       placeholder="Password">
                <span class="login-span"></span>
            </div>
            <div class="form-group login-group">
                <input type="password" name="password_confirm" id="password"
                       class="login-form"
                       value=""
                       placeholder="Confirm Password">
                <span class="login-span"></span>
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