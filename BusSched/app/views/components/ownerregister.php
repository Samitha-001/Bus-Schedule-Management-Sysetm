<form>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Username..." required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email address..." required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Password..." required>
    <label for="confirm-password">Confirm Password:</label>
    <input type="password" id="pwdRepeat" name="confirm-password" placeholder="Confirm password..." required>
</form>
<button class="button-orange" type="submit">Sign Up</button>
<div class="errors">
    <?php if (!empty($errors)) : ?>
        <?= implode("<br>", $errors) ?>
    <?php endif; ?>
</div>
<div class="create_account">
    <p style="color: #24315e; text-align:center;">Already have an account? <a href="<?= ROOT ?>/login">Login</a></p>
</div>