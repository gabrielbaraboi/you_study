<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">Edit User #<?= $user['id'] ?></h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="<?= base_url("dashboard/users/edit/{$user['id']}"); ?>"
                      accept-charset="UTF-8"
                      onsubmit="registerButton.disabled = true; return true;" class="form">
                    <div class="form-group login-group">
                        <input type="text" name="firstname" id="firstname"
                               class="form-control"
                               value="<?= $user['firstname'] ?>"
                               placeholder="First Name"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <input type="text" name="lastname" id="lastname"
                               class="form-control"
                               value="<?= $user['lastname'] ?>"
                               placeholder="Last Name"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <input type="email" name="email" id="email"
                               class="form-control"
                               value="<?= $user['email'] ?>"
                               placeholder="Email"
                               required>
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <select name="role" id="role" class="form-control">
                            <option value="admin" <?php if (strcmp($user['role'], 'admin') == 0): ?> selected <?php endif; ?>>
                                Admin
                            </option>
                            <option value="teacher" <?php if (strcmp($user['role'], 'teacher') == 0): ?> selected <?php endif; ?>>
                                Teacher
                            </option>
                            <option value="student" <?php if (strcmp($user['role'], 'student') == 0): ?> selected <?php endif; ?>>
                                Student
                            </option>
                        </select>
                    </div>
                    <?php if (strcmp($user['role'], 'teacher') == 0): ?>
                        <div class="form-group login-group">
                            <select name="userGroups[]" id="userGroups" class="form-control"
                                    multiple="multiple"
                                    size="5">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group['id']; ?>"<?php if (unserialize($user['groups'])): if (in_array($group['id'], unserialize($user['groups']))): ?> selected='selected'<?php endif; endif; ?>><?php echo $group['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php elseif (strcmp($user['role'], 'student') == 0): ?>
                        <div class="form-group login-group">
                            <select name="userGroup" id="userGroup" class="form-control">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?= $group['id']; ?>"<?php if ($group['id'] == $user['groups']): ?> selected <?php endif; ?>><?= $group['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="form-group login-group">
                        <input type="password" name="password" id="password"
                               class="form-control"
                               value=""
                               placeholder="Password">
                        <span class="login-span"></span>
                    </div>
                    <div class="form-group login-group">
                        <input type="password" name="password_confirm" id="password"
                               class="form-control"
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
                    <button type="submit" name="registerButton" class="btn btn-primary btn-main">Edit</button>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>