<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">All Users</h3>
        <div class="table">
            <table id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['firstname'] . ' ' . $user['lastname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                            <td>
                                <a class="tnTableAction" href="<?= base_url("dashboard/users/edit/{$user['id']}") ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if ($user['role'] == 'teacher'): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#assignTeacherModal">
                                        <i class="fas fa-users"></i>
                                    </button>
                                <?php endif; ?>
                                <?php if ($user['role'] == 'student'): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#assignStudentModal">
                                        <i class="fas fa-users"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="assignTeacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Assign groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url("dashboard/groups/assign/{$user['id']}"); ?>"
                          accept-charset="UTF-8"
                          onsubmit="assignButton.disabled = true; return true;" class="form">
                        <div class="form-group login-group">
                            <select name="userGroups[]" id="userGroups" class="form-control" multiple="multiple"
                                    size="5">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group['id']; ?>"<?php if (unserialize($user['groups'])): if (in_array($group['id'], unserialize($user['groups']))): ?> selected='selected'<?php endif; endif; ?>><?php echo $group['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= csrf_field() ?>
                        <button type="submit" name="assignButton" class="btn btn-primary">Assign</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Assign groups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url("dashboard/groups/assign/{$user['id']}"); ?>"
                          accept-charset="UTF-8"
                          onsubmit="assignButton.disabled = true; return true;" class="form">
                        <div class="form-group login-group">
                            <select name="userGroup" id="userGroup" class="form-control">
                                <?php foreach ($groups as $group): ?>
                                    <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= csrf_field() ?>
                        <button type="submit" name="assignButton" class="btn btn-primary">Assign</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>