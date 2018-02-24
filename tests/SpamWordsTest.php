<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForSpamWords;

class SpamWordsTest extends TestCase
{

	/** @test **/
	public function spam_words_are_caught()
	{
		$input = [
			'message'	=> 	'buy my viagra',
		];

		$check = new CheckForSpamWords($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function innocent_words_are_not_caught()
	{
		$input = [
			'message'	=> 	'I want to buy guest linen',
		];

		$check = new CheckForSpamWords($input);

		$this->assertEquals($check->score(),0);
	}

}
