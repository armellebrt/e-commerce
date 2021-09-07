<?php

namespace Application\Block;

use \Application\Block\TemplateBlock;
use Application\Model\Framework\MessageSession;

/**
 * Class ProductList
 *
 */
class MessagesBlock extends TemplateBlock
{
    /**
     * @param $limit
     * @return mixed
     */
    public function getMessages()
    {
        $messageSession = new MessageSession();
        return $messageSession->getMessage();
    }
}
