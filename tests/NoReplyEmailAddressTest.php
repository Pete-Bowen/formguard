<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForNoReplyEmailAddress;

class NoReplyEmailAddressTest extends TestCase
{

	/** @test **/
	public function noreply_email_address_is_caught()
	{
		$input = ['email'=> 'noreply@gmail.com'];

		$check = new CheckForNoReplyEmailAddress($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function innocent_email_address_is_not_caught()
	{
		$input = ['email'=> 'innocent@gmail.com'];

		$check = new CheckForNoReplyEmailAddress($input);

		$this->assertEquals($check->score(),0);
	}

}
