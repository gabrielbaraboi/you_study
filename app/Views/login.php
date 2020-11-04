<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
<div class="card col-md-4 login">
    <div class="card-body">
            <span class="login-icon">
                <i class="fas fa-sign-in-alt"></i>
            </span>
        <h2 class="login-title">Login</h2>
        <form action="/login" accept-charset="UTF-8" method="POST" class="form">
            <div class="form-group login-group">
                <input type="email" name="email" id="email"
                       class="login-form"
                       value="">
                <span class="login-span email"></span>
            </div>
            <div class="form-group login-group">
                <input type="password" name="password" id="password"
                       class="login-form">
                <span class="login-span password"></span>
            </div>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <p class="text-align-center">
                <a href="<?= base_url('forgot-password'); ?>">Forgot your password?</a><br>
                <a href="<?= base_url('register'); ?>">You do not have an account?</a>
            </p>
            <button type="submit" class="login-btn">Log in</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>