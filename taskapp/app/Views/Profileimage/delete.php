<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> Delete Profile Image <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">Delete Profile Image </h1> 
    <p>Are you sure?</p>

    <?= form_open("/profileimage/delete") ?>
        <button class="btn btn-primary">Yes</button>
        <a href="<?= site_url('/profile/show/') ?>">No</a>
    </form>
<?= $this->endSection() ?>