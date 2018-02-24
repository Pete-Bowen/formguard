<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForEmptyForm;

class EmptyFormTest extends TestCase
{

	/** @test **/
	public function empty_form_is_caught()
	{
		$input = [];

		$check = new CheckForEmptyForm($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function completed_form_is_not_caught()
	{
		$input = [
			'first_name'	=> 'pete',
			'last_name'		=> 'bowen',
			'email'			=> 'innocent@gmail.com',
		];

		$check = new CheckForEmptyForm($input);

		$this->assertEquals($check->score(),0);
	}


}
