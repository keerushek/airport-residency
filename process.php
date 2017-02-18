<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array


	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';

	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';

	if (empty($_POST['mobile']))
		$errors['mobile'] = 'Mobile is required.';
	
	if (empty($_POST['fromDate']))
		$errors['fromDate'] = 'From date is required.';
	
	if (empty($_POST['toDate']))
		$errors['toDate'] = 'To date is required.';
	
	if (empty($_POST['guests']))
		$errors['guests'] = 'Guests is required.';
	
	if (empty($_POST['rooms']))
		$errors['rooms'] = 'Rooms is required.';

// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

		// show a message of success and provide a true success variable
		$to = "guna@airportgg.com,airportgeethagardenia@gmail.com,sekar@airport-residency.com”;
		$subject = "Booking Request";
		$txt = "From: " . $_POST['name'] ."\nEmail: ". $_POST['email']."\nMobile: ". $_POST['mobile']."\nFrom Date: ". $_POST['fromDate']."\nTo Date: ". $_POST['toDate']."\nGuests: ". $_POST['guests']."\nRooms: ". $_POST['rooms'];
		$headers = "From: " . $_POST['email'];
		$sendMail = mail($to, $subject, $txt, $headers);

		if ($sendMail){
		  $data['success'] = true;
		  $data['message'] = 'Success!';
		} else {
        	  $data['success'] = true;
		  $data['message'] = 'Success!';
                }
	}

	// return all our data to an AJAX call
	echo json_encode($data);