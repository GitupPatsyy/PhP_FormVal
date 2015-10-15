<?php

function setValue($formdata, $fieldName) {
    if (isset($formdata) && isset($formdata[$fieldName])) {
        echo $formdata[$fieldName];
    }
}

function setChecked($formdata, $fieldName, $fieldValue) {
    if (isset($formdata) && isset($formdata[$fieldName])) {
        if (is_array($formdata[$fieldName]) && in_array($fieldValue, $formdata[$fieldName])) {
            echo ' checked = "checked"';
        } else if ($formdata[$fieldName] == $fieldValue) {
            echo ' checked = "checked"';
        }
    }
}

function setSelected($formdata, $fieldName, $fieldValue) {
    if (isset($formdata) && isset($formdata[$fieldName])) {
        if (is_array($formdata[$fieldName]) && in_array($fieldValue, $formdata[$fieldName])) {
            echo ' selected = "selected"';
        } else if ($formdata[$fieldName] == $fieldValue) {
            echo ' selected = "selected"';
        }
    }
}

if (!isset($formdata)) {
    $formdata = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form ValidRPB</title>
        <style>
            div.container {
                width: 100%;
                margin: auto;

            }
            div.row {
                display: block;
                margin-top: 10px;
            }
            div.label {
                display: inline-block;
                text-align: right;
                padding-right: 5px;
            }
            div.control {
                display: inline-block;
                vertical-align: top;
            }
            div.errors {
                display: inline-block;
                text-align: left;
                padding-left: 5px;
                color: red;
            }
        </style>

    </head>
    <body>
        <form action="process.php" method="get">
            <div class="container">
                <div class="row">
                    <h3>Enter Form Details.</h3>
                </div>

                <!-- Username -->
                <div class="row">
                    <div class ="label">
                        <label for="username">Username</label>
                    </div>
                    <div class="control">
                        <input type="text" id="username" name="username" value="<?php setValue($formdata, 'username') ?>"/>
                    </div>
                    <div class="errors">
                        <span id="usernameError">
                            <?php
                            if (isset($errors['username']))
                                echo $errors['username'];
                            ?>
                        </span>
                    </div>
                </div>

                <!-- Password -->
                <div class="row">
                    <div class="label">
                        <label for="password">Password</label>
                        <div class="control">
                            <input type="password" id="password" name="password" value="<?php setValue($formdata, 'password') ?>"/>
                        </div>
                        <div class="errors">
                            <span id="passwordError">
                                <?php
                                if (isset($errors['password']))
                                    echo $errors['password'];
                                ?>
                            </span>
                        </div>
                    </div>

                    <!--Date of Birth-->
                    <div class="row">
                        <div class="label">
                            <label for="dob">Date of Birth</label>
                            <div class="control">
                                <input type="date" id="dob" name="dob" value="dob"/>
                            </div>
                            <div class="errors">
                                <span id="dobError">
                                    <?php
                                    if (isset($errors['dob']))
                                        echo $errors['dob'];
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Radio Buttons -->
                    <div class="row">
                        <div class="label">
                            <label for="gplatform">Gaming Platform</label>
                            <div class="control">
                                <input type="radio" id="windows" name="gplatform" value="windows"/>
                                <label for="windows">Windows</label>

                                <input type="radio" id="ps4" name="gplatform" value="ps4"/>
                                <label for="windows">PS4</label>

                                <input type="radio" id="xbone" name="gplatform" value="xbone"/>
                                <label for="windows">xBone</label>
                            </div>
                            <div class="errors">
                                <span id="gplatformError">

                                </span>
                            </div>
                        </div>
                    </div>
                    <!--Select Box-->
                    <div class="row">
                        <label>Game Informer</label>
                    </div>
                    <div class="control"> 
                        <select id="informer" name="informer[]" multiple="multiple">
                            <option value="IGN">IGN</option>
                            <option value="Gamespot">Gamespot</option>
                            <option value="dtoid">DTOID</option>
                            <option value="Machinima">Machinima</option>
                        </select>

                    </div>
                    <!-- Games Array -->
                    <div class="row">
                        <div class="label">
                            <label>Favourite Titles</label>
                        </div>
                        <div class="control">
                            <input type="checkbox" id="fallout4" name="games[]" value="fallout4"
<?php setChecked($formdata, 'games', 'fallout4'); ?>
                                   />
                            <label for="fallout4">Fallout4</label>


                            <input type="checkbox" id="justcause3" name="games[]" value="justcause3"
<?php setChecked($formdata, 'games', 'justcause3'); ?>
                                   />
                            <label for="justcause3">JustCause3</label>

                            <input type="checkbox" id="mgsv" name="games[]" value="mgsv"
<?php setChecked($formdata, 'games', 'mgsv'); ?>
                                   />
                            <label for="mgsv">MGSV</label>
                        </div>
                        <div class="errors">
                            <span id="gamesError">
<?php if (isset($errors['games'])) echo $errors['games']; ?>
                            </span>
                        </div>

                    </div>
                    <!-- Submit/Reset -->
                    <div class="row">
                        <div class="label">
                            <input type="submit" id="submit" name="submit" value="Submit">
                            <input type="reset" id="reset" name="reset" value="Reset">
                        </div>
                    </div>
                </div>



        </form>
    </body>
</html>
