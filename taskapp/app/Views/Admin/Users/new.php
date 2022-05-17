<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Create User <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>New User</h1>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <?= form_open("/admin/users/create") ?>
    
        <?=  $this->include('admin/users/form') ?>
    
    <button>Save</button>
    <a href="<?= site_url("/admin/users") ?>">Cancel</a>

    </form>
<?= $this->endSection() ?>