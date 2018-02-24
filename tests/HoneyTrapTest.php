<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForHoneyTrap;

class HoneyTrapTest extends TestCase
{

	/** @test **/
	public function guilty_honeytrap_is_caught()
	{
		$input = [
			'text1'	=>	'some',
			'text2'	=>	'spam',
		];
		
		$check = new CheckForHoneyTrap($input);
		
		$this->assertEquals($check->score(),2);
	}

	/** @test **/
	public function innocent_honeytrap_is_not_caught()
	{
		$input = [
			'text1'	=>	'',
			'text2'	=>	'',
		];
		
		$check = new CheckForHoneyTrap($input);
		
		$this->assertEquals($check->score(),0);
	}

}