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

namespace PhpOffice\PhpWord\Style;

/**
 * Chart style
 *
 * @since 0.12.0
 */
class Chart extends AbstractStyle
{
	const MARKER_SYMBL_SQUARE 	= 'square';
	const MARKER_SYMBL_DIAMOND 	= 'diamond';
	const MARKER_SYMBL_TRIANGLE = 'triangle';
	const MARKER_SYMBL_X 		= 'x';
	const MARKER_SYMBL_STAR 	= 'star';
	const MARKER_SYMBL_DOT 		= 'dot';
	const MARKER_SYMBL_DASH 	= 'dash';
	const MARKER_SYMBL_CIRCLE 	= 'circle';
	const MARKER_SYMBL_PLUS 	= 'plus';
	
	const DISP_BLANK_AS_ZERO	= 'zero';
	const DISP_BLANK_AS_GAP		= 'gap';
	
	const LEGEND_POS_RIGHT		= 'r';
	const LEGEND_POS_LEFT		= 'l';
	const LEGEND_POS_TOP		= 't';
	const LEGEND_POS_BOTTOM		= 'b';
	
    /**
     * Width (in EMU)
     *
     * @var int
     */
    private $width = 1000000;

    /**
     * Height (in EMU)
     *
     * @var int
     */
    private $height = 1000000;

    /**
     * Is 3D; applies to pie, bar, line, area
     *
     * @var bool
     */
    private $is3d = false;

    /**
     * A list of colors to use in the chart
     *
     * @var array
     */
    private $colors = array();

    /**
     * Chart title
     *
     * @var string
     */
    private $title = null;

    /**
     * Chart legend visibility
     *
     * @var bool
     */
    private $showLegend = false;

    /**
     * A list of display options for data labels
     *
     * @var array
     */
    private $dataLabelOptions = array(
        'showVal'          => true, // value
        'showCatName'      => true, // category name
        'showLegendKey'    => false, //show the cart legend
        'showSerName'      => false, // series name
        'showPercent'      => false,
        'showLeaderLines'  => false,
        'showBubbleSize'   => false,
    );

    /**
     * A string that tells the writer where to write chart labels or to skip
     * "nextTo" - sets labels next to the axis (bar graphs on the left) (default)
     * "low" - labels on the left side of the graph
     * "high" - labels on the right side of the graph
     *
     * @var string
     */
    private $categoryLabelPosition = 'nextTo';

    /**
     * A string that tells the writer where to write chart labels or to skip
     * "nextTo" - sets labels next to the axis (bar graphs on the bottom) (default)
     * "low" - labels are below the graph
     * "high" - labels above the graph
     *
     * @var string
     */
    private $valueLabelPosition = 'nextTo';

    /**
     * @var string
     */
    private $categoryAxisTitle;

    /**
     * @var string
     */
    private $valueAxisTitle;

    /**
     * The position for major tick marks
     * Possible values are 'in', 'out', 'cross', 'none'
     *
     * @var string
     */
    private $majorTickMarkPos = 'none';

    /**
     * Show labels for axis
     *
     * @var bool
     */
    private $showAxisLabels = false;
	
	/**
	 * Show titles for axis
	 *
	 * @var bool
	 */
	private $showAxisTitles = false;
	
	/**
	 * Show title
	 *
	 * @var bool
	 */
	private $showTitle = false;
	
	/**
	 * Legend position
	 *
	 * @var string
	 */
	private $legendPos = self::LEGEND_POS_RIGHT;
	
	/**
	 * Legend overlay
	 *
	 * @var bool
	 */
	private $legendOverlay = false;

    /**
     * Show Gridlines for Y-Axis
     *
     * @var bool
     */
    private $gridY = false;

    /**
     * Show Gridlines for X-Axis
     *
     * @var bool
     */
    private $gridX = false;
	
	private $majorUnitX;
	private $majorUnitY = 'auto';
	
	/**
	 * How to display gaps in the graph
	 *
	 * @var string
	 */
	private $display_blank_as = self::DISP_BLANK_AS_GAP;

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
     * Get width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set width
     *
     * @param int $value
     * @return self
     */
    public function setWidth($value = null)
    {
        $this->width = $this->setIntVal($value, $this->width);

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set height
     *
     * @param int $value
     * @return self
     */
    public function setHeight($value = null)
    {
        $this->height = $this->setIntVal($value, $this->height);

        return $this;
    }

    /**
     * Is 3D
     *
     * @return bool
     */
    public function is3d()
    {
        return $this->is3d;
    }

    /**
     * Set 3D
     *
     * @param bool $value
     * @return self
     */
    public function set3d($value = true)
    {
        $this->is3d = $this->setBoolVal($value, $this->is3d);

        return $this;
    }

    /**
     * Get the list of colors to use in a chart.
     *
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Set the colors to use in a chart.
     *
     * @param array $value a list of colors to use in the chart
     */
    public function setColors($value = array())
    {
        $this->colors = $value;

        return $this;
    }

    /**
     * Get the chart title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the chart title
     *
     * @param string $value
     */
    public function setTitle($value = null)
    {
        $this->title = $value;

        return $this;
    }

    /**
     * Get chart legend visibility
     *
     * @return bool
     */
    public function isShowLegend()
    {
        return $this->showLegend;
    }

    /**
     * Set chart legend visibility
     *
     * @param bool $value
     */
    public function setShowLegend($value = false)
    {
        $this->showLegend = $value;

        return $this;
    }

    /**
     * Show labels for axis
     *
     * @return bool
     */
    public function showAxisLabels()
    {
        return $this->showAxisLabels;
    }

    /**
     * Set labels for axis.
     *
     * @param bool $value
     * @return self
     */
    public function setShowAxisLabels($value = true)
    {
        $this->showAxisLabels = $this->setBoolVal($value, $this->showAxisLabels);

        return $this;
    }
	
	/**
	 * Show titles for axis
	 *
	 * @return bool
	 */
	public function showAxisTitles()
	{
		return $this->showAxisTitles;
	}
	
	/**
	 * Set titles for axis
	 *
	 * @param bool $value
	 * @return self
	 */
	public function setShowAxisTitles($value = true)
	{
		$this->showAxisTitles = $this->setBoolVal($value, $this->showAxisTitles);
		
		return $this;
	}

    /**
     * get the list of options for data labels
     *
     * @return array
     */
    public function getDataLabelOptions()
    {
        return $this->dataLabelOptions;
    }

    /**
     * Set values for data label options.
     * This will only change values for options defined in $this->dataLabelOptions, and cannot create new ones.
     *
     * @param array $values [description]
     */
    public function setDataLabelOptions($values = array())
    {
        foreach (array_keys($this->dataLabelOptions) as $option) {
            if (isset($values[$option])) {
                $this->dataLabelOptions[$option] = $this->setBoolVal($values[$option], $this->dataLabelOptions[$option]);
            }
        }
    }

    /**
     * Show Gridlines for Y-Axis
     *
     * @return bool
     */
    public function showGridY()
    {
        return $this->gridY;
    }

    /**
     * Set show Gridlines for Y-Axis
     *
     * @param bool $value
     * @return self
     */
    public function setShowGridY($value = true)
    {
        $this->gridY = $this->setBoolVal($value, $this->gridY);

        return $this;
    }

    /**
     * Get the categoryLabelPosition setting
     *
     * @return string
     */
    public function getCategoryLabelPosition()
    {
        return $this->categoryLabelPosition;
    }

    /**
     * Set the categoryLabelPosition setting
     * "none" - skips writing  labels
     * "nextTo" - sets labels next to the  (bar graphs on the left)
     * "low" - labels on the left side of the graph
     * "high" - labels on the right side of the graph
     *
     * @param mixed $labelPosition
     * @return self
     */
    public function setCategoryLabelPosition($labelPosition)
    {
        $enum = array('nextTo', 'low', 'high');
        $this->categoryLabelPosition = $this->setEnumVal($labelPosition, $enum, $this->categoryLabelPosition);

        return $this;
    }

    /**
     * Get the valueAxisLabelPosition setting
     *
     * @return string
     */
    public function getValueLabelPosition()
    {
        return $this->valueLabelPosition;
    }

    /**
     * Set the valueLabelPosition setting
     * "none" - skips writing labels
     * "nextTo" - sets labels next to the value
     * "low" - sets labels are below the graph
     * "high" - sets labels above the graph
     *
     * @param string
     * @param mixed $labelPosition
     */
    public function setValueLabelPosition($labelPosition)
    {
        $enum = array('nextTo', 'low', 'high');
        $this->valueLabelPosition = $this->setEnumVal($labelPosition, $enum, $this->valueLabelPosition);

        return $this;
    }

    /**
     * Get the categoryAxisTitle
     * @return string
     */
    public function getCategoryAxisTitle()
    {
        return $this->categoryAxisTitle;
    }

    /**
     * Set the title that appears on the category side of the chart
     * @param string $axisTitle
     */
    public function setCategoryAxisTitle($axisTitle)
    {
        $this->categoryAxisTitle = $axisTitle;

        return $this;
    }

    /**
     * Get the valueAxisTitle
     * @return string
     */
    public function getValueAxisTitle()
    {
        return $this->valueAxisTitle;
    }

    /**
     * Set the title that appears on the value side of the chart
     * @param string $axisTitle
     */
    public function setValueAxisTitle($axisTitle)
    {
        $this->valueAxisTitle = $axisTitle;

        return $this;
    }

    public function getMajorTickPosition()
    {
        return $this->majorTickMarkPos;
    }

    /**
     * Set the position for major tick marks
     * @param string $position
     */
    public function setMajorTickPosition($position)
    {
        $enum = array('in', 'out', 'cross', 'none');
        $this->majorTickMarkPos = $this->setEnumVal($position, $enum, $this->majorTickMarkPos);
    }

    /**
     * Show Gridlines for X-Axis
     *
     * @return bool
     */
    public function showGridX()
    {
        return $this->gridX;
    }

    /**
     * Set show Gridlines for X-Axis
     *
     * @param bool $value
     * @return self
     */
    public function setShowGridX($value = true)
    {
        $this->gridX = $this->setBoolVal($value, $this->gridX);

        return $this;
    }
	
	/**
	 * Set the major unit for Y-Axis
	 *
	 * @return string
	 */
	public function majorUnitY() {
		return $this->majorUnitY;
	}
	
	/**
	 * Set major unit for Y-Axis
	 *
	 * @param string $value
	 *
	 * @return self
	 */
	public function setMajorUnitY($value = 'auto') {
		$this->majorUnitY = $value;
		
		return $this;
	}
	
	/**
	 * Get display blanks as
	 *
	 * @return string
	 */
	public function getDisplayBlanksAs()
	{
		return $this->display_blank_as;
	}
	
	/**
	 * Set display blanks as
	 *
	 * @param string $value
	 * @return self
	 */
	public function setDisplayBlanksAs($value = null)
	{
		$enum = array(self::DISP_BLANK_AS_ZERO, self::DISP_BLANK_AS_GAP);
		$this->display_blank_as = $this->setEnumVal($value, $enum, $this->display_blank_as);
		
		return $this;
	}
	
	/**
	 * Show legend
	 *
	 * @return bool
	 */
	public function showLegend()
	{
		return $this->showLegend;
	}
	
	/**
	 * Show title
	 *
	 * @return bool
	 */
	public function showTitle()
	{
		return $this->showTitle;
	}
	
	/**
	 * Set title
	 *
	 * @param bool $value
	 * @return self
	 */
	public function setShowTitle($value = true)
	{
		$this->showTitle = $this->setBoolVal($value, $this->showTitle);
		
		return $this;
	}
	
	/**
	 * Get legend position
	 *
	 * @return string
	 */
	public function getLegendPos()
	{
		return $this->legendPos;
	}
	
	/**
	 * Set legend position
	 *
	 * @param string $value
	 * @return self
	 */
	public function setLegendPos($value)
	{
		$enum = array(self::LEGEND_POS_RIGHT, self::LEGEND_POS_BOTTOM, self::LEGEND_POS_LEFT, self::LEGEND_POS_TOP);
		$this->showLegend = $this->setEnumVal($value, $enum, $this->showLegend);
		
		return $this;
	}
	
	public function setLegendOverlay($value){
		return $this->legendOverlay = $this->setBoolVal($value, $this->legendOverlay);
	}
	
	public function getLegendOverlay(){
		return $this->legendOverlay;
	}
	
	public function getLegendOverlayforXML(){
		return ($this->legendOverlay ? '1' : '0');
	}
}
