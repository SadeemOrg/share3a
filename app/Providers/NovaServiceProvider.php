<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Form;
use App\Nova\FormResults;
use App\Nova\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Fields\Image;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\File;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Tab;
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

        Nova::mainMenu(function (Request $request) {
            return [
            MenuSection::dashboard(Main::class)->icon('chart-bar'),
            MenuSection::make('ادارة صفحات الهبوط', [
                MenuItem::resource(Form::class),
                MenuItem::resource(User::class),
            ])->icon('user')->collapsable(),
            MenuSection::make(__('ادارة المحتوي'), [
                MenuSection::make(__('كلية الدعوى'))->path('/nova-settings/kly-aldaao'),
                MenuSection::make( __('الرئيسبة'))->path('/nova-settings/main-layout'),
                // MenuSection::make( __('Footer link'))->path('/nova-settings/footer-link'),
            ])->icon('adjustments')->collapsable(),
            ];
        });

        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([

            Tabs::make(__('Some Title'), [
            Tab::make(__('Header'), [
                Image::make('Heade Logo', 'header_logo'),
                Text::make(__('phone number'), 'header_phone_number'),


            ]),

        ]),
        Tabs::make(__('Some Title'), [
            Tab::make(__('Footer'), [
                Image::make('Footer Logo', 'footer_logo'),

                Text::make(__('Main Text'), 'main_text_footer'),
                Text::make(__('phone number'), 'footer_phone_number'),


            ]),
        ]),

        ], ['logo' => 'collection',], __('main layout' ));
        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([
            // File::make(__('First_Image'), 'First_Image')->disk('public'),
            // File::make(__('Second Image'), 'Second_Image'),
            // File::make(__('Third Image'), 'third_Image'),
            Text::make(__('Title'), 'title'),
            Text::make(__('sub Title'), 'subtitle'),
            Text::make(__('Title Second'), 'title_Second'),
            Text::make(__('sub Title Second'), 'subtitle_Second'),

            Flexible::make('Content')
            ->addLayout('Simple content section', 'Content', [
                Text::make('Title'),

            ]),

            File::make(__('Image'), 'Image_Footer'),
            Text::make(__('Title Footer'), 'Title_Footer'),
            Text::make(__('sub Title Footer'), 'sub_Title_Footer'),

        ], ['logo' => 'collection',], __('كلية الدعوة' ));

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
