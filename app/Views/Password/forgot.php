<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Forgot Password <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title">Forgot Password</h1>
<div class="container">

<?= form_open("/$locale/password/processforgot") ?>

    <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
            <input  class="input" type="text" name="email" id="email" value="<?= old('email') ?>">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
                Reset Password
            </button>
        </div>
    </div>
</form>
    
</div>

<?= $this->endSection() ?>