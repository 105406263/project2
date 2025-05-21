<!-- header.inc -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Discover career opportunities at TechEmpower – an innovative IT company empowering the next generation of tech leaders."
    />
    <meta name="author" content="Soad" />
    <meta
      name="keywords"
      content="TechEmpower, Software Development, IT Careers, Job Applications, Web Design, Software Jobs, Tech Roles"
    />

    <title>
      <?php echo isset($page_title) ? $page_title : "TechEmpower Careers"; ?>
    </title>

    <link rel="stylesheet" href="styles/styles.css" />
  </head>

  <body
    class="<?php echo isset($body_class) ? $body_class : 'default'; ?>"
  ></body>
</html>
