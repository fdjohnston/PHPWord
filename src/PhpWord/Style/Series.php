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
 * Series style
 *
 * @since 0.12.0
 */
class Series extends AbstractStyle
{
	
	const MARKER_SYMBL_NONE 		= 'none';
	const MARKER_SYMBL_SQUARE 		= 'square';
	const MARKER_SYMBL_DIAMOND 		= 'diamond';
	const MARKER_SYMBL_TRIANGLE 	= 'triangle';
	const MARKER_SYMBL_X 			= 'x';
	const MARKER_SYMBL_STAR 		= 'star';
	const MARKER_SYMBL_DOT 			= 'dot';
	const MARKER_SYMBL_DASH 		= 'dash';
	const MARKER_SYMBL_CIRCLE 		= 'circle';
	const MARKER_SYMBL_PLUS 		= 'plus';
	
	const DASH_TYPE_SOLID 				= 'solid';
	const DASH_TYPE_DOT 				= 'dot';
	const DASH_TYPE_DASH 				= 'dash';
	const DASH_TYPE_LG_DASH 			= 'lgDash';
	const DASH_TYPE_DASH_DOT 			= 'dashDot';
	const DASH_TYPE_LG_DASH_DOT 		= 'lgDashDot';
	const DASH_TYPE_LG_DASH_DOT_DOT 	= 'lgDashDotDot';
	const DASH_TYPE_SQUARE_DOT 			= 'sysDash';
	
	/**
	 * Marker type
	 *
	 * @var string
	 */
	private $marker = self::MARKER_SYMBL_SQUARE;
	
	/**
	 * Line dash type
	 *
	 * @var string
	 */
	private $lineDashType = self::DASH_TYPE_SOLID;
	
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
	 * Get marker
	 *
	 * @return string
	 */
	public function getMarker()
	{
		return $this->marker;
	}
	
	/**
	 * Set marker type
	 *
	 * @param string $value
	 * @return self
	 */
	public function setMarker($value = null)
	{
		$enum = array(self::MARKER_SYMBL_NONE, self::MARKER_SYMBL_SQUARE, self::MARKER_SYMBL_DIAMOND, self::MARKER_SYMBL_TRIANGLE, self::MARKER_SYMBL_X, self::MARKER_SYMBL_STAR, self::MARKER_SYMBL_DOT, self::MARKER_SYMBL_DASH, self::MARKER_SYMBL_CIRCLE, self::MARKER_SYMBL_PLUS);
		$this->marker = $this->setEnumVal($value, $enum, $this->marker);
		
		return $this;
	}
	
	/**
	 * Get line dash
	 *
	 * @return string
	 */
	public function getLineDashType()
	{
		return $this->lineDashType;
	}
	
	/**
	 * Set line dash type
	 *
	 * @param string $value
	 * @return self
	 */
	public function setLineDashType($value = null)
	{
		$enum = array(self::DASH_TYPE_SOLID, self::DASH_TYPE_DOT, self::DASH_TYPE_DASH, self::DASH_TYPE_LG_DASH, self::DASH_TYPE_DASH_DOT, self::DASH_TYPE_LG_DASH_DOT, self::DASH_TYPE_LG_DASH_DOT_DOT,self::DASH_TYPE_SQUARE_DOT,);
		$this->lineDashType = $this->setEnumVal($value, $enum, $this->lineDashType);
		
		return $this;
	}
}
