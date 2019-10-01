<?php

namespace App\Services;

class Notif{

	private $email;

	public function __construct($email, FileUploader $fileUploader){
		dump($email);
		dump($fileUploader);
		die;
		$this->email = $email;
	}

	public function sendNotif(){

	}

}