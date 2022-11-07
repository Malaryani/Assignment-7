<?php

require_once('CSVHelper.php');

// WRITE
CSVHelper::writing('csvData.csv',[['Sara','James'],['John','Deken'],['Paul','Miller']],true); 
// READ
echo '<pre>';print_r(CSVHelper::reading('csvData.csv')); 

// MODIFY
CSVHelper::modify('csvData.csv',['John','Miller','MALE'],1); 

// READ
echo '<pre>';print_r(CSVHelper::reading('csvData.csv')); 

// DELETE
CSVHelper::delete('csvData.csv',1); 

echo '<pre>';print_r(CSVHelper::reading('csvData.csv')); 

