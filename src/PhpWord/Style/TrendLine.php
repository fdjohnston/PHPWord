<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Style;

/**
 * Trend Line style
 *
 * @since 0.12.0
 */
class TrendLine extends AbstractStyle
{
	
	const TREND_LINE_TYPE_LINEAR			= 'linear';
	const TREND_LINE_TYPE_EXPONENTIAL	= 'exponential';
	
	/**
	 * $type
	 *
	 * @var string
	 */
	private $type;
	
	/**
	 * Displays R Squared value
	 *
	 * @var bool
	 */
	private $dispRSqr = false;
	
	/**
	 * Displays equation
	 *
	 * @var bool
	 */
	private $dispEq = false;
	
	/**
	 * Font color
	 *
	 * @var string
	 */
	private $color;
	
	/**
	 * Create a new instance
	 *
	 * @param array $style
	 */
	public function __construct($style = array())
	{
		$this->setStyleByArray($style);
	}
	
	/**
	 * Get type
	 *
	 * @return int
	 */
	public function getType()
	{
		return $this->type;
	}
	
	/**
	 * Set type
	 *
	 * @param string $value
	 * @return self
	 */
	public function setType($value = null)
	{
		$enum = array(self::TREND_LINE_TYPE_LINEAR, self::TREND_LINE_TYPE_EXPONENTIAL);
		$this->type = $this->setEnumVal($value, $enum, $this->type);
		
		return $this;
	}
	
	/**
	 * Display R squared value
	 *
	 * @return bool
	 */
	public function displayRSqr()
	{
		return $this->dispRSqr;
	}
	
	/**
	 * Set R squared value
	 *
	 * @param bool $value
	 * @return self
	 */
	public function setDisplayRSqr($value = true)
	{
		$this->dispRSqr = $this->setBoolVal($value, $this->dispRSqr);
		
		return $this;
	}
	
	/**
	 * Display equation
	 *
	 * @return bool
	 */
	public function displayEq()
	{
		return $this->dispEq;
	}
	
	/**
	 * Set display equation
	 *
	 * @param bool $value
	 * @return self
	 */
	public function setDisplayEq($value = true)
	{
		$this->dispEq = $this->setBoolVal($value, $this->dispEq);
		
		return $this;
	}
	
	/**
	 * Get font color
	 *
	 * @return string
	 */
	public function getColor() {
		return $this->color;
	}
	
	/**
	 * Set font color
	 *
	 * @param string $value
	 *
	 * @return self
	 */
	public function setColor($value = null) {
		$this->color = $value;
		
		return $this;
	}
}
