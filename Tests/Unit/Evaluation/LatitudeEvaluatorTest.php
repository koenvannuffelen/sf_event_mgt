<?php
namespace DERHANSEN\SfEventMgt\Tests\Unit\Evaluation;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Torben Hansen <derhansen@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class DERHANSEN\SfEventMgt\Evaluation\LatitudeEvaluator
 */
class LatitudeEvaluatorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * LatitudeEvaluator
	 *
	 * @var \DERHANSEN\SfEventMgt\Evaluation\LatitudeEvaluator
	 */
	protected $subject = NULL;

	/**
	 * Setup
	 *
	 * @return void
	 */
	protected function setUp() {
		$this->subject = new \DERHANSEN\SfEventMgt\Evaluation\LatitudeEvaluator();
	}

	/**
	 * Teardown
	 *
	 * @return void
	 */
	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * Data Provider for latitudeEvaluatorTest
	 *
	 * @return array
	 */
	public function latitudeEvaluatorDataProvider() {
		return array(
			'emptyValue' => array(
				NULL,
				'0.000000'
			),
			'givenIntegerGetsConvertedToFloatWith6Decimals' => array(
				1,
				'1.000000'
			),
			'maxValuePossible' => array(
				90,
				'90.000000'
			),
			'minValuePossible' => array(
				-90,
				'-90.000000'
			),
			'greaterThanMaxValueNotPossible' => array(
				90.000001,
				'0.000000'
			),
			'lessThanMinValueNotPossible' => array(
				-90.000001,
				'0.000000'
			),
			'validLongitudeIsReturned' => array(
				12.345678,
				'12.345678'
			),
		);
	}

	/**
	 * Tests for latitudeEvaluator with the given dataProvider
	 *
	 * @test
	 * @dataProvider latitudeEvaluatorDataProvider
	 *
	 * @return void
	 */
	public function latitudeEvaluatorTest($value, $expected){
		$set = NULL;
		$actual = $this->subject->evaluateFieldValue($value, NULL, $set);
		$this->assertSame($actual, $expected);
	}

}
