<?php

require_once('AuthHelper.php');

// SIGNUP
 // SIGNING UP NEW USER
echo '<pre>';print_r(AuthHelper::signup("cargo@mail.com","abc"));
 // SIGNING UP NEW USER WITH SAME EMAIL
 echo '<pre>';print_r(AuthHelper::signup("cargo@mail.com","123"));
 // SIGNING UP NEW USER WITH DIFFERENT EMAIL
 echo '<pre>';print_r(AuthHelper::signup("karma@mail.com","abcd"));
// SIGN IN
echo '<pre>';print_r(AuthHelper::signin("karma@mail.com","abcd")); 
// LOGGED IN
echo '<pre>';print_r(AuthHelper::is_logged()); 
// SIGN OUT
echo '<pre>';print_r(AuthHelper::signout()); 
