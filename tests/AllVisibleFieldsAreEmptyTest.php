<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckIfAllVisibleFieldsAreEmpty;

class AllVisibleFieldsAreEmptyTest extends TestCase
{

	/** @test **/
	public function submission_with_empty_visible_fields_is_caught()
	{
		$input = [
			'first_name'	=> '',
            'last_name'		=> '',
            'email'			=> '',
            'phone'			=> '',
            'mobile'		=> '',
		];

		$check = new CheckIfAllVisibleFieldsAreEmpty($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function submission_with_filled_visible_fields_is_not_caught()
	{
		$input = [
			'first_name'	=> 'joe',
            'last_name'		=> 'soap',
            'email'			=> 'innocent@gmail.com',
            'phone'			=> '2323742374',
            'mobile'		=> '28424230833',
		];

		$check = new CheckIfAllVisibleFieldsAreEmpty($input);

		$this->assertEquals($check->score(),0);
	}

}
