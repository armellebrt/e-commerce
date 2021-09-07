<?php

namespace Application\Controller\Backend;

use Application\Controller\AbstractController;
use Application\Block\TemplateBlock;

abstract class AbstractBackendController extends AbstractController
{
    public function run()
    {
        $this->renderHeader();
        parent::run();
        $this->renderFooter();
    }

    public function renderContent($content)
    {
        $main = new TemplateBlock(VIEW . 'backend/theme/main.php');
        $main->addChild(new TemplateBlock(VIEW . 'backend/theme/navbar.php'));
        $main->addChild($content);
        $main->render();
    }

    public function renderHeader()
    {
        $block = new TemplateBlock(VIEW . 'backend/theme/header.php');
        $block->render();
    }

    public function renderFooter()
    {
        $block = new TemplateBlock(VIEW . 'backend/theme/footer.php');
        $block->render();
    }
}
