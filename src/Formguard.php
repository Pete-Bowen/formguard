<?php

namespace Petebowen\Formguard;

use Petebowen\Formguard\CheckForBlackListedEmailAddress;
use Petebowen\Formguard\CheckForCyrillicText;
use Petebowen\Formguard\CheckForEmptyForm;
use Petebowen\Formguard\CheckForHoneyTrap;
use Petebowen\Formguard\CheckForNoReplyEmailAddress;
use Petebowen\Formguard\CheckForNumbersInNameFields;
use Petebowen\Formguard\CheckForShortPhoneNumbers;
use Petebowen\Formguard\CheckForSpamWords;
use Petebowen\Formguard\CheckForTextInPhoneNumberFields;
use Petebowen\Formguard\CheckForTooManyUnexpectedLinks;

use Petebowen\Formguard\CheckIfAllVisibleFieldsAreEmpty;
use Petebowen\Formguard\CheckIfFirstNameMatchesLastName;
use Petebowen\Formguard\CheckIfNameFieldsAreEmpty;
use Petebowen\Formguard\CheckIfPhoneNumberIsZeroes;


class Formguard
{
	/**
	 * Associative array of form fields and values.
	 *
	 * @var array
	 **/
	protected $input;


	/**
	 * The spam score as a percentage.
	 * The higher the score the more likely it is that this is a spam submission
	 *
	 * @var decimal
	 **/
    protected $score = 0;
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function spamScore()
    {

    	$check = new CheckForBlackListedEmailAddress($this->input);
    	$this->score += $check->score(); * weight here

    	$check = new CheckForCyrillicText($this->input);
    	$this->score += $check->score();

    	$check = new CheckForEmptyForm($this->input);
    	$this->score += $check->score();

    	$check = new CheckForHoneyTrap($this->input);
    	$this->score += $check->score();

    	$check = new CheckForNoReplyEmailAddress($this->input);
    	$this->score += $check->score();

    	$check = new CheckForNumbersInNameFields($this->input);
    	$this->score += $check->score();

    	$check = new CheckForShortPhoneNumbers($this->input);
    	$this->score += $check->score();

    	$check = new CheckForSpamWords($this->input);
    	$this->score += $check->score();

    	$check = new CheckForTextInPhoneNumberFields($this->input);
    	$this->score += $check->score();

    	$check = new CheckForTooManyUnexpectedLinks($this->input);
    	$this->score += $check->score();

    	$check = new CheckIfAllVisibleFieldsAreEmpty($this->input);
    	$this->score += $check->score();

    	$check = new CheckIfFirstNameMatchesLastName($this->input);
    	$this->score += $check->score();

    	$check = new CheckIfNameFieldsAreEmpty($this->input);
    	$this->score += $check->score();

    	$check = new CheckIfPhoneNumberIsZeroes($this->input);
    	$this->score += $check->score();

    	return $this->score();
    }
}
