<?php namespace Anomaly\ContentFilterExtension;

use Anomaly\CommentsModule\Comment\Filter\FilterExtension;

/**
 * Class ContentFilterExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ContentFilterExtension extends FilterExtension
{

    /**
     * This extension provides a basic content
     * filter for the comments module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.comments::filter.content';

}
