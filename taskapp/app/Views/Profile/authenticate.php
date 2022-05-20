<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Edit Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="title">Edit Profile</h1>

<p>Please enter your password to continue</p>

<div class="container mt-6">

    <?= form_open("/profile/processauthenticate") ?>
        <div class="field">
            <label class="label" for="password">Password</label>
            <div class="control">
                <input class="input" type="password" name="password">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Send</button>
            </div>
            <div class="control">
                <a href="<?= site_url('/profile/show') ?>" class="button">Cancel</a>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>