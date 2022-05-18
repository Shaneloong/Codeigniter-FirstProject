<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Password Reset<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Password reset</h1>

<p>Password Reset Succesfully</p>

<p><a href="<?= site_url('/login') ?>">Login</a></p>
<?= $this->endSection() ?>
