<?php namespace Anomaly\ContentFilterExtension\Validation;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class WatchlistValidator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class WatchlistValidator
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * Create a new WatchlistValidator instance.
     *
     * @param Repository $config
     * @param Request    $request
     */
    public function __construct(Repository $config, Request $request)
    {
        $this->config  = $config;
        $this->request = $request;
    }

    /**
     * Validate the input.
     *
     * @param $input
     * @return bool
     */
    public function passes($input)
    {
        $watchlist = $this->config->get('anomaly.extension.content_filter::filter.watchlist');

        if (is_string($watchlist)) {
            $watchlist = explode("\r\n", $watchlist);
        }

        foreach ($input as $value) {
            foreach ($watchlist as $term) {
                if (strpos(strtolower($value), strtolower($term)) !== false) {
                    return false;
                }
            }
        }

        return true;
    }
}
