<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForShortPhoneNumbers;

class ShortPhoneNumbersTest extends TestCase
{

	/** @test **/
	public function short_phone_number_is_caught()
	{
		$input = [
			'phone'	=> 	123,
		];

		$check = new CheckForShortPhoneNumbers($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function long_phone_number_is_not_caught()
	{
		$input = [
			'phone'	=> 	447525757179,
		];

		$check = new CheckForShortPhoneNumbers($input);

		$this->assertEquals($check->score(),0);
	}

}
