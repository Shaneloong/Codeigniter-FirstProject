<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Create User <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">New User</h1>
    <?php if (session()->has('errors')): ?>
        <ul class="notification is-danger is-light">
            <button class="delete"></button>
            <?php foreach (session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <div class="container">

    
        <?= form_open("/admin/users/create") ?>
        
            <?=  $this->include('admin/users/form') ?>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Save</button>
            </div>
            <div class="control">
                <a class="button" href="<?= site_url("/admin/users") ?>">Cancel</a>
            </div>
        </div>

        </form>
    </div>
<?= $this->endSection() ?>