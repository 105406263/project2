<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Enhancements | TechEmpower Careers</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="jobs-page">

  <?php include("header.inc"); ?>
  <?php include("nav.inc"); ?>

  <main class="job-container">
    <h1>Project Enhancements</h1>

    <section class="job-card">
      <div class="job-info">
        <h2>1. Sort EOIs by Field</h2>
        <p>
          The HR manager can now sort submitted EOIs by any of the following fields:
          <strong>EOI Number</strong>, <strong>Job Reference</strong>, <strong>First Name</strong>, <strong>Last Name</strong>, <strong>Email</strong>, or <strong>Status</strong>.
        </p>
        <p>
          This enhancement improves usability and makes it easier to manage large numbers of applications.
        </p>
        <img src="images/sort_eoi.png" alt="Sort EOIs Screenshot">
      </div>
    </section>

    <section class="job-card">
      <div class="job-info">
        <h2>2. Manager Registration & Login System</h2>
        <p>
          A registration page (`register.php`) was created with server-side validation to ensure unique usernames
          and strong passwords. A login page (`login.php`) authenticates managers and provides access to `manage.php`.
        </p>
        <p>
          On three failed login attempts, access to the site is temporarily disabled for that session.
        </p>
        <img src="images/login.png" alt="Manager Login Screenshot">
      </div>
    </section>

  </main>

  <?php include("footer.inc"); ?>
</body>
</html>
