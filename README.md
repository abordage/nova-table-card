# Nova Table Card

A Laravel Nova card for displaying lists with links to view and edit.

<p style="text-align: center;" align="center">
<img alt="Laravel Nova Table Card" src="https://github.com/abordage/nova-table-card/blob/master/docs/images/abordage-nova-table-card.png?raw=true">
</p>

[//]: # ()
[//]: # ()
[//]: # (<p style="text-align: center;" align="center">)

[//]: # ()
[//]: # (<a href="https://packagist.org/packages/abordage/nova-table-card" title="Packagist version">)

[//]: # (    <img alt="Packagist Version" src="https://img.shields.io/packagist/v/abordage/nova-table-card">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://github.com/abordage/nova-table-card/actions/workflows/php-cs-fixer.yml" title="GitHub Code Style Status">)

[//]: # (    <img alt="GitHub Code Style Status" src="https://img.shields.io/github/workflow/status/abordage/nova-table-card/PHP%20CS%20Fixer?label=code%20style">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://nova.laravel.com/docs/4.0/" title="Laravel Nova Version">)

[//]: # (    <img alt="Laravel Nova Version" src="https://img.shields.io/badge/laravel%20nova-4.0-1DA5E7">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://www.php.net/" title="PHP version">)

[//]: # (    <img alt="PHP Version Support" src="https://img.shields.io/packagist/php-v/abordage/nova-table-card">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://github.com/abordage/nova-table-card/blob/master/LICENSE.md" title="License">)

[//]: # (    <img alt="License" src="https://img.shields.io/github/license/abordage/nova-table-card">)

[//]: # (</a>)

[//]: # ()
[//]: # ()
[//]: # (</p>)

## Requirements
- PHP 7.4 or higher
- Nova 4

## Installation

You can install the package via composer:

```bash
composer require abordage/nova-table-card
```

## Usage

To create a cards use the `artisan` command:

```bash
php artisan nova-table-card MyTableCard
```
By default, all new cards will be placed in the `app/Nova/Cards` directory. 
Once your table card class has been generated, you're ready to customize it:

```php
<?php

namespace App\Nova\Cards;

use Abordage\TableCard\TableCard;
use Illuminate\Database\Eloquent\Model;

class MyTableCard extends TableCard
{
    /**
     * Name of the card.
     */
    public string $title = 'My Table Card';

    /**
     * The width of the card (1/2, 1/3, 1/4 or full).
     */
    public $width = '1/3';

    /**
     * Array of table rows
     *
     * Required keys: title, viewUrl
     * Optional keys: subtitle, editUrl
     */
    public function rows(): array
    {
        $rows = [];

        /** for example */
        $models = \App\Models\User::limit(5)->get();
        foreach ($models as $model) {
            $rows[] = [
                'title' => $model->name,
                'subtitle' => $model->email,
                'viewUrl' => $this->getResourceUrl($model),
                'editUrl' => $this->getResourceUrl($model) . '/edit',
            ];
        }

        return $rows;
    }

    /**
     * @param Model $model
     * @return string
     */
    private function getResourceUrl(Model $model): string
    {
        return config('nova.path') . '/resources/' . str_replace('_', '-', $model->getTable()) . '/' . $model->getKey();
    }
}
```

Once you have defined a card, you are ready to attach it to a dashboard or resource. You should simply add it to the array of cards.

## Feedback
If you have any feedback, comments or suggestions, please feel free to open an issue within this repository.

## Credits

- [Pavel Bychko](https://github.com/abordage)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
