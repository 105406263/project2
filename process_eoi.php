<?php
//This code makes the page unable to be accessed by the  URL. It redirects the user to apply page if they try to visit the page using URL
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

//It enables error reporting

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
require_once("settings.php");  //Connection to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection failed: " . mysqli_connect_error() . "</p>";
}

//checks if eoi table exists if not it creates it
// Asked Chatgpt how to check if they table is there and if not how to create it. It answered with this command "CREATE TABLE IF NOT EXISTS
$table_sql = "CREATE TABLE IF NOT EXISTS EOI (
    `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
    `JobReferenceNumber` varchar(5) NOT NULL,
    `FirstName` varchar(50) NOT NULL,
    `LastName` varchar(50) NOT NULL,
    `Streetaddress` varchar(40) NOT NULL,
    `Suburb` varchar(40) NOT NULL,
    `State` varchar(50) NOT NULL,
    `Postcode` varchar(4) NOT NULL,
    `Emailaddress` varchar(100) NOT NULL,
    `Phonenumber` varchar(12) NOT NULL,
    `Skill1` varchar(50) DEFAULT NULL,
    `Skill2` varchar(50) DEFAULT NULL,
    `Skill3` varchar(50) DEFAULT NULL,
    `Otherskills` text DEFAULT NULL,
    `Status` enum('New','Current','Final','') NOT NULL DEFAULT 'New',
    PRIMARY KEY (`EOInumber`)
)";

mysqli_query($conn, $table_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // sanitise form inputs
     $jobref = sanitise_input($_POST["jobref"]);
    $firstname= sanitise_input($_POST["firstname"]);
    $lastname = sanitise_input($_POST["lastname"]);
    $address = sanitise_input($_POST["address"]);
    $suburb = sanitise_input($_POST["suburb"]);
    $state = sanitise_input($_POST["state"]);
    $postcode = sanitise_input($_POST["postcode"]);
    $email = sanitise_input($_POST["email"]);
    $phone = sanitise_input($_POST["phone"]);
    $skills = isset($_POST["skills"]) ? array_map('sanitise_input', $_POST["skills"]) : [];
    $skill1 = $skills[0] ?? null;
    $skill2 = $skills[1] ?? null;
    $skill3 = $skills[2] ?? null;
    $otherskills= sanitise_input($_POST["otherskills"]);
    $gender = sanitise_input($_POST["gender"]);
    $birthdate = sanitise_input($_POST["birthdate"]);

      
     //  Basic form validation
     //Asked Chatgpt to make the patterns in php code 
    $errors = [];
    if (empty($jobref)) $errors[] = "Job reference is required.";
    if (!preg_match("/^[A-Za-z\s]{1,20}$/", $firstname)) $errors[] = "First name must be alphabetic and up to 20 characters.";
    if (!preg_match("/^[A-Za-z\s]{1,20}$/", $lastname)) $errors[] = "Last name must be alphabetic and up to 20 characters.";
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $birthdate)) $errors[] = "Invalid date of birth format.";
    if (!in_array($gender, ["male", "female", "other"])) $errors[] = "Invalid gender selected.";
    if (strlen($address) > 40 ) $errors[] = "Invalid address format.";
    if (empty($suburb) || strlen($suburb) > 40) $errors[] = "Suburb is required and max 40 chars.";
    if (!in_array($state, ["ACT", "NSW", "NT", "QLD", "SA", "TAS", "VIC", "WA"])) $errors[] = "Invalid state.";
    if (!preg_match("/^\d{4}$/", $postcode)) {$errors[] = "Postcode must be exactly 4 digits.";
    } else {  $postcode_num = (int)$postcode;
    if ($postcode_num < 200 || $postcode_num > 9944) {$errors[] = "Postcode must be between 0200 and 9944.";}}
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) $errors[] = "Invalid email address.";
    if (!preg_match("/^[0-9\s]{8,12}$/", $phone)) $errors[] = "Phone must be 8 to 12 digits/spaces.";
    if (count($skills) < 1) $errors[] = "Please select at least one skill.";
    if (in_array("Other", $skills) && empty($otherskills)) $errors[] = "Please specify other skills.";
    
  // if any errors are there it prints them and stop otherwise it inserts data into the EOI table  
 if (!empty($errors)) {
       
        foreach ($errors as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
        echo "<p><strong>Please go back and fix the errors.</strong></p>";
    } else {
        
        $sql = "INSERT INTO EOI (JobReferenceNumber, FirstName, LastName, StreetAddress, Suburb, State , Postcode, EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, OtherSkills) 
                VALUES ('$jobref', '$firstname', '$lastname', '$address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$otherskills')";
                

        ////after inserting it shows confirmation
        if (mysqli_query($conn, $sql)) {
            $eoinumber = mysqli_insert_id($conn);
            echo "<h2>Thank you for your application!</h2>";
            echo "<p><strong>Your EOInumber is:</strong> " . htmlspecialchars($eoinumber) . "</p>";
            echo "<p><strong>Job Reference:</strong> " . htmlspecialchars($jobref) . "</p>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($firstname) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($lastname) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($gender) . "</p>";
            echo "<p><strong>Birthdate:</strong> " . htmlspecialchars($birthdate) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
            echo "<p><strong>Skills:</strong> " . htmlspecialchars(implode(", ", $skills)). "</p>";
            echo "<p><strong>Other Skills:</strong> " . nl2br(htmlspecialchars($otherskills)) . "</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}

// Function to clean up input data
function sanitise_input($data) {
    $data = trim($data);                 // Remove whitespace
    $data = stripslashes($data);         // Remove backslashes
    $data = htmlspecialchars($data);     // Convert special characters to HTML
    return $data;
}
?>