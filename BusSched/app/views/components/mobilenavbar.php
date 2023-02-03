<nav>
  <div onclick="toggleMenu()" class="logo">
    <button class="menu-toggle"></button>
  </div>
  <div>
    <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.png"></a>
    <i class="fas fa-bars"></i>
  </div>
  
  <?php if (isset($_SESSION['USER'])) { ?>
    <div class="log-in">
      <button class="log-in-btn">Log Out</button>
    </div>
  <?php } else { ?>
    <div class="log-in">
      <button class="log-in-btn">Log In</button>
    </div>
    <div class="sign-up">
      <button class="sign-up-btn">Sign Up</button>
    </div>
  <?php } ?>
</nav>




