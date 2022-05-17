<?= $this->extend("layouts/default")?>

<?= $this->section('title') ?> Users <?= $this->endSection() ?>

<?= $this->section("content") ?>
    
    <h1>Users</h1>

    <a href="<?= site_url("/admin/users/new") ?>">Create New Users</a>

    <?php if($users): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
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
                        <td><?= $user->is_admin ? "Yes" : 'No' ?></td>
                        <td><?= $user->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
            </table>
        <?= $pager->links() ?>

    <?php else: ?>

        <p>No users found</p>

    <?php endif; ?>
<?= $this->endSection()?>