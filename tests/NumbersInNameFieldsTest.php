<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForNumbersInNameFields;

class NumbersInNameFieldsTest extends TestCase
{

	/** @test **/
	public function numbers_in_name_fields_are_caught()
	{
		$input = [
			'first_name'	=> 	'1235485',
			'last_name'		=>	'8345834',
		];

		$check = new CheckForNumbersInNameFields($input);

		$this->assertEquals($check->score(),2);
	}

	/** @test **/
	public function innocent_names_are_not_caught()
	{
		$input = [
			'first_name'	=> 	'joe',
			'last_name'		=>	'soap',
		];

		$check = new CheckForNumbersInNameFields($input);

		$this->assertEquals($check->score(),0);
	}

}
