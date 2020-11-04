<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
    <div class="card col-md-4 login">
        <div class="card-body">
            <span class="login-icon">
                <i class="fas fa-user-plus"></i>
            </span>
            <h2 class="login-title">Register</h2>
            <form method="POST" action="/register" accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;" class="form">
                <div class="form-group login-group">
                    <input type="text" name="firstname" id="firstname"
                           class="login-form"
                           value="<?= old('firstname') ?>"
                           placeholder ="First Name"
                           required>
                    <span class="login-span firstname"></span>
                </div>
                <div class="form-group login-group">
                    <input type="text" name="lastname" id="lastname"
                           class="login-form"
                           value="<?= old('lastname') ?>"
                           placeholder ="Last Name"
                           required>
                    <span class="login-span lastname"></span>
                </div>
                <div class="form-group login-group">
                    <input type="email" name="email" id="email"
                           class="login-form"
                           value="<?= old('email') ?>"
                           placeholder ="Email"
                           required>
                    <span class="login-span email"></span>
                </div>
                <div class="form-group login-group">
                    <input type="password" name="password" id="password"
                           class="login-form"
                           value=""
                           placeholder ="Password"
                           required>
                    <span class="login-span password"></span>
                </div>
                <div class="form-group login-group">
                    <input type="password" name="password_confirm" id="password"
                           class="login-form"
                           value=""
                           placeholder ="Confirm Password"
                           required>
                    <span class="login-span password_confirm"></span>
                </div>
                <?php if (isset($validation)): ?>
                    <div class="col-12">
                        <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                    </div>
                <?php endif; ?>
                <?= csrf_field() ?>
                <p class="text-align-center">
                    <a href="<?= base_url('login'); ?>">Already registered? Log in!</a>
                </p>
                <button type="submit" name="registerButton" class="login-btn">Register</button>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>