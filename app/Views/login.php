<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
<div class="card col-md-4 login">
    <div class="card-body">
            <span class="login-icon">
                <i class="fas fa-sign-in-alt"></i>
            </span>
        <h2 class="login-title">Login</h2>
        <form action="/login" autocomplete="off" accept-charset="UTF-8" method="POST" class="form">
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
            <?php if (isset($validation)): ?>
                <div class="col-12">
                    <div class="message danger"><span><?= $validation->listErrors() ?></span></div>
                </div>
            <?php endif; ?>
            <?= csrf_field() ?>
            <button type="submit" class="login-btn">Log in</button>
        </form>
    </div>
</div>
    <style>
        .main-content {
            width: 100%;
            margin: 0;
        }
        .footer {
            margin-left: 0;
        }
    </style>
<?= $this->endSection() ?>