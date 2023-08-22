<?php
namespace BLOG\core;
class Valid 
{
   public function checkEmpty($value, &$errors = [], $errorMessage = '')
   {
      if (empty($value)) {
         $errors[] = !empty($errorMessage) ? $errorMessage : 'Value is required';
      }
   }

   public function checkAlphanumeric($value, &$errors = [], $errorMessage = '')
   {
      if (!ctype_alnum($value)) {
         $errors[] = !empty($errorMessage) ? $errorMessage : 'Only letters and numbers are allowed';
      }
   }

   public function filterEmail($value, &$errors = [], $errorMessage = '')
   {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
         $errors[] = !empty($errorMessage) ? $errorMessage : 'Invalid email format';
      }
   }

   public function validatePasswordLength($password, &$errors = [], $minLength = 8, $maxLength = 20)
   {
      $length = strlen($password);
      if ($length < $minLength) {
         $errors['password'] = "Password should be at least $minLength characters long.";
      } elseif ($length > $maxLength) {
         $errors['password'] = "Password should not exceed $maxLength characters.";
      }
   }

   public function validatePasswordFormat($value, &$errors = [], $errorMessage = '')
   {
      if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/", $value)) {
         $errors[] = !empty($errorMessage) ? $errorMessage : 'Password should include at least one uppercase letter, one lowercase letter, one number, and one special character.';
      }
   }

   public function checkCommonPasswords($value, &$errors = [], $commonPasswords = ['password', '123456', 'qwerty'], $errorMessage = '')
   {
      if (in_array($value, $commonPasswords)) {
         $errors[] = !empty($errorMessage) ? $errorMessage : 'Password is commonly used and not secure.';
      }
   }

   public function validateFileFormat($filePath, &$errors = [], $allowedTypes = ['image/jpeg', 'image/png'], $errorMessage = '')
   {
      if (!empty($filePath)) {
         $fileType = mime_content_type($filePath);
         if (!in_array($fileType, $allowedTypes)) {
            $errors[] = !empty($errorMessage) ? $errorMessage : 'Invalid file format. Only JPG and PNG files are allowed';
         }
      }
   }

   public function testInput($value)
   {
       $data = trim($value);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
}
