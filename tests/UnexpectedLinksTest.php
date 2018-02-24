<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForUnexpectedLinks;

class UnexpectedLinksTest extends TestCase
{

	/** @test **/
	public function links_in_unexpected_fields_are_caught()
	{
		$input = [
			'first_name' => 'www.spammer.com',
            'last_name'	=> 'http://spamfisher.com',
            'mobile'	=> 'https://www.fishysite.net',
		];

		$check = new CheckForUnexpectedLinks($input);

		$this->assertEquals($check->score(),3);
	}

	/** @test **/
	public function links_expected_fields_are_not_caught()
	{
		$input = [
			
			'message'	=> 	'https://www.fishysite.net',
		];

		$check = new CheckForUnexpectedLinks($input);

		$this->assertEquals($check->score(),0);
	}

	/** @test **/
	public function innocent_text_is_not_caught()
	{
		$input = [
			'first_name' => 'joe',
            'last_name'	=> 'soap',
            'mobile'	=> '123423423434',
		];

		$check = new CheckForUnexpectedLinks($input);

		$this->assertEquals($check->score(),0);
	}

}
