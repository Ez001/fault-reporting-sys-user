<?php 
   #   Date modified: 29/03/2023
	
	trait Encryption 
  {
      // Encryption Function
      function encPword( $data )
      {
        return password_hash( $data , PASSWORD_DEFAULT );
      }

      // Decryption Function
      function decPword( $p, $hashed )
      {
        return password_verify( $p, $hashed );
      }

      // encrypt password with md5
      function encryptMd5( $pword ) 
      {
        $enc = md5( $pword );
        return $enc;
      }
      
      // encrypt data with hash_hmac
      function encryptHashHmac( $algo = 'sha512', $data = 'ABCD', $key = '-i8/*D' ) 
      {
        return hash_hmac( $algo, $data, $key );
      }
      
  }
?>