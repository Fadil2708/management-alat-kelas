<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share pending borrowing count across all views
        // Cached for 2 minutes to reduce database queries
        View::composer('*', function ($view) {
            $pendingCount = Cache::remember(
                'sidebar.pending_count',
                120, // 2 minutes
                function () {
                    return \App\Models\Borrowing::where('status', 'pending')->count();
                }
            );
            
            $view->with('sidebarPendingCount', $pendingCount);
        });
    }
}
