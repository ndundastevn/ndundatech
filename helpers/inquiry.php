<?php
 
 require_once('../functions/reusableQuery.php');
 
 
 /** submit an inquiry */
 if (isset($_POST['submitInquiry'])) {
	 unset($_POST['submitInquiry']);
	 //dd($_POST);

	 $address_mail = "info@wotekejani.co.ke";
	$user_fname = mysqli_real_escape_string($mysqli, $_POST['inquiry_name']);
	$user_email = mysqli_real_escape_string($mysqli, $_POST['inquiry_email']);
	$user_phone = mysqli_real_escape_string($mysqli, $_POST['inquiry_phone']);
	$inquiry_subject = mysqli_real_escape_string($mysqli, $_POST['inquiry_subject']);
	$inquiry_message = mysqli_real_escape_string($mysqli, $_POST['inquiry_msg']);
	 
	 $res = saveData($_POST, 'inquiries');
	 if ($res) {
		include('../mailers/inquiry.php');
		$success = "Message submited successfuly. Thank you.";
	 }else{
		 $err = "Error, Failed to submit";
	 }
	 
 }

 ?>