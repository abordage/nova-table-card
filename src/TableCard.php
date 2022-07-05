<?php

namespace Abordage\TableCard;

use Laravel\Nova\Card;

class TableCard extends Card
{
    public string $title = '';

    public array $rows = [];

    public $width = '1/3';

    public function __construct()
    {
        parent::__construct('abordage-table-card');
        if (request()->is('nova-api/metrics/*')) {
            return;
        }

        $this->rows = $this->rows();
    }

    public function rows(): array
    {
        return [];
    }

    public function jsonSerialize(): array
    {
        return array_merge([
            'title' => $this->title,
            'rows' => $this->rows,
        ], parent::jsonSerialize());
    }
}
