<?php

namespace App\Providers;

use App\Enums\PageModelEnum;
use App\Models\Destination;
use App\Models\Organization;
use App\Models\Page;
use App\Models\QuickLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        $organization = Organization::with([
            'menu' => fn($q) => $q
                ->with([
                    'children' => fn($q) => $q
                        ->with([
                            'packages' => fn($q) => $q
                                ->select('id', 'name', 'slug', 'destination_id'),
                        ])
                        ->select('id', 'name', 'slug', 'parent_id'),
                ])
                ->select('id', 'name', 'slug', 'parent_id'),
            'secondMenu' => fn($q) => $q
                ->with([
                    'children' => fn($q) => $q
                        ->with([
                            'packages' => fn($q) => $q
                                ->select('id', 'name', 'slug', 'destination_id'),
                        ])
                        ->select('id', 'name', 'slug', 'parent_id'),
                    'packages:id,name,slug,destination_id'
                ])
                ->select('id', 'name', 'slug', 'parent_id'),
        ])->first();

        // dump($organization->toArray());

        $companyInfoNav = Page::select('id', 'title', 'slug', 'type', 'model')
            ->where('model', PageModelEnum::COMPANY_INFO)
            ->orderBy('display_order')
            ->get();

        $quickLink = QuickLink::orderBy('order', 'asc')->take(15)->get();
        $quickLinks = array_chunk($quickLink->toArray(), 5);

        $destinationsNav = Destination::with([
            'children' => fn($q) => $q
                ->with('children:id,name,slug,parent_id')
                ->select('id', 'name', 'slug', 'parent_id')
        ])
            ->select('id', 'slug', 'name')
            ->whereNull('parent_id')
            ->get();


        View::composer('*', function ($view) use ($organization, $companyInfoNav, $quickLinks, $destinationsNav) {
            $view->with([
                'organization' => $organization,
                'companyInfoNav' => $companyInfoNav,
                'quickLinksNav' => $quickLinks,
                'destinationsNav' => $destinationsNav
            ]);
        });
    }
}
