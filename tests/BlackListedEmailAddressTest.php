<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForBlackListedEmailAddress;

class BlackListedEmailAddressTest extends TestCase
{

	/** @test **/
	public function black_listed_email_address_is_caught()
	{
		$input = ['email'=> 'bob.mkt@gmail.com'];

		$check = new CheckForBlackListedEmailAddress($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function innocent_email_address_is_not_caught()
	{
		$input = ['email'=> 'innocent@gmail.com'];

		$check = new CheckForBlackListedEmailAddress($input);

		$this->assertEquals($check->score(),0);
	}


}
