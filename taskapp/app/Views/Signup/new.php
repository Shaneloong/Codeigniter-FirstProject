<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Sign Up <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Signup</h1>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <?= form_open("/Signup/create") ?>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= old('name') ?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="">
        </div>
        
        <div>
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" value="">
        </div>
        

    <button class="btn btn-primary">Sign up</button>
    <a href="<?= site_url("/") ?>" class="btn btn-primary">Cancel</a>

    </form>
<?= $this->endSection() ?>