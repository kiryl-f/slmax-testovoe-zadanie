<?php

require_once 'create_db.php';
require_once 'person.php';
require_once 'person_list.php';

$person = new Person(2, "Name", "Surname","01-01-1970",1,"Ciry");
//$person->saveToDB();
//$person_list = new PersonList([1]);
