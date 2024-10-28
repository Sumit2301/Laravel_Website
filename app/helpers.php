<?php
//use Mail;
use Illuminate\Support\Facades\Mail;

if (!function_exists('sendMail')) {
  function sendMail($to,$from,$subject,$html)
  {
  	$from = ($from)?$from:env('MAIL_FROM_ADDRESS');
	$result = Mail::send(array(), array(), function ($message) use ($to,$from,$subject,$html) {
	  $message->to($to)
	    ->subject($subject)
	    ->from($from)
	    ->setBody($html, 'text/html');
	});

    return ($result)?1:0;
  }
}