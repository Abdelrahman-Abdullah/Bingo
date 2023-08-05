<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BlogUsersChart extends BarChartWidget
{
    protected static ?string $heading = 'Registered User Last Month';
    protected static ?string $pollingInterval = '5s';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->subDays(30),
                end: now(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Registered Users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    'borderWidth' => 2
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),

        ];
    }

}
