<?php

require_once('Entity.php');

// SIGNUP
 // CREATING NEW ENTITY
echo '<pre>';print_r(Entity::create("Sara James","31"));
 //  CREATING NEW ENTITY
 echo '<pre>';print_r(Entity::create("Joe Miller","25"));
 // FINDING ENTITY AT INDEX
 echo '<pre>';print_r(Entity::find(1));
// UPDATING ENTITY INFORMATION AT INDEX
echo '<pre>';print_r(Entity::modify(1,"Chris Sparrow","25"));
// DELETING ENTITY AT INDEX
echo '<pre>';print_r(Entity::delete(0));
// Read all entities 
echo '<pre>';print_r(Entity::readAll());
