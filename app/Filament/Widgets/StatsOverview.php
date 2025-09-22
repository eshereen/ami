<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Contacts', Contact::count()),
        Stat::make('Products', Product::count()),
        Stat::make('Categories', Category::count()),
           
        ];
    }
}
