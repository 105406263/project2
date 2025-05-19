<?php
require_once("settings.php");
# If a user checks the "Other Skills" box, they must fill in the text area.
if (isset($_POST['other_skills_checkbox']) && trim($_POST['other_skills']) == "") {
  $errors[] = "Please describe your other skills.";
}