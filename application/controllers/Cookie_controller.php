<?php 
   class Cookie_controller extends CI_Controller { 
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('cookie', 'url')); 
    $this->load->library('encryption');

      } 
  
      public function index() { 
$plain_text = '1568';
//Key
$key = 'SuperSecretKey';

//To Encrypt:
$encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, 'I want to encrypt this', MCRYPT_MODE_ECB);

//To Decrypt:
$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $encrypted, MCRYPT_MODE_ECB);
echo "enc";
echo "<br>";
echo $encrypted;
echo "<br>";
echo $decrypted;
echo "<br>";

$ciphertext = $this->encryption->encrypt($plain_text);
echo $ciphertext;
echo "<br>";
// Outputs: This is a plain-text message!
echo $this->encryption->decrypt($ciphertext);
// $ciphertext = $this->encrypt->encrypt($plain_text);

// Outputs: This is a plain-text message!
// echo $ciphertext;
echo "<br>";
// echo $this->encrypt->decrypt($ciphertext);
$hmac_key = $this->encryption->hkdf($plain_text,'sha224');

echo "<br>";
echo $hmac_key;
echo "<br>";


 $ciphertext_base64 = base64_encode($plain_text);

    echo  $ciphertext_base64;
echo "<br>";
    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode($ciphertext_base64);
 echo $ciphertext_dec;
 $str = '257';

$encoded = urlencode( base64_encode( $str ) );
$decoded = base64_decode( urldecode( $encoded ) );
echo "<br>";
    echo  $encoded;
echo "<br>";
echo  $decoded;



 		 	      //        $owais = "owais";
  		   	     //        $saleem = "saleem";
		        //        set_cookie('cookie_name',$owais.$saleem, time() + (86400 * 30)); 
  		       //        echo get_cookie('cookie_name'); 
 		      // 	    setcookie("cookie[three]", "cookiethree");
		     //     setcookie("cookie[two]", "cookietwo");
		    //  setcookie("cookie[one]", "cookieone");
	       //  if (isset($_COOKIE['cookie'])) {
  	      //       foreach ($_COOKIE['cookie'] as $name => $value) {
  	     //       $name = htmlspecialchars($name);
	    //       $value = htmlspecialchars($value);
  	   //       echo "$name : $value <br />\n";
      //      	 }
     // }

// the array that will be used
// in the example
      	  $Cookies = get_cookie('cookie_name');
          $CookieValue = "15";	
      	  $OLD = "old";
		  $NEW = "new";		

		  echo "<pre>";
		  print_r($Cookies);
		  echo "</pre>";
		  $result = explode("|", $Cookies);
		  echo "<pre>";
          print_r($result);
		  echo "</pre>";
   		  echo "<pre>";
          print_r(count($result));
		  echo "</pre>";
		  foreach ($result as $key => $value) {
		   if($value == $CookieValue )
		   {
            $CookieValue = "";
		   }
		  }	


  $array = array(
  $OLD => $Cookies,
  $NEW => $CookieValue,
  );

// build the cookie from an array into
// one single string
function build_cookie($var_array) {
  $out = '';
  if (is_array($var_array)) {
    foreach ($var_array as $index => $data) {
     // $out .= ($data != "") ? $index . "=" . $data . "|" : "";
    $out .= ($data != "" && $data != $out ) ? $data . "|" : "";
    }
  }
  return rtrim($out, "|");
}

// make the func to break the cookie
// down into an array
function break_cookie($cookie_string) {
  $array = explode("|", $cookie_string);
  foreach ($array as $i => $stuff) {
    $stuff = explode("=", $stuff);
   // $array[$stuff[0]] = $stuff[1];
    unset($array[$i]);
  }
  return $array;
}

// then set the cookie once the array 
// has been through build_cookie func
$cookie_value = build_cookie($array);
setcookie('cookie_name', $cookie_value, time() + (86400 * 30), "/");

// get array from cookie by using the
// break_cookie func
if (isset($_COOKIE['cookie_name'])) {
  $new_array = break_cookie($_COOKIE['cookie_name']);
  //var_dump($new_array);
}

         $this->load->view('Cookie_view'); 
    } 
  
      public function display_cookie() { 
         echo get_cookie('cookie_name'); 
         $this->load->view('Cookie_view');
      } 
  
      public function deletecookie() { 
         delete_cookie('cookie_name'); 
         redirect('cookie/display'); 
      } 
		
   } 
?>
 <?php

?>