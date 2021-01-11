<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">All Users</h3>
        <div class="table">
            <table id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher</th>
                    <th>Group</th>
                    <th>Questions</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $quiz['id']; ?></td>
                        <td>
                            <?php foreach ($teachers as $teacher):
                                if (in_array($quiz['teacher_id'], $teacher)): echo $teacher['firstname'] . ' ' . $teacher['lastname']; break; endif;
                            endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($groups as $group):
                                if (in_array($quiz['group_id'], $group)): echo $group['name']; break; endif;
                            endforeach; ?>
                        </td>
                        <td><?= $quiz['questions_count']; ?></td>
                        <td><?= $quiz['start_time']; ?></td>
                        <td><?= $quiz['end_time']; ?></td>
                        <?php if ($currentUser['role'] == 'admin' or $currentUser['role'] == 'root'): ?>
                            <td>
                                <a class="tnTableAction" href="<?= base_url("dashboard/quizzes/delete/{$quiz['id']}") ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?= $this->endSection() ?>