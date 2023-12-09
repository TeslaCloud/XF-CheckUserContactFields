<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\CUCF\XF\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\AbstractView;

class Forum extends XFCP_Forum
{
	/**
	 * @param ParameterBag $params
	 *
	 * @return AbstractView
	 */
	public function actionPostThread(ParameterBag $params)
	{
		$reply = parent::actionPostThread($params);
        
		if (
			!($reply instanceof View)
			|| !in_array($params->node_id, XF::options()->tc_cucf_include_forums)
			|| XF::visitor()->hasPermission('forum', 'tc_cucf_bypass')
		)
		{
			return $reply;
		}

		foreach (XF::options()->tc_cucf_contactFields as $fieldName)
		{
			if (XF::visitor()->Profile->custom_fields[$fieldName])
			{
				return $reply;
			}
		}

		return $this->view('TC\CUCF:Forum\PostThread\Contacts', 'tc_cucf_view');
	}
}
