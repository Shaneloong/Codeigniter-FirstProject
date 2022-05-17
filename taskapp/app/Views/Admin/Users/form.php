<div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= old('name', esc($user->name)) ?>">
</div>

<div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= old('email', esc($user->email)) ?>">
</div>

<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="">
    <?php if($user->id): ?>
    <p>Leave Blank to keep existing password</p>
    <?php endif; ?>
</div>

<div>
    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" name="password_confirmation" id="password_confirmation" value="">
</div>

<div>

    <label for="is_admin">
        <?php if($user->id == current_user()->id): ?>
            <input type="checkbox" checked disabled> Administrator
        <?php else: ?>
            <input type="hidden" name="is_admin" value="0">
            <input type="checkbox" name="is_admin" id="is_admin" value="1"
            <?php if(old('is_admin', $user->is_admin)): ?> checked <?php endif; ?>> Administrator
        <?php endif; ?>
    </label>
</div>