<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouStudy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <script src="https://kit.fontawesome.com/e6f74534ae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<main class="admin-main">
    <div class="admin-menu">
        <?= $this->include('dashboard\sidebar') ?>
    </div>
    <div class="admin-content">
        <div class="admin-header">
            <div class="logo">
                <a href="#">
                    YouStudy Dashboard
                </a>
            </div>
            <div class="user-nav">
                <div class="user-info">
                    <a href="#">
                        <span class="user-name"><?= $currentUser['firstname'] . ' ' . $currentUser['lastname']; ?></span>
                    </a>
                </div>
                <ul class="user-controllers list-style-none">
                    <li><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        </div>
        <?= $this->renderSection('main') ?>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src='/js/scripts.js'></script>
</body>
</html>