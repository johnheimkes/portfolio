<?php 

function validate($name, $message, $email) {
  
  $subject = "Message submitted from theIV.me";
  $emailaddress = "john@johnheimkes.com";
  
  $body = "
    <html>
      <body>
        <div>Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$name</div>
        <div>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$email</div>
        <div>Comments: &nbsp;&nbsp;&nbsp;$message</div>
      </body>
    </html>
  ";
  
  $message_valid = check_name($message);
  $name_valid = check_name($name);

  $validity = array(
    "name"    => $name_valid,
    "message"   => $message_valid
  );

  if ($validity["name"] == true && $validity["message"] == true) {
    if(mail($emailaddress,"$subject",$body,"MIME-Version: 1.0\r\n"."Content-type: text/html; charset=iso-8859-1" )) {
      header('Location:' . $_SERVER['HTTP_REFERER']."?success=true#contact");
    } else {
      header('Location:' . $_SERVER['HTTP_REFERER']."?error=true#contact");
    }
  } else {
    header('Location:' . $_SERVER['HTTP_REFERER']."?error=true#contact");
  }
}


function check_name($check) {
  if (!empty($check)) {
    return true;
  }
  else {
    return false;
  }
}

function check_email_address($email) {
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
    return false; 
  }
  $email_array = explode("@", $email); 
  $local_array = explode(".", $email_array[0]); 
  for ($i = 0; $i < sizeof($local_array); $i++) { 
    if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", 
    $local_array[$i])) { 
      return false; 
    } 
  } 
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {  
    $domain_array = explode(".", $email_array[1]); 
    if (sizeof($domain_array) < 2) { 
      return false; 
    } 
    for ($i = 0; $i < sizeof($domain_array); $i++) { 
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
        return false; 
      } 
    } 
  } 
  return true; 
}

validate($_POST['name'], $_POST['message'], $_POST['email']);
?>