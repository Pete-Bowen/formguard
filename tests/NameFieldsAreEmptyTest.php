<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckIfNameFieldsAreEmpty;

class NameFieldsAreEmptyTest extends TestCase
{

	/** @test **/
	public function empty_first_and_last_name_is_caught()
	{
		$input = [
			'first_name'	=> '',
            'last_name'		=> '',
		];

		$check = new CheckIfNameFieldsAreEmpty($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function filled_first_or_last_name_is_not_caught()
	{
		$input = [
			'first_name'	=> 'joe',
            'last_name'		=> '',
            
		];

		$check = new CheckIfNameFieldsAreEmpty($input);

		$this->assertEquals($check->score(),0);

		$input = [
			'first_name'	=> '',
            'last_name'		=> 'soap',
            
		];

		$check = new CheckIfNameFieldsAreEmpty($input);

		$this->assertEquals($check->score(),0);
	}

}
