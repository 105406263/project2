<header class="navbar">
  <div class="nav-left">
    <img src="images/logo.png" alt="TechEmpower Logo" class="logo" />
    <span class="brand">TechEmpower</span>
  </div>
  <nav>
    <ul class="nav-links">
      <li>
        <a
          href="index.php"
          class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"
          >Home</a
        >
      </li>
      <li>
        <a
          href="jobs.php"
          class="<?php echo basename($_SERVER['PHP_SELF']) == 'jobs.php' ? 'active' : ''; ?>"
          >Jobs</a
        >
      </li>
      <li>
        <a
          href="apply.php"
          class="<?php echo basename($_SERVER['PHP_SELF']) == 'apply.php' ? 'active' : ''; ?>"
          >Apply</a
        >
      </li>
      <li>
        <a
          href="about.php"
          class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>"
          >About</a
        >
      </li>
      <li><a href="mailto:info@techempower.com.au">Email Us</a></li>
      <li>
        <a
          href="https://github.com/105406263/project2"
          target="_blank"
          rel="noopener noreferrer"
          >GitHub</a
        >
      </li>
    </ul>
  </nav>
</header>
