<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Login <?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mx-auto my-4 w-25">
    <h1 class="text-center">Login</h1>

    <?= form_open("/Login/create") ?>

        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= old('email') ?>">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="">
        </div>

        <div>
            <button class="btn btn-primary">Login</button>
            <a href="<?= site_url("/password/forgot") ?>" class="">Forgot Password</a>
        </div>


    </form>
</div>
    
<?= $this->endSection() ?>