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
    <form action="process_eoi.php" method="post" novalidate="novalidate">
      
      <!--Dropdown selection for job reference number-->
      <label for="jobref">Job Reference Number:</label>
      <select id="jobref" name="jobref" >
        <option value="">--Select a Job Reference--</option>
        <option value="CYB01">CYB01</option>
        <option value="ITT02">ITT02</option>
      </select>

      <!--Input for First Name-->
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" maxlength="20" placeholder="e.g Jack" >

      <!--Input for Lasd Name-->
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" maxlength="20"  placeholder="e.g Sparrow" >

      <!--Input for Date of Birth-->
      <label for="birthdate">Date of Birth:</label>
      <input type="date" id="birthdate" name="birthdate" >

      <!--Radio button selection for gender Input-->
      <fieldset>
        <legend>Gender</legend>
        <label for="male"><input type="radio" name="gender" value="male" id="male" > Male</label>
        <label for="female"><input type="radio" name="gender" value="female" id="female" checked> Female</label>
        <label for="other"><input type="radio" name="gender" value="other" id="other"> Other</label>
      </fieldset>

      <!--Input for Address-->
      <!--Asked Chatgpt to give me a validation format for street address in html for my form-->
      <label for="address">Street Address:</label>
      <input type="text" id="address" name="address" maxlength="40"  placeholder="e.g 32 Thomas Street" >

      <!--Input for suburb-->
      <label for="suburb">Suburb/Town:</label>
      <input type="text" id="suburb" name="suburb" maxlength="40"  placeholder="e.g Hawthorne" >

      <!--Drop down selection for state input-->
      <label for="state">State:</label>
      <select id="state" name="state" >
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
      <input type="text" id="postcode" name="postcode" placeholder="e.g., 3000" >

      <!--Input for email address-->
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" placeholder="e.g jack@gmail.com" >

      <!--Input for phone number-->
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone"  placeholder="e.g., 0412 345 678" >

      <!--Checkbox inputs for skills selectiom-->
      <fieldset>
        <legend>Technical Skills</legend>
        <input type="checkbox" name="skills[]" value="HTML" id="HTML" checked>
        <label for="HTML">HTML</label>
        <input type="checkbox" name="skills[]" value="CSS" id="CSS">
        <label for="CSS">CSS</label>
        <input type="checkbox" name="skills[]" value="JavaScript" id="JavaScript">
        <label for="JavaScript">JavaScript</label>
        <input type="checkbox" name="skills[]" value="Other" id="otherSkill">
        <label for="otherSkill">Other</label>
      </fieldset>

      
      <label for="otherskills">Other Skills:</label>
      <textarea id="otherskills" name="otherskills" rows="10" cols="50" placeholder="List other relevant skills..."></textarea>
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