<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Delete User <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Delete User </h1> 
    <p>Are you sure?</p>

    <?= form_open("/admin/users/delete/". $user->id) ?>
        <button class="btn btn-primary">Yes</button>
        <a href="<?= site_url('admin/users/show/' . $user->id) ?>">No</a>
    </form>
<?= $this->endSection() ?>