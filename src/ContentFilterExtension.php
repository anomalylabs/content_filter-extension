<?php namespace Anomaly\ContentFilterExtension;

use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class ContentFilterExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ContentFilterExtension extends Extension
{

    /**
     * This extension provides a basic content
     * filter for the comments module.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.comments::filter.content';

}
