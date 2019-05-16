<?php
	include_once('./includes/class.upload.php');
	$handle = new upload($_FILES['uploadedPhoto']);
	session_start();
	$admission_number = $_SESSION['admission_number'];
	$message = '';

	if ($handle->uploaded) {
	  $handle->file_new_name_body   = ''.$admission_number.'';
	  $handle->image_resize         = true;
	  $handle->image_x              = 400;
	  $handle->image_y              = 400;
	  $handle->image_convert        = 'jpg';
	  $handle->allowed 				= array('image/*');
	  $handle->mime_check 			= true;
	  $handle->dir_chmod 			= 0777;
	  $handle->file_overwrite = true;
	  $handle->process(realpath(dirname(__FILE__)).'/data/photos/');
	  if ($handle->processed) {
	    $message = $message.'Photo Saved'.'\n';
	    $handle->clean();
	  } else {
	    $message = $message.'Error : ' . $handle->error.'\n';
	  }
	}else{
		$message = $message."Photo upload failed".'\n';
	}

	$handle = new upload($_FILES['uploadedResume']);
	if ($handle->uploaded) {
	  $handle->file_new_name_body   = ''.$admission_number.'';
	  $handle->allowed = array('application/pdf');
	  $handle->mime_check 			= true;
	  $handle->dir_chmod 			= 0777;
	  $handle->file_overwrite = true;
	  $handle->process(realpath(dirname(__FILE__)).'/data/resume/');
	  if ($handle->processed) {
	    $message = $message.'Resume Saved'.'\n';
	    $handle->clean();
	  } else {
	    $message = $message.'Error : ' . $handle->error;
	  }
	}else{
		$message = $message."Resume upload failed".'\n';
	}
	session_start();
	$_SESSION["message"] = $message;
	$newURL = 'profile.php';
	header('Location: '.$newURL);
	die();
	

?>