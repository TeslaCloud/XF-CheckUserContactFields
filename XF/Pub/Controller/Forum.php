<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\CUCF\XF\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;

class Forum extends XFCP_Forum
{
    public function actionPostThread(ParameterBag $params)
    {
        $reply = parent::actionPostThread($params);

        if ($reply instanceof View)
        {
            if (in_array($params->node_id, XF::options()->tc_cucf_include_forums))
            {
                if (\XF::visitor()->hasPermission('forum', 'tcCucfBypass'))
                {
                    return $reply;
                }

                foreach (XF::options()->tc_cucf_contactFields as $fieldName => $def)
                {
                    $value = XF::visitor()->Profile->custom_fields[$def];

                    if ($value) // checking if more than one contact field filled
                    {
                        return $reply;
                    }
                }

                return $this->view(null, 'tc_cucf_view');
            }
        }

        return $reply;
    }
}