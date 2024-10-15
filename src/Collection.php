<?php

namespace Basemkhirat\Elasticsearch;

use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection
{
    public $total;
    public $max_score;
    public $took;
    public $timed_out;
    public $scroll_id;
    public $shards;
}
