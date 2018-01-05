<?php namespace Anomaly\ContentFilterExtension\Command;

use Anomaly\CommentsModule\Comment\Form\CommentFormBuilder;
use Anomaly\ContentFilterExtension\Validation\BlacklistValidator;
use Anomaly\ContentFilterExtension\Validation\WatchlistValidator;
use Anomaly\Streams\Platform\Message\MessageBag;
use Illuminate\Http\Request;

/**
 * Class ValidateForm
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateForm
{

    /**
     * The comment form builder.
     *
     * @var CommentFormBuilder
     */
    protected $builder;

    /**
     * Create a new ValidateForm instance.
     *
     * @param CommentFormBuilder $builder
     */
    public function __construct(CommentFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param Request            $request
     * @param MessageBag         $messages
     * @param WatchlistValidator $watchlist
     * @param BlacklistValidator $blacklist
     */
    public function handle(
        Request $request,
        MessageBag $messages,
        WatchlistValidator $watchlist,
        BlacklistValidator $blacklist
    ) {
        $website = $this->builder->getPostValue('website');
        $content = $this->builder->getPostValue('content');
        $email   = $this->builder->getPostValue('email');
        $name    = $this->builder->getPostValue('name');

        $ip = $request->ip();

        $input = compact('website', 'content', 'email', 'name', 'ip');

        if (!$watchlist->passes($input)) {
            $this->builder->setFormEntryAttribute('flagged', true);
        }

        if (!$blacklist->passes($input)) {

            // Invalidate the form.
            $this->builder->setSave(false);

            $this->builder->addFormError('content', 'anomaly.extension.content_filter::message.blacklist_error');
        }
    }
}
