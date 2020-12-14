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

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\Style\Series as SeriesStyle;
use PhpOffice\PhpWord\Style\TrendLine as TrendLineStyle;

/**
 * Series element
 *
 * @since 0.12.0
 */
class Series extends AbstractElement
{
	
	/**
	 * Series style
	 *
	 * @var \PhpOffice\PhpWord\Style\Series
	 */
	private $style;
	
	/**
	 * Trendline style
	 *
	 * @var \PhpOffice\PhpWord\Style\TrendLine
	 */
	private $trendLine;
	
	/**
	 * Categories
	 *
	 * @var mixed[]
	 */
	private $categories = array();
	
	/**
	 * Values
	 *
	 * @var mixed[]
	 */
	private $values = array();
	
	/**
	 * Create new instance
	 *
	 * @param string $type
	 * @param array $categories
	 * @param array $values
	 * @param array $style
	 */
	public function __construct($categories, $values, $trendLine = null, $style = null)
	{
		$this->categories = $categories;
		$this->values = $values;
		if ($trendLine !== null){
			$this->trendLine = $this->setNewStyle(new TrendLineStyle(), $trendLine, true);
		}
		$this->style = $this->setNewStyle(new SeriesStyle(), $style, true);
	}
	
	/**
	 * Get categories.
	 *
	 * @return mixed[]
	 */
	public function getCategories()
	{
		return $this->categories;
	}
	
	/**
	 * Set categories.
	 *
	 * @param mixed[] $value
	 * @return void
	 */
	public function setCategories($value)
	{
		$this->categories = $value;
	}
	
	/**
	 * Get values.
	 *
	 * @return mixed[]
	 */
	public function getValues()
	{
		return $this->values;
	}
	
	/**
	 * Set values.
	 *
	 * @param mixed[] $value
	 * @return void
	 */
	public function setValues($value)
	{
		$this->values = $value;
	}
	
	/**
	 * Get series style
	 *
	 * @return \PhpOffice\PhpWord\Style\Series
	 */
	public function getStyle()
	{
		return $this->style;
	}
	
	/**
	 * Get trendline.
	 *
	 * @return \PhpOffice\PhpWord\Style\TrendLine
	 */
	public function getTrendLine()
	{
		return $this->trendLine;
	}
	
	/**
	 * Set trendline.
	 *
	 * @param \PhpOffice\PhpWord\Style\TrendLine $value
	 * @return void
	 */
	public function setTrendLine($value)
	{
		$this->trendLine = $value;
	}
}
