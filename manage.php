<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

require_once("settings.php");

// Connect to DB
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
  echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage EOIs</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<main>
  <h1>Manage Expressions of Interest (EOIs)</h1>
  <p>Use the forms below to manage job applications submitted by users.</p>

  <!-- SORT FORM -->
  <section>
    <h2>Sort EOIs</h2>
    <form method="get" action="manage.php">
      <label for="sort_by">Sort EOIs by:</label>
      <select name="sort_by" id="sort_by">
        <option value="EOInumber">EOI Number</option>
        <option value="jobRef">Job Reference</option>
        <option value="firstName">First Name</option>
        <option value="lastName">Last Name</option>
        <option value="email">Email</option>
        <option value="status">Status</option>
      </select>
      <input type="submit" name="sort" value="Sort">
    </form>

    <?php
    if (isset($_GET["sort"])) {
      $valid_fields = ['EOInumber', 'jobRef', 'firstName', 'lastName', 'email', 'status'];
      $sortBy = in_array($_GET["sort_by"], $valid_fields) ? $_GET["sort_by"] : 'EOInumber';

      $query = "SELECT * FROM eoi ORDER BY $sortBy";
      $result = mysqli_query($conn, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3>Sorted EOIs:</h3><table border='1' cellpadding='8'>";
        echo "<tr><th>EOI #</th><th>Job Ref</th><th>Name</th><th>Email</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['EOInumber']}</td>
        <td>{$row['JobReferenceNumber']}</td>
        <td>{$row['FirstName']} {$row['LastName']}</td>
        <td>{$row['Emailaddress']}</td>
        <td>{$row['status']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "<p>No EOIs found for sorting.</p>";
      }
    }
    ?>
  </section>

  <!-- SEARCH FORM -->
  <section>
    <h2>Search EOIs</h2>
    <form method="post" action="manage.php">
      <label for="job_ref">Job Ref:</label>
      <input type="text" name="job_ref" id="job_ref"><br><br>
      
      <label for="first_name">First Name:</label>
      <input type="text" name="first_name" id="first_name"><br><br>
      
      <label for="last_name">Last Name:</label>
      <input type="text" name="last_name" id="last_name"><br><br>
      
      <input type="submit" name="search" value="Search">
    </form>

    <?php
    if (isset($_POST["search"])) {
      $jobRef = trim($_POST["job_ref"]);
      $firstName = trim($_POST["first_name"]);
      $lastName = trim($_POST["last_name"]);
    
      $query = "SELECT * FROM eoi WHERE 1=1";
      if (!empty($jobRef)) $query .= " AND JobReferenceNumber LIKE '%$jobRef%'";
      if (!empty($firstName)) $query .= " AND FirstName LIKE '%$firstName%'";
      if (!empty($lastName)) $query .= " AND LastName LIKE '%$lastName%'";
    
      $result = mysqli_query($conn, $query);
    
      if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3>Search Results:</h3><table border='1' cellpadding='8'>";
        echo "<tr><th>EOI #</th><th>Job Ref</th><th>Name</th><th>Email</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['EOInumber']}</td>
                  <td>{$row['JobReferenceNumber']}</td>
                  <td>{$row['FirstName']} {$row['LastName']}</td>
                  <td>{$row['Emailaddress']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "<p>No EOIs found matching your criteria.</p>";
      }
    }
    
    ?>
  </section>

  <!-- UPDATE STATUS -->
  <section>
  <h2>Update EOI Status</h2>
  <form method="post" action="manage.php">
    <label for="eoi_num">EOI Number:</label>
    <input type="text" name="eoi_num" id="eoi_num"><br><br>
    
    <label for="new_status">New Status:</label>
    <input type="text" name="new_status" id="new_status"><br><br>
    
    <input type="submit" name="update" value="Update Status">
  </form>

  <?php
  if (isset($_POST["update"])) {
    $eoiNum = trim($_POST["eoi_num"]);
    $newStatus = trim($_POST["new_status"]);

    if (!empty($eoiNum) && !empty($newStatus)) {
      $updateQuery = "UPDATE eoi SET status = '$newStatus' WHERE EOInumber = $eoiNum";
      $updateResult = mysqli_query($conn, $updateQuery);

      if ($updateResult) {
        if (mysqli_affected_rows($conn) > 0) {
          echo "<p style='color: green;'> Status updated: EOI #$eoiNum → '$newStatus'</p>";
        } else {
          echo "<p style='color: orange;'> No rows updated. EOI #$eoiNum may not exist or status is already '$newStatus'.</p>";
        }
      } else {
        echo "<p style='color: red;'> Error running update query.</p>";
      }
    } else {
      echo "<p style='color: red;'> Please provide both EOI number and new status.</p>";
    }
  }
  ?>
</section>


  <!-- DELETE EOI -->
  <section>
    <h2>Delete EOI</h2>
    <form method="post" action="manage.php">
      <label for="delete_eoi">EOI Number:</label>
      <input type="text" name="delete_eoi" id="delete_eoi"><br><br>
      <input type="submit" name="delete" value="Delete EOI">
    </form>

    <?php
    if (isset($_POST["delete"])) {
      $deleteEoi = trim($_POST["delete_eoi"]);
      if (!empty($deleteEoi)) {
        $delQuery = "DELETE FROM eoi WHERE EOInumber=$deleteEoi";
        $delResult = mysqli_query($conn, $delQuery);
        echo $delResult ? "<p>Deleted EOI #$deleteEoi successfully.</p>" : "<p>Failed to delete EOI.</p>";
      } else {
        echo "<p>Please enter an EOI number to delete.</p>";
      }
    }
    ?>
  </section>

</main>

<?php include("footer.inc"); ?>
</body>
</html>
