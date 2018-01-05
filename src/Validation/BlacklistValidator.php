<?php namespace Anomaly\ContentFilterExtension\Validation;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class BlacklistValidator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlacklistValidator
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
     * Create a new BlacklistValidator instance.
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
        $blacklist = $this->config->get('anomaly.extension.content_filter::filter.blacklist');

        if (is_string($blacklist)) {
            $blacklist = explode("\r\n", $blacklist);
        }

        foreach ($input as $value) {
            foreach ($blacklist as $term) {
                if (strpos(strtolower($value), strtolower($term)) !== false) {
                    return false;
                }
            }
        }

        return true;
    }
}
