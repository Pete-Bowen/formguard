<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckIfPhoneNumbersAreZeroes;

class PhoneNumbersAreZeroesTest extends TestCase
{

	/** @test **/
	public function phone_number_field_with_zeroes_is_caught()
	{
		$input = [
			'phone'	=> '000-000-0000',
		];

		$check = new CheckIfPhoneNumbersAreZeroes($input);

		$this->assertEquals($check->score(),1);

		$input = [
			'mobile'	=> '000-000-0000',
		];

		$check = new CheckIfPhoneNumbersAreZeroes($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function innocent_phone_number_field__is_not_caught()
	{
		$input = [
			'phone'	=> '44 82 4965624',
		];


		$check = new CheckIfPhoneNumbersAreZeroes($input);

		$this->assertEquals($check->score(),0);

		$input = [
			'mobile'	=> '44 82 4965624',
		];


		$check = new CheckIfPhoneNumbersAreZeroes($input);

		$this->assertEquals($check->score(),0);
	}

}
