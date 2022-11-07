<?php

class AuthHelper
{
    //FUNCTION TO SIGN UP NEW USER
    static function signup($email, $password)
    {
        // CHECK IF THE EMAIL AND PASSWORD ARE EMPTY
        if (empty($email || empty($password))) {
            return false;
        } else {
            // CHECK IF FILE EXISITS
            if (file_exists("users.csv.php")) {
                //READING FILE DATA
                $uFile = file_get_contents('users.csv.php');
                //CHECK IF EMAIL ALREADY EXISITS
                if (strpos($uFile, $email) !== false) {
                    return 'Email already registered!!!';
                }
            }
            //CREATING NEW USER ARRAY
            $user_add = array(
                [$email, password_hash($password, PASSWORD_DEFAULT)]
            );
            //OPEN FILE
            $uFile = fopen('users.csv.php', 'a');
            //WRITING TO FILE
            foreach ($user_add as $fields) {
                fputcsv($uFile, $fields, ';');
            }
            //CLOSING FILE
            fclose($uFile);
            return 'User account created successfully!!';
        }
    }
    // SIGIN IN USER
    static function signin($email, $password)
    {
        //CHECK IF FILE EXISITS 
        if (!file_exists('users.csv.php')) die('The user.csv.php file does not exist');
        //USER DETAILS ARRAY
        $uInfo = [];
        // OPEN FILE TO READ
        if (($uFile = fopen('users.csv.php', 'r')) !== FALSE) {
            // READING FILE DATA LINE BY LINE
            while (($data = fgetcsv($uFile, 1000, ";")) !== FALSE) {
                $uInfo[] = $data;
            }
            fclose($uFile);
        }
        //READING FILE
        $fileuser = file_get_contents('users.csv.php');
        if (strpos($fileuser, $email) !== false) {
            //LOOPING THORUGH USERS
            for ($i = 0; $i <= count($uInfo) - 1; $i++) {
                if (password_verify($password, $uInfo[$i][1]) !== false) {
                    //SET SESSION TO LOGGED IN
                    $_SESSION['logged'] = true;
                    //SAVING INFORMATION TO SESSION
                    $_SESSION['info'] = $uInfo[$i];
                    return "You have successfully logged in to the website.";
                }
            }
        }
    }
    //SIGNING OUT USER
    static function signout()
    {
        //CHECK IF NOT LOGGED IN
        if ($_SESSION['logged'] == false) {
            //RETURN NOT LOGGED IN 
            return "Not Logged IN";
        }
        //CHECK IF LOGGED IN
        if ($_SESSION['logged'] == true) {
            //SET SESSION TO LOGGED OUT
            $_SESSION['logged'] = false;
            //RETURN NOT LOGGED OUT 
            return "Signed Out";
        }
    }
    static function is_logged()
    {
        //CHECK IF LOGGED FLAG IS SET
        if (isset($_SESSION['logged'])) {
            //SET SESSION TO LOGGED IN
            if ($_SESSION['logged'] == true) {
                //RETURN USER INFORMATION 
                return $_SESSION['info'];
            } else {
                //RETURN NOT LOGGED OUT 
                return "Not Logged IN";
            }
        }
    }
}
