<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">New Quiz - Step 1</h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form method="POST" autocomplete="off" action="<?= base_url("dashboard/quizzes/new/1"); ?>" accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;" class="form">
                    <div class="form-group login-group">
                        <input type="number" id="questions_count" name="questions_count"
                               min="1" max="10"
                               class="form-control"
                               placeholder="Questions Count"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <select name="group_id" id="group_id" class="form-control">
                            <option value="" selected disabled hidden>Choose Group</option>
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
                    <button type="submit" name="registerButton" class="btn btn-primary btn-main">Next</button>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>