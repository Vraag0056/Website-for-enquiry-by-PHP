<?php
function registerUser($name,$email,$phone,$message){
$mysqli = new mysqli('localhost', 'root', 'root', 'clean_design');
if($mysqli->connect_errno != 0){
   echo $mysqli->connect_error;
   exit();
}
else{
    $args = func_get_args();
   $args = array_map(function($value){
      return trim($value);
   }, $args);
   foreach ($args as $value) {
    if(empty($value)){
       return "All fields are required";
    }
 }
 foreach ($args as $value) {
    if(preg_match("/([<|>])/", $value)){
       return "<> Characters are not allowed";
    }
 }
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return "Email is not valid";
 }

 $phone1 =
 substr($phone, -10, -7) .
 substr($phone, -7, -4) .
 substr($phone, -4);
if(preg_match('/^[0-9]{10}+$/', $phone1)) {
echo "";
} else {
return "Phone number not valid";
}
date_default_timezone_set('Asia/Kolkata'); // CDT
    $current = date('d/m/Y : h:i:s');
 $stmt = $mysqli->prepare("INSERT INTO enquiry(name,email,phone,message,ctime) VALUES(?,?,?,?,?)");
   $stmt->bind_param("sssss", $name,$email,$phone,$message,$current);
   $stmt->execute();
   if($stmt->affected_rows != 1){
      return "An error occurred. Please try again";
}
else{
   return "Form Successfully Submitted";
}
}
}

?>