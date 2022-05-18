<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- BootStrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>

    <a href="<?= site_url('/') ?>">Home</a>
    <?php if(current_user()): ?>

        <p class="ms-auto">Hello <?= esc(current_user()->name) ?></p>

        <?php if (current_user()->is_admin): ?>
            
            <a href="<?= site_url('/admin/users') ?>">Show Users</a>
        <?php endif; ?>
        <a href="<?=site_url('/tasks') ?>">Tasks</a>
        <a href="<?= site_url('/profile/show') ?>">My Profile</a>
        <a href="<?= site_url('/logout') ?>">Logout</a>
    <?php else: ?>

        <a href="<?= site_url('/signup')?>">Signup Now</a>
        <a href="<?= site_url('/login') ?>">Login</a>

    <?php endif; ?>

    <?php if(session()->has('warning')): ?>
        <div class="warning">
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->has('info')): ?>
        <div class="info">
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="error">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <?= $this->renderSection("content") ?>
</body>
</html>