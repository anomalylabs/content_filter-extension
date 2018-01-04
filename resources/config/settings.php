<?php

return [
    'watchlist' => [
        'type' => 'anomaly.field_type.textarea',
        'bind' => 'anomaly.extension.content_filter::filter.watchlist',
    ],
    'blacklist' => [
        'type' => 'anomaly.field_type.textarea',
        'bind' => 'anomaly.extension.content_filter::filter.blacklist',
    ],
];
