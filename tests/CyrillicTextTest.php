<?php

use PHPUnit\Framework\TestCase;
use Petebowen\Formguard\Checks\CheckForCyrillicText;

class CyrillicTextTest extends TestCase
{

	/** @test **/
	public function cyrillic_text_is_caught()
	{
		$input = ['message'=> 'SФԠЭ JЦЙҠ'];

		$check = new CheckForCyrillicText($input);

		$this->assertEquals($check->score(),1);
	}

	/** @test **/
	public function regular_text_is_not_caught()
	{
		$input = ['message'=> 'this is a good message'];

		$check = new CheckForCyrillicText($input);

		$this->assertEquals($check->score(),0);
	}


}
