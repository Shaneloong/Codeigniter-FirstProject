<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Edit User <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">Edit User</h1>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <?= form_open("/admin/users/update/". $user->id) ?>
    
        <?= $this->include('Admin/Users/form') ?>
    
    <button>Update</button>
    <a href="<?= site_url("/admin/users/show/". $user->id) ?>">Cancel</a>

    </form>
<?= $this->endSection() ?>