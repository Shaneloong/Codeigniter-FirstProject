<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?> User <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">User </h1> 
    <a class="button is-link" href="<?= site_url('/admin/users') ?>">&laquo; Back to index</a>
    <div class="content">
        <dl>
            <dt class="has-text-weight-bold">Name</dt>
            <dd><?= esc($user->name) ?></dd>
    
            <dt class="has-text-weight-bold">Email</dt>
            <dd><?= esc($user->email)?></dd>
    
            <dt class="has-text-weight-bold">Administrator</dt>
            <dd><?= $user->is_admin ? "Yes" : "No" ?></dd>
    
            <dt class="has-text-weight-bold">Active</dt>
            <dd><?= $user->is_active ? "Yes" : "No" ?></dd>
    
            <dt class="has-text-weight-bold">Created at</dt>
            <dd><?= $user->created_at->humanize() ?></dd>
    
            <dt class="has-text-weight-bold">Updated at</dt>
            <dd><?= $user->updated_at->humanize() ?></dd>
        </dl>
    </div>

    <a class="button is-link" href="<?= site_url('/admin/users/edit/' . $user->id) ?>">Edit</a>
    <?php if(current_user()->id !== $user->id): ?>
        <a class="button is-danger is-light" href="<?= site_url('/admin/users/delete/' . $user->id) ?>">Delete User</a>
    <?php endif; ?>
<?= $this->endSection() ?>