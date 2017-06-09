<?php

namespace Cminds\Helloworld\Block\Adminhtml;

use Magento\Backend\Block\Template;

/**
 * Class Post
 * @package Cminds\Helloworld\Block\Adminhtml
 */
class Post extends Template
{
    /**
     * Post constructor.
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getPost()
    {
        return 'TEST BLOCK!';
    }
}