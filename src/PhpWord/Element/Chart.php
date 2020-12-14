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
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\Style\Chart as ChartStyle;
use PhpOffice\PhpWord\Element\Series;

/**
 * Chart element
 *
 * @since 0.12.0
 */
class Chart extends AbstractElement
{
    /**
     * Is part of collection
     *
     * @var bool
     */
    protected $collectionRelation = true;

    /**
     * Type
     *
     * @var string
     */
    private $type = 'pie';

    /**
     * Series
     *
     * @var \PhpOffice\PhpWord\Element\Series[]
     */
    private $series = array();

    /**
     * Chart style
     *
     * @var \PhpOffice\PhpWord\Style\Chart
     */
    private $style;
	
	private $categoryAxisLabel = '';
	private $valueAxisLabel = '';
	private $title = '';

    /**
     * Create new instance
     *
     * @param string $type
     * @param array $categories
     * @param array $values
     * @param array $style
     * @param null|mixed $seriesName
     */
    public function __construct($type, $categories, $values, $style = null, $seriesName = null)
    {
        $this->setType($type);
        //$this->addSeries($categories, $values, $seriesName);
        $this->style = $this->setNewStyle(new ChartStyle(), $style, true);
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $value
     */
    public function setType($value)
    {
        $enum = array('pie', 'doughnut', 'line', 'bar', 'stacked_bar', 'percent_stacked_bar', 'column', 'stacked_column', 'percent_stacked_column', 'area', 'radar', 'scatter');
        $this->type = $this->setEnumVal($value, $enum, 'pie');
    }

    /**
     * Add series
     *
     * @param array $categories
     * @param array $values
     * @param null|mixed $name
     */
    public function addSeries($categories, $values, $trendLine = null, $style = null)
    {
		$this->series[] = new Series($categories, $values, $trendLine, $style);
    }

    /**
     * Get series
     *
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Get chart style
     *
     * @return \PhpOffice\PhpWord\Style\Chart
     */
    public function getStyle()
    {
        return $this->style;
    }
	
	/**
	 * Get category axis label
	 *
	 * @return string
	 */
	public function getCategoryAxisLabel()
	{
		return $this->categoryAxisLabel;
	}
	
	/**
	 * Set category axis label.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setCategoryAxisLabel($value)
	{
		$this->categoryAxisLabel = $value;
	}
	
	/**
	 * Get value axis label
	 *
	 * @return string
	 */
	public function getValueAxisLabel()
	{
		return $this->valueAxisLabel;
	}
	
	/**
	 * Set value axis label.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setValueAxisLabel($value)
	{
		$this->valueAxisLabel = $value;
	}
	
	/**
	 * Get value title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * Set value title.
	 *
	 * @param string $value
	 * @return void
	 */
	public function setTitle($value)
	{
		$this->title = $value;
	}
}
