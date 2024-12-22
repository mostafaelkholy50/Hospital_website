<nav class="navbar navbar-expand-lg bg-light border-bottom border-body" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <div class="icon" style="font-size: 30px; display: inline-flex; align-items: center;">
        <i class="ri-heart-pulse-fill" style="font-size: 40px;"></i>
      </div>
      <span style="font-size: 20px; margin-left: 10px; font-weight: bold;">Hospital</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= url('pages/login.php') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= url('pages/register.php') ?>">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>