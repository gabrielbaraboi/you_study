<?= $this->extend('dashboard\layout') ?>
<?= $this->section('main') ?>
    <div class="admin-body">
        <h3 class="admin-page-title">All Users</h3>
        <div class="table">
            <table id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Teacher</th>
                    <th>Group</th>
                    <th>Student</th>
                    <th>Mark</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $quiz['id']; ?></td>
                        <td><?= $quiz['title']; ?></td>
                        <td>
                            <?php foreach ($teachers as $teacher):
                                if (in_array($quiz['teacher_id'], $teacher)): echo $teacher['firstname'] . ' ' . $teacher['lastname']; break; endif;
                            endforeach; ?>
                        </td>
                        <td><?= $quiz['group_name']; ?></td>
                        <td><?= $quiz['student']; ?></td>
                        <td><?= $quiz['mark']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?= $this->endSection() ?>