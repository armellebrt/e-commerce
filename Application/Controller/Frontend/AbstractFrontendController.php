<?php

namespace Application\Controller\Frontend;

use Application\Controller\AbstractController;
use Application\Block\TemplateBlock;
use Application\Block\MessagesBlock;
use \Application\Block\Frontend\Customer\NavLinksBlock;

abstract class AbstractFrontendController extends AbstractController
{
    abstract function execute();

    public function run()
    {
        $this->renderHeader();
        $this->renderMessages();
        parent::run();
        $this->renderFooter();
    }

    protected function renderMessages()
    {
        $messageBlock = new MessagesBlock(VIEW . 'frontend/theme/message.php');
        $messageBlock->render();
    }

    public function renderHeader()
    {
        $block = new TemplateBlock(VIEW . 'frontend/theme/header.php');
        $block->addChild(new NavLinksBlock(VIEW . 'frontend/customer/nav-links.php'), 'nav-links');
        $block->render();
    }

    public function renderFooter()
    {
        $block = new TemplateBlock(VIEW . 'frontend/theme/footer.php');
        $block->render();
    }
}
