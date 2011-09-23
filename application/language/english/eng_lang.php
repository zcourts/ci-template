<?php

/**
 * This language file is for generic sections of the site. For e.g 
 * the header and footer text, none generic may be categories
 */
// include sub language files for specific areas
//require_once 'category_lang.php';

$lang['register_success'] = 'Registration successful. Please check your e-mail and verify your account to continue';
$lang['register_fail'] = "Username OR password already exists, please choose a different one... Have you forgotten your login details? You can reset them";
$lang['fname'] = "First name";
$lang['lname'] = "Last name";
$lang['username'] = "Username";
$lang['password'] = "Password";
$lang['password1'] = "Confirmation password";
$lang['email'] = "Email";
$lang['email1'] = "Confirmation Email";
$lang['accept_terms'] = " terms must be agreed and accepted to become a member - Agreement ";
$lang['register_validation_error'] = "Some required fields were not completed, please try again";
$lang['register_mail_subject'] = "Tutslr.com account registration successful";
$lang['register_mail_message'] = '<p>Your account has been successfully registered. Please use the following link to verify your e-mail address and activate your account!</p><p>{$verification_url}</p>';
$lang['account_pending'] = "We're sorry, your account must be verified before you can sign in. Please check your e-mail.";
$lang['account_suspended'] = "Your account has been suspended, pending a moderator review. We should have informed you of this at the time of suspension. If not we will be doing so shortly. You will be unable to sign in until then.";
$lang['account_already_active'] = "No need to do that again, your account has been verified!";
$lang['account_verified'] = "Your account has been successfully verified!";
$lang['account_invalid_verification'] = "The verification code found doesn't exist or is invalid.";
$lang['username_password_invalid'] = "Username or password is invalid OR not yet registerd, please try again...";


