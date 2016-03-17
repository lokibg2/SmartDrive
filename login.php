<?php  
// CHECK USERNAME OR PASSWORD FROM DATABASE
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$EMAIL = $REQUEST->email;
$PASSWORD = $REQUEST->password;
  $m = new MongoClient();
	
   
   // select a database
   $db = $m->SmartDrive;
   $collection = $db->users;
   $cursor = $collection->find();
	
   foreach ($cursor as $doc) {
      $email =  $doc["email"];
      $pass =  $doc['pass'];
      if($EMAIL == $email && $PASSWORD == $pass){
      	echo "1";
      	break;
      }
   }
?>