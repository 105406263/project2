<!DOCTYPE html><!--Declares document type_-->
<html lang="en"><!--Specifies the language of the document-->

<head>
  <!--Meta tags for page description-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Apply for a Job | TechEmpower</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>

<!--Main body of the Document-->
<body class="apply-page">

  <!--Header Section and Navigation Bar-->
  <?php include("header.inc"); ?>
  <?php include("nav.inc"); ?>
  
  <!--Main content area-->
  <main>
    <h1>Apply for a Job</h1>
    <!--Form element and method that submits the data to a test server via POST-->
    <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
      
      <!--Dropdown selection for job reference number-->
      <label for="jobref">Job Reference Number:</label>
      <select id="jobref" name="jobref" required>
        <option value="">--Select a Job Reference--</option>
        <option value="CYB01">CYB01</option>
        <option value="ITT02">UID03</option>
      </select>

      <!--Input for First Name-->
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" maxlength="20" pattern="[A-Za-z]+" placeholder="e.g Jack" required>

      <!--Input for Lasd Name-->
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" maxlength="20" pattern="[A-Za-z]+" placeholder="e.g Sparrow" required>

      <!--Input for Date of Birth-->
      <label for="birthdate">Date of Birth:</label>
      <input type="date" id="birthdate" name="birthdate" required>

      <!--Radio button selection for gender Input-->
      <fieldset>
        <legend>Gender</legend>
        <label for="male"><input type="radio" name="gender" value="male" id="male" required> Male</label>
        <label for="female"><input type="radio" name="gender" value="female" id="female" checked> Female</label>
        <label for="other"><input type="radio" name="gender" value="other" id="other"> Other</label>
      </fieldset>

      <!--Input for Address-->
      <!--Asked Chatgpt to give me a validation format for street address in html for my form-->
      <label for="address">Street Address:</label>
      <input type="text" id="address" name="address" maxlength="40" pattern="^\d{1,6}(\s?[A-Za-z0-9#\-\.]+)+$" placeholder="e.g 32 Thomas Street" required>

      <!--Input for suburb-->
      <label for="suburb">Suburb/Town:</label>
      <input type="text" id="suburb" name="suburb" maxlength="40"  placeholder="e.g Hawthorne" pattern="[A-Za-z]+" required>

      <!--Drop down selection for state input-->
      <label for="state">State:</label>
      <select id="state" name="state" required>
        <option value="ACT">ACT</option>
        <option value="NSW">NSW</option>
        <option value="NT">NT</option>
        <option value="QLD">QLD</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="VIC">VIC</option>
        <option value="WA">WA</option>
        
      </select>

      <!--Postcode input -->
      <label for="postcode">Postcode:</label>
      <input type="text" id="postcode" name="postcode" pattern="\d{4}" placeholder="e.g., 3000" required>

      <!--Input for email address-->
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="e.g jack@gmail.com" required>

      <!--Input for phone number-->
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" pattern="[0-9\s]{8,12}" placeholder="e.g., 0412 345 678" required>

      <!--Checkbox inputs for skills selectiom-->
      <fieldset>
        <legend>Technical Skills (required)</legend>
        <label for="HTML"><input type="checkbox" name="skills[]" value="HTML" id="HTML" required checked > HTML</label>
        <label for="CSS"><input type="checkbox" name="skills[]" value="CSS" id="CSS"> CSS</label>
        <label for="JavaScript"><input type="checkbox" name="skills[]" value="JavaScript" id="JavaScript"> JavaScript</label>
      </fieldset>

      <!--TextArea for other skills-->
      <label for="otherskills">Other Skills:</label>
      <textarea id="otherskills" name="otherskills" rows="10" cols="50"></textarea>

      <!--Submit button for the form-->
      <input type="submit" value="Apply">

      <!--Reset button for the form-->
      <input type="reset" value="Reset">
    </form>
  </main>

  <!--Footer of the page-->
  <?php include("footer.inc"); ?>
</body>

</html>