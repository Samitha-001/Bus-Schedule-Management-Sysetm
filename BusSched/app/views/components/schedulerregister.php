<form action="" method="post">
    <br>
    <input type="email" id="email" name="email" placeholder="Email address..." required>
    <br>
    <input type="text" id="username" name="username" placeholder="Username..." required>
    <br>
    <input type="password" id="password" name="password" placeholder="Password..." required>
    <br>
    <input type="password" id="pwdRepeat" name="pwdRepeat" placeholder="Confirm password..." required>
    <button class="button-orange" type="submit">Sign Up</button>
    <div class="errors">
        <?php if (!empty($errors)) : ?>
            <?= implode("<br>", $errors) ?>
        <?php endif; ?>
    </div>
</form>
<div class="create_account">
    <p style="color: #24315e; text-align:center;">Already have an account? <a href="<?= ROOT ?>/login">Login</a></p>
</div>