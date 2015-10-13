<?php print_r($_GET); ?>
<?php

//Setting input method so it can be changed without changing for all variables.
$input_method = INPUT_GET;
//Adding the fordata to an array
$formdata = array();
//Creates array to store errors
$errors = array();

//Sanitizing input from Form.
$formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
$formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);
$formdata['gplatform'] = filter_input($input_method, "gplatform", FILTER_SANITIZE_STRING);
$formdata['games'] = filter_input($input_method, "games", FILTER_SANITIZE_URL, FILTER_REQUIRE_ARRAY);
$formdata['dob'] = filter_input($input_method, "dob", FILTER_SANITIZE_STRING);

        if ($formdata['username'] === NULL || $formdata['username'] === FALSE || $formdata['username'] === "") {
            $errors['username'] = "Username is required";
        }   

        if ($formdata['password'] === NULL || $formdata['password'] === FALSE || $formdata['password'] === "") {
            $errors['password'] = "Password is required";
        }
        
        if ($formdata['dob'] !== NULL && $formdata['dob'] !== FALSE && $formdata['dob'] !== ""){
            $date_array = explode('-', $formdata['dob']);
            echo $formdata['dob'];
            if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[2], $date_array[0])){
                $errors['dob'] = "Invalid date format, dd/mm/yyyy";
            }
        }
//        if ($formdata['gplatform'] !== NULL || $formdata['gplatform'] !== FALSE || $formdata['gplatform'] !== "") {
//            $errors['gplatform'] = "Platform is required";
//        }

        if ($formdata['games'] === NULL && $formdata['games'] === FALSE && $formdata['games'] === "") {
            $validGames = array("fallout4", "justcause3", "mgsv");
            foreach ($formdata['games'] as $games) {
                if (!in_array($games, $validGames)) {
                    $errors['games'] = "You must make a selection!";
                    break;
                }
            }
        }

if (empty($errors)) {
    require 'response.php';
} else {
    require 'index.php';
}
?>
