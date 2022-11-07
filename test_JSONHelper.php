<?php

require_once('JSONHelper.php');

// WRITE
JSONHelper::writing('jsonData.json',[['FirstName'=>'Sara','LastName'=>'James'],['FirstName'=>'Paul','LastName'=>'Miller']],true); 
// READ
echo '<pre>';print_r(JSONHelper::reading('jsonData.json')); 

// MODIFY
JSONHelper::modify('jsonData.json',['FirstName'=>'Sara','LastName'=>'Lennon','Gender'=>'Female'],0); 

// READ
echo '<pre>';print_r(JSONHelper::reading('jsonData.json'));

// DELETE
JSONHelper::delete('jsonData.json',1); 

echo '<pre>';print_r(JSONHelper::reading('jsonData.json')); 
