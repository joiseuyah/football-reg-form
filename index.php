<?php
session_start();
$nameErr = $ageErr = $heightErr = $weightErr = $semesterErr = $jerseyErr = $phoneErr = "";
$name = $age = $height = $weight = $semester = $jersey = $phone = "";

/* $errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
   store errors in session
  $_SESSION['errors'] = $errors;
/** */

$errors = $_SESSION['errors'] ?? array();
unset($_SESSION['errors']);

foreach ($_POST as $field => $value) {
  switch ($field) {
    case 'name':
    case 'age':
    case 'height':
    case 'email':
    case 'position':
    case 'student':
    case 'weight':
    case 'semester':
    case 'jersey':
    case 'phone':
    case 'experience':
    case 'dash':
    case 'comment':
      if (empty($value)) {
        $errors[$field] = ucfirst($field) . " is required!";
      } else {
        $value = test_input($value);
        if ($field == 'name' && !preg_match("/^[a-zA-Z ]*$/", $value)) {
          $errors[$field] = "Only letters and white space allowed in Name";
        }
        if ($field == 'semester' && (!is_numeric($value) || $value > 6)) {
          $errors[$field] = "Year level must be a number and within the limit of 4";
        }
        if ($field == 'phone' && !preg_match("/^[0-9]*$/", $value)) {
          $errors[$field] = "Invalid phone number!";
        }
        if ($field == 'student' && !preg_match("/^[0-9]*$/", $value)) {
          $errors[$field] = "Invalid student number!";
        }
      }
      break;
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UST Women's Football Registration</title>
  <link rel="icon" type="image/png" href="/images/logo.png">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </header>

<body>
  <h1 id="title">University of Santo Thomas - Women's Champions League</h1>
  <label id="description">A tournament organized by <strong>The College of Information and Computing Sciences</strong>
    <h2>Player Registration Form</h2>

    <body id="main">
      <form id="survey-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-row">
          <div class="left-column">
            <div class="labels">
              <label for="name-label">Full Name:</label>
            </div>
          </div>
          <div class="right-column">
            <label for="name-label">
              <input id="name-label" class="input-field" type="text" name="name" placeholder="Enter your full name">
              <span class="error"><?php echo $errors['name'] ?? ''; ?></span>
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="left-column">
            <label for="age-label">Age:</label>
          </div>
          <div class="right-column">
            <label for="age-label">
              <input id="age-label" class="input-field" type="number" name="age" placeholder="Enter your age">
              <span class="error"><?php echo $errors['age'] ?? ''; ?></span>
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="me-2 ">
            <label class="" for="height">
              <label for="height-label">Height (cm):</label>
            </label>
            <select id="height" name="height" class="form-select">
              <option value="0" selected="">0 ft</option>
              <option value="1">1 ft</option>
              <option value="2">2 ft</option>
              <option value="3">3 ft</option>
              <option value="4">4 ft</option>
              <option value="5">5 ft</option>
              <option value="6">6 ft</option>
              <option value="7">7 ft</option>
              <option value="8">8 ft</option>
              <option value="9">9 ft</option>
            </select>
          </div>
          <div class="form-row">
            <label class="" for="height">
            </label>
            <select id="height" name="height" class="form-select">
              <option value="0" selected="">0 in</option>
              <option value="1">1 in</option>
              <option value="2">2 in</option>
              <option value="3">3 in</option>
              <option value="4">4 in</option>
              <option value="5">5 in</option>
              <option value="6">6 in</option>
              <option value="7">7 in</option>
              <option value="8">8 in</option>
              <option value="9">9 in</option>
              <option value="10">10 in</option>
              <option value="11">11 in</option>
            </select>
          </div>
          <span class="error"><?php echo $errors['height'] ?? ''; ?>
        </div>
        <div class="form-row">
          <div class="left-column">
            <label for="weight-label">Weight (lbs):</label>
          </div>
          <div class="right-column">
            <label for="weight-label">
              <input id="weight-label" class="input-field" type="number" min="0" name="weight" placeholder="Enter your weight">
              <span class="error"><?php echo $errors['weight'] ?? ''; ?></span> <!-- not echoing -->
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="left-column">
            <div class="labels">
              <label for="semester-label">Year Level:</label>
            </div>
          </div>
          <div class="right-column">
            <label for="semester-label">
              <input id="semester-label" class="input-field" type="number" name="semester" placeholder="Enter your year level">
              <span class="error"><?php echo $errors['semester'] ?? ''; ?></span>
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="left-column">
            <div class="labels">
              <label for="jersey-label">Desired Jersey Number:</label>
            </div>
          </div>
          <div class="right-column">
            <label for="jersey-label">
              <input id="jersey-label" class="input-field" type="number" name="jersey" placeholder="Enter your jersey number">
              <span class="error"><?php echo $errors['jersey'] ?? ''; ?></span>
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="left-column">
            <div class="labels">
              <label for="phone-label">Phone Number:</label>
            </div>
          </div>
          <div class="right-column">
            <label for="phone-label">
              <input id="phone-label" class="input-field" type="text" name="phone" placeholder="Enter your contact number">
              <span class="error"><?php echo $errors['phone'] ?? ''; ?></span>
            </label>
          </div>
        </div>
        <div class="form-row">
          <div class="left-column">
            <div class="labels">
              <label for="email-label">School Email:</label>
            </div>
          </div>
          <div class="right-column">
            <label for="email-label">
              <input id="email-label" class="input-field" type="email" placeholder="Enter your UST email" name="email">
              <?php if (!empty($errors['email'])) {
                echo '<span class="error">' . $errors['email'] . '</span>';
              } ?>
            </label>
          </div>
  </label>
  </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <div class="labels">
        <label for="student-label">Student Number:</label>
      </div>
    </div>
    <div class="right-column">
      <label for="student-label">
        <input id="student-label" class="input-field" type="student" placeholder="Enter your student number" name="student">
        <?php if (!empty($errors['student'])) {
          echo '<span class="error">' . $errors['student'] . '</span>';
        } ?>
      </label>
    </div>
    </label>
  </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <div class="labels">
        <label for="position">Your Preferred Position:</label>
      </div>
    </div>
    <div class="right-column">
      <select id="position" name="position" class="form-select mt-3">
        <option value="0000SL">-- Select --</option>
        <option value="22">Not sure</option>
        <option value="23">Quarterback</option>
        <option value="24">Offensive Line</option>
        <option value="25">Tight End</option>
        <option value="26">Wide Receiver</option>
        <option value="27">Running Back</option>
        <option value="28">Defensive Line</option>
        <option value="29">Linebacker</option>
        <option value="30">Defensive Back</option>
        <option value="31">Fullback</option>
        <option value="32">Cornerback</option>
        <option value="33">Kicker</option>
        <option value="34">Punter</option>
        <option value="35">Long Snapper</option>
      </select>
      <span class="error"><?= isset($errors['position']) ? $errors['position'] : ''; ?></span>
    </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <div class="labels">
        <label for="photo">Photo</label>
      </div>
    </div>
    <div class="right-column">
      <input id="photo" type="file" accept="image/*" class="photo-input">
      <label for="photo">Add a Photo</label>
      <?php echo $errors['photo'] ?? ''; ?></span>
    </div>
  </div>

  <div class="form-row">
    <div class="left-column">
      <label>Favorite NFL Team/Teams:</label>
    </div>
    <div class="right-column">
      <ul>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="1" name="expectations">Philadelphia Eagles
          </label>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="2" name="expectations">Los Angeles Chargers
          </label>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="3" name="expectations">Kansas City Chiefs
          </label>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="4" name="expectations">Miami Dolphins
          </label>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="5" name="expectations">San Francisco 49ers
          </label>
        </li>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="7" name="expectations">New England Patriots
          </label>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="8" name="expectations">Las Vegas Raiders
          </label>
        </li>
        </li>
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="10" name="expectations">None
        <li class="checkbox">
          <label>
            <input class="expect" type="checkbox" value="9" name="expectations">
          </label>
          <label for="message">Others:</label>
          <textarea id="message" name="message" rows="1" cols="15"></textarea>
          <span class="error"><?php echo $errors['expect'] ?? ''; ?></span>
          </label>
        </li>
      </ul>
    </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <div class="labels">
        <label for="played-football">Have you ever played American Football?</label>
      </div>
    </div>
    <div class="right-column">
      <div class="radio-buttons">
        <label>
          <input type="radio" name="played-football" value="yes">
          Yes
        </label>
        <label>
          <input type="radio" name="played-football" value="no">
          No
        </label>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <label for="experience">If yes, please give a brief description of your experience playing Football:</label>
    </div>
    <div class="right-column">
      <textarea id="experience" class="input-field" style="height:90px;resize:vertical;" placeholder="Enter your text..."></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <label for="dash">Please give your best time for a 40 yard dash (if known)</label>
    </div>
    <div class="right-column">
      <textarea id="dash" class="input-field" style="height:30px;resize:vertical;" placeholder="Enter your text..."></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="left-column">
      <label for="comment">Any <strong>comments/suggestions</strong> regarding this tournament:</label>
    </div>
    <div class="right-column">
      <textarea id="comment" class="input-field" style="height:90px;resize:vertical;" placeholder="Enter your text..."></textarea>
    </div>
  </div>
  <div class="form-row">
    <button id="submit">Submit</button>
  </div>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get d form data
    $expectations = $_POST['expectations'] ?? '';
    $playedFootball = $_POST['played-football'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $dash = $_POST['dash'] ?? '';
    $comment = $_POST['comment'] ?? '';

    // validate form data
    if (empty($expectations) || empty($playedFootball)) {
      // error message
      echo "<p style='color: darkred;'>Flag on the play! Please fill out all empty fields.</p>";
    } else {
      // display success message
      echo "<p style='color: darkgreen; font-weight: bold;'>Touchdown! Your form has been successfully submitted! </p>";
    }
  }
  ?>
</body>

</html>