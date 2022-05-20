<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= site_url('/css/auto-complete.css') ?>">
    
    <!-- BootStrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6ca1324f65.js" crossorigin="anonymous"></script>
    <title><?= $this->renderSection("title") ?></title>
</head>
<body>
    <section class="section">

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="<?= site_url('/') ?>"><?= lang('App.nav.home') ?></a>

                <a class="navbar-item" href="<?= site_url('/en') ?>">English</a>

                <a class="navbar-item" href="<?= site_url('/es') ?>">Espanol</a>
            </div>

            <div class="navbar-end">
                <?php if(current_user()): ?>

                    <div class="navbar-item"><?= lang('App.nav.hello') ?> <?= esc(current_user()->name) ?></div>

                    <?php if (current_user()->is_admin): ?>
                        
                        <a class="navbar-item" href="<?= site_url('/admin/users') ?>"><?= lang('App.nav.users') ?></a>
                    <?php endif; ?>

                    <a class="navbar-item" href="<?=site_url('/tasks') ?>"><?= lang('App.nav.tasks') ?></a>
                    <a class="navbar-item" href="<?= site_url('/profile/show') ?>"><?= lang('App.nav.profile') ?></a>
                    <a class="navbar-item" href="<?= site_url('/logout') ?>"><?= lang('App.nav.logout') ?></a>
                <?php else: ?>

                    <a class="navbar-item" href="<?= site_url("/$locale/signup")?>"><?= lang('App.nav.signup') ?></a>
                    <a class="navbar-item" href="<?= site_url("/$locale/login") ?>"><?= lang('App.nav.login') ?></a>

                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php if(session()->has('warning')): ?>
        <div class="is-warning notification is-light">
            <button class="delete"></button>
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->has('info')): ?>
        <div class="notification is-info is-light">
            <button class="delete"></button>
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <?= session('error') ?>
        </div>
    <?php endif; ?>
    <?= $this->renderSection("content") ?>
    </section>
    <script src="<?= site_url('/js/app.js') ?>"></script>
</body>
</html>