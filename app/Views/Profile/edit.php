<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Edit Profile <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">Edit Profile</h1>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <?= form_open("/profile/update") ?>
    
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= old('name', esc($user->name)) ?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email', esc($user->email)) ?>">
        </div>

    <button>Update</button>
    <a href="<?= site_url("/profile/show/") ?>">Cancel</a>

    </form>
<?= $this->endSection() ?>