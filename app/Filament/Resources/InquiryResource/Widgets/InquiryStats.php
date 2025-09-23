<?php

namespace App\Filament\Resources\InquiryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InquiryStats extends BaseWidget
{
    protected ?string $heading = 'Overview';

    protected ?string $description = 'An overview of your inquiries. ';

    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $user = auth()->user();

        $count = $user->hasRole('super_admin')
            ? \App\Models\inquiry::count()
            : \App\Models\inquiry::where('user_id', $user->id)->count();

        return [
            Stat::make('Inquiries Sent', $count)
                ->description($user->hasRole('super_admin') ? 'Total inquiries from all users' : 'Your submitted inquiries')
                ->color('success'),
        ];
    }
}
