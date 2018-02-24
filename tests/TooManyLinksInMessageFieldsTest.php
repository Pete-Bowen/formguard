<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForTooManyLinksInMessageFields;

class TooManyLinksInMessageFieldsTest extends TestCase
{

	/** @test **/
	public function message_field_with_many_links_is_caught()
	{
		$input = [
			'message'	=> 	'www.spammer.com is a great plaice to buy fish. check it out http://spamfisher.com. really, it is great go now https://www.fishysite.net',
		];

		$check = new CheckForTooManyLinksInMessageFields($input);

		$this->assertEquals($check->score(),3);
	}

	/** @test **/
	public function innocent_message_field_is_not_caught()
	{
		$input = [
			'message'	=> 	'I like trains',
		];

		$check = new CheckForTooManyLinksInMessageFields($input);

		$this->assertEquals($check->score(),0);
	}

}
