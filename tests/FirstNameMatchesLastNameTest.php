<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckIfFirstNameMatchesLastName;

class FirstNameMatchesLastNameTest extends TestCase
{

	/** @test **/
	public function submission_with_matching_first_and_last_name_is_caught()
	{
		$input = [
			'first_name'	=> 'joe',
            'last_name'		=> 'joe',
		];

		$check = new CheckIfFirstNameMatchesLastName($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function submission_with_different_first_and_last_name_is_not_caught()
	{
		$input = [
			'first_name'	=> 'joe',
            'last_name'		=> 'soap',
            
		];

		$check = new CheckIfFirstNameMatchesLastName($input);

		$this->assertEquals($check->score(),0);
	}

}
