<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\CUCF\Option;

use XF;
use XF\Entity\Option;
use XF\Option\AbstractOption;

class ContactFields extends AbstractOption
{
	/**
	 * @param Option $option
	 * @param array $htmlParams
	 */
	public static function renderOption(Option $option, array $htmlParams) : string
	{
		return self::getTemplate('admin:option_template_tc_cucf_contactFields', $option, $htmlParams, [
			'fields' => XF::app()->getCustomFields('users', 'contact')->getFieldDefinitions()
		]);
	}
}
