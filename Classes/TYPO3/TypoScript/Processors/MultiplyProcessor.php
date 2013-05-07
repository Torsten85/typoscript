<?php
namespace TYPO3\TypoScript\Processors;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TypoScript".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Multiplies a number or numeric string with the given factor.
 *
 */
class MultiplyProcessor implements \TYPO3\TypoScript\ProcessorInterface {

	/**
	 * @var integer
	 */
	protected $factor = NULL;

	/**
	 * The factor to multiply the subject with.
	 *
	 * @param integer $factor the number of digits after the decimal point. Negative values are also supported. (-1 multiplies to full 10ths)
	 * @return void
	 */
	public function setFactor($factor) {
		$this->factor = $factor;
	}

	/**
	 * @return integer the number of digits after the decimal point. Negative values are also supported. (-1 multiplies to full 10ths)
	 */
	public function getFactor() {
		return $this->factor;
	}

	/**
	 * Multiplies a given number or numeric string $subject with $factor.
	 *
	 * @param mixed $subject The subject to multiply.
	 * @return float The multiplied value ($subject * $this->factor)
	 * @throws \TYPO3\TypoScript\Exception
	 */
	public function process($subject) {
		if (!is_numeric($subject)) {
			throw new \TYPO3\TypoScript\Exception('Expected a number or numeric string as subject.', 1224146988);
		}
		if (!is_float($this->factor) && !is_integer($this->factor)) {
			throw new \TYPO3\TypoScript\Exception('Expected a number as factor.', 1224146995);
		}
		$subject = floatval($subject);
		return $subject * $this->factor;
	}
}
?>