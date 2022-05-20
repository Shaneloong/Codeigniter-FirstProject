<div class="field">
    <label class="label" for="name">Name</label>
    <div class="control">
        <input class="input" type="text" name="name" id="name" value="<?= old('name', esc($user->name)) ?>">
    </div>
</div>

<div class="field">
    <label class="label" for="email">Email</label>
    <input class="input" type="email" name="email" id="email" value="<?= old('email', esc($user->email)) ?>">
</div>

<div class="field">
    <label class="label" for="password">Password</label>
    <div class="control">
        <input class="input" type="password" name="password" id="password" value="">
    </div>
    <?php if($user->id): ?>
    <p class="help">Leave Blank to keep existing password</p>
    <?php endif; ?>
</div>

<div class="field">
    <label class="label" for="password_confirmation">Password Confirmation</label>
    <div class="control">
        <input class="input" type="password" name="password_confirmation" id="password_confirmation" value="">
    </div>
</div>

<div class="field">
    <label class="checkbox" for="is_active">
        <?php if($user->id == current_user()->id): ?>
            <input type="checkbox" checked disabled> Active
        <?php else: ?>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1"
            <?php if(old('is_active', $user->is_active)): ?> checked <?php endif; ?>> Active
        <?php endif; ?>
    </label>
</div>

<div class="field">
    <label class="checkbox" for="is_admin">
        <?php if($user->id == current_user()->id): ?>
            <input type="checkbox" checked disabled> Administrator
        <?php else: ?>
            <input type="hidden" name="is_admin" value="0">
            <input type="checkbox" name="is_admin" id="is_admin" value="1"
            <?php if(old('is_admin', $user->is_admin)): ?> checked <?php endif; ?>> Administrator
        <?php endif; ?>
    </label>
</div>

