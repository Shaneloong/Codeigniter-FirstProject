<?= $this->extend("layouts/default")?>

<?= $this->section('title') ?> Users <?= $this->endSection() ?>

<?= $this->section("content") ?>
    
    <h1 class="title">Users</h1>

    <a class="button is-link" href="<?= site_url("/admin/users/new") ?>">Create New Users</a>

    <?php if($users): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Administrator</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td>
                            <a href="<?=site_url("/admin/users/show/" .  $user->id)?>"><?= esc($user->name) ?></a>
                        </td>
                        <td><?= esc($user->email) ?></td>
                        <td><?= $user->is_active ? "Yes" : "No" ?></td>
                        <td><?= $user->is_admin ? "Yes" : 'No' ?></td>
                        <td><?= $user->created_at->humanize() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
            </table>
        <?= $pager->simpleLinks() ?>

    <?php else: ?>

        <p>No users found</p>

    <?php endif; ?>
<?= $this->endSection()?>
