<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForTextInPhoneNumberFields;

class TextInPhoneNumberFieldsTest extends TestCase
{

	/** @test **/
	public function text_in_phone_number_fields_is_caught()
	{
		$input = [
			'phone'	=> 	'buy my viagra',
		];

		$check = new CheckForTextInPhoneNumberFields($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function innocent_phone_number_is_not_caught()
	{
		$input = [
			'phone'	=> 	'+447527875439',
		];

		$check = new CheckForTextInPhoneNumberFields($input);

		$this->assertEquals($check->score(),0);
	}

}
