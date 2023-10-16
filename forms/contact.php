<?php
  /**
   * Requires the "PHP Email Form" library
   * The "PHP Email Form" library is available only in the pro version of the template
   * The library should be uploaded to: vendor/php-email-form/php-email-form.php
   * For more info and help: https://bootstrapmade.com/php-email-form/
   */

  // Reemplaza 'amarti1@ies-eugeni.cat' con tu dirección de correo electrónico de recepción real.
  $receiving_email_address = 'arnaurom@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('No se puede cargar la biblioteca "PHP Email Form"!');
  }

  $contact = new PHP_Email_Form();
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Descomenta el código a continuación si deseas utilizar SMTP para enviar correos electrónicos. Debes ingresar las credenciales SMTP correctas.

  $contact->smtp = array(
    'host' => 'smtp.gmail.com',  // Debes proporcionar el servidor SMTP adecuado de tu proveedor de correo.
    'username' => 'arnaurom@gmail.com',  // Tu dirección de correo electrónico
    'password' => 'Armarro10',  // Tu contraseña de correo electrónico
    'port' => '587',  // El puerto SMTP adecuado (587 para TLS, 465 para SSL)
  );

  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  echo $contact->send();
?>
