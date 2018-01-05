<?php namespace Anomaly\ContentFilterExtension;

use Anomaly\CommentsModule\Comment\Filter\FilterExtension;
use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\ContentFilterExtension\Command\ValidateForm;
use Anomaly\ContentFilterExtension\Command\ValidateInput;

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

    /**
     * Check if the input passes the filter.
     *
     * @param array $input
     * @return bool
     */
    public function passes(array $input)
    {
        return $this->dispatch(new ValidateInput($input));
    }

    /**
     * Validate the comment form builder.
     *
     * @param CommentFormBuilder $builder
     */
    public function validate(CommentFormBuilder $builder)
    {
        $this->dispatch(new ValidateForm($builder));
    }

}
