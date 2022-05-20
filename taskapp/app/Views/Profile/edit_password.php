<?= $this->extend('layouts/default') ?> 

<?= $this->section('title') ?> Edit Password <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="title">Edit Password</h1>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li style="color: red;"><?= $error ?></li>
            <?php endforeach ?>  
        </ul>
    <?php endif ?>
    <div class="container">

        <?= form_open("/profile/updatepassword") ?>
        
            <div class="field">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="cu rrent_password" >
            </div>
            
            <div class="field">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" >
            </div>
            
            <div class="field">
                <label for="password_confirmation">Repeat New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" >
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary">Update</button>
                </div>
                <div class="control">
                    <a class="button" href="<?= site_url("/profile/show/") ?>">Cancel</a>
                </div>
            </div>
            
        </form>
    </div>
<?= $this->endSection() ?>