<main>
  <div class="wrapper">
    <div class="login-card">
      <a href="<?= BASEURL; ?>"><h3><?= TITLE; ?></h3></a>
      <div>
        <h1 class="head">Selamat Datang</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

      </div>

      <p>© <?php echo date('Y'); ?> <?= TITLE; ?>.</p>

    </div>

    <div class="login-meta">
      <h2 class="head">Login</h2>
      <p>Selamat datang. Login untuk melakukan tinjauan artikel!.</p>
      <form action="<?= BASEURL; ?>/login/auth/login" method="post">
        <div>
          <input type="text" name="username" placeholder="Username..." required>
          <input type='password' name="password" placeholder="Password..." required>

        </div>

        <div>
          <button type="submit" name="action" value="login" class="cta">LOGIN</button>

        </div>

      </form>

    </div>

  </div>

</main>
