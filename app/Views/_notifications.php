<?php if (session()->has('success')) : ?>
    <div class="notification success">
        <?= session('success') ?>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="notification error">
        <?= session('error') ?>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <ul class="notification error">
        <
    </ul>
<?php endif ?>
