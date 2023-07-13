<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Fields\Image;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\File;
class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([
            File::make(__('First_Image'), 'First_Image')->disk('public'),
            File::make(__('Second Image'), 'Second_Image'),
            File::make(__('Third Image'), 'third_Image'),
            Text::make(__('Title'), 'title'),
            Text::make(__('sub Title'), 'subtitle'),
            Text::make(__('Title Second'), 'title_Second'),
            Text::make(__('sub Title Second'), 'subtitle_Second'),

            Flexible::make('Content')
            ->addLayout('Simple content section', 'Content', [
                Text::make('Title'),

            ]),
            Flexible::make('المنطقة التي تريد التعلم فيها','area')
            ->addLayout('Simple content section', 'Content', [
                Text::make('area'),

            ]),
            File::make(__('Image'), 'Image_Footer'),
            Text::make(__('Title Footer'), 'Title_Footer'),
            Text::make(__('sub Title Footer'), 'sub_Title_Footer'),

        ], ['logo' => 'collection',], __('كلية الدعوة' ))س;

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Outl1ne\NovaSettings\NovaSettings
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
