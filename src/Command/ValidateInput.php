<?php namespace Anomaly\ContentFilterExtension\Command;

use Anomaly\ContentFilterExtension\Validation\BlacklistValidator;
use Anomaly\ContentFilterExtension\Validation\WatchlistValidator;

/**
 * Class ValidateInput
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValidateInput
{

    /**
     * The comment input.
     *
     * @var array
     */
    protected $input;

    /**
     * Create a new ValidateInput instance.
     *
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * Handle the command.
     *
     * @param WatchlistValidator $watchlist
     * @param BlacklistValidator $blacklist
     * @return bool
     */
    public function handle(WatchlistValidator $watchlist, BlacklistValidator $blacklist)
    {
        return $watchlist->passes($this->input) && $blacklist->passes($this->input);
    }
}
