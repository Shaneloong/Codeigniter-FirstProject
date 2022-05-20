<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Password Reset <?= $this->endSection() ?>

<?= $this->section('content') ?> 

<h1 class="title">Password reset</h1>

<?php if(session()->has('errors')): ?>
    <ul class="notification is-danger is-light">
        <button class="delete"></button>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<div class="container">
    <?= form_open("/$locale/password/processreset/$token") ?> 

        <div class="field">
            <label class="label" for="password">Password</label>
            <div class="control">
                <input class="input" type="password" name="password" id="password">
            </div>
        </div>

        <div class="field">
            <label class="label" for="password_confirmation">Repeat Password</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-primary">Reset Password</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

