<?php

namespace Application\Block;

use Application\Model\Framework\DataObject;

/**
 * Class Template
 */
class TemplateBlock extends DataObject
{
    /** @var string */
    protected $template;
    /** @var TemplateBlock[] */
    protected $children;

    /**
     * Template constructor.
     * @param string $template
     * @param array $data
     * @param TemplateBlock[] $children
     */
    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        parent::__construct($data);
    }

    /**
     * Render the block HTML
     */
    public function render()
    {
        try {
            if (!file_exists($this->template)) {
                throw new \Exception('Invalid Templatefile for block (' . self::class . ' - ' . $this->template . ')');
            }
            include $this->template;
        } catch (\Exception $e) {
            echo "FATAL ERROR : " . $e->getMessage() . '<br/>';
        }
    }

    /**
     * Render the children block HTML
     * @param null $alias
     */
    public function renderChild($alias = null)
    {
        if ($alias) {
            if ($block = $this->getChildBlock($alias)) {
                $block->render();
            }
        } else {
            foreach ($this->children as $child) {
                $child->render();
            }
        }
    }

    /**
     * Add child block
     *
     * @param TemplateBlock $children
     * @param string|null $alias
     */
    public function addChild(TemplateBlock $children, $alias = null)
    {
        if ($alias !== null) {
            $this->children[$alias] = $children;
        } else {
            $this->children[] = $children;
        }
    }

    /**
     * Get child block
     *
     * @param $alias
     * @return TemplateBlock|null
     */
    public function getChildBlock($alias): ?TemplateBlock
    {
        return $this->children[$alias] ?? null;
    }
}
