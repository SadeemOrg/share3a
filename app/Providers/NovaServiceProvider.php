<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\DependsOnForm;
use App\Nova\Form;
use App\Nova\FormResults;
use App\Nova\NewFormResults;
use App\Nova\RegisterForm;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Laravel\Nova\Http\Requests\NovaRequest;

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
        Nova::withoutGlobalSearch();
        Nova::footer(function ($request) {
            return Blade::render('
                @env(\'prod\')
                    This is production!
                @endenv
            ');
        });


        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make(__('Administration'))
                    ->path('/dashboards/main')
                    ->icon('document-text'),
                // MenuSection::dashboard(Main::class)->icon('chart-bar')->name("ss"),
                MenuSection::make(__("users/authorities"), [
                    // MenuItem::resource(Form::class)->name(""),
                    MenuSection::make(__('Add users'))->path('/resources/users/new'),
                    MenuItem::resource(User::class)->name(__('Modify permissions/users')),
                    MenuSection::make(__('Deleted users'))->path('/resources/users?users_trashed=only'),
                    // MenuItem::resource(User::class)->name(__('Deleted users')),

                ])->icon('user')->collapsable()->canSee(function (NovaRequest $request) {
                    if(Auth::check())
                    {
                    if ((in_array($request->user()->userrole(), [1, 2]))) {
                        return true;
                    }
                }
                }),

                MenuSection::make(__("pages"), [
                    // MenuItem::resource(Form::class)->name(""),
                    MenuItem::make(__('Add Form'))->path('/resources/depends-on-forms/new')->canSee(function (NovaRequest $request) {
                        if(Auth::check())
                        {
                        if ((in_array($request->user()->userrole(), [1, 2]))) {
                            return true;
                        }
                    }
                    }),

                    MenuItem::resource(Form::class)->name(__('Modify Form')),
                    MenuItem::make(__('customs Form'))->path('/resources/customs-forms')->canSee(function (NovaRequest $request) {
                        if(Auth::check())
                        {
                        if ((in_array($request->user()->userrole(), [1, 2]))) {
                            return true;
                        }
                    }
                    }),
                    MenuItem::resource(DependsOnForm::class)->name(__('DependsOnForm Form')),

                    // MenuItem::resource(Form::class)->name(__('Deleted Form')),
                    MenuItem::make(__('Deleted Form'))->path('/resources/forms?forms_trashed=only')->canSee(function (NovaRequest $request) {
                        if(Auth::check())
                        {
                        if ((in_array($request->user()->userrole(), [1, 2]))) {
                            return true;
                        }
                    }
                    }),

                ])->icon('user')->collapsable(),


                MenuSection::make(__("Client"), [
                    // MenuItem::resource(Form::class)->name(""),
                    MenuItem::resource(NewFormResults::class)->name(__('new Client')),
                    MenuItem::resource(FormResults::class)->name(__('Old Client')),
                    MenuItem::make(__('Deleted Client'))->path('/resources/form-results?form-results_trashed=only'),

                ])->icon('user')->collapsable(),

                MenuSection::make(__("Homepage"), [
                    MenuItem::make(__('تغير المحتوى'))->path('/nova-settings/main-layout'),

                    // MenuItem::resource(Form::class)->name("تغير المحتوى"),
                    MenuItem::resource(RegisterForm::class)->name(__('potential clients')),

                ])->icon('user')->collapsable()
                ->canSee(function (NovaRequest $request) {
                    if(Auth::check())
                    {
                    if ((in_array($request->user()->userrole(), [1]))) {
                        return true;
                    }
                }
                }),

                MenuSection::make(__('settings'))
                    ->path('//resources/user-settings/' .Auth::id())
                    ->icon('document-text'),


                // MenuSection::make('ادارة صفحات الهبوط', [
                //     MenuItem::resource(Form::class),
                //     MenuItem::resource(User::class),
                // ])->icon('user')->collapsable(),

                // MenuSection::make(__('ادارة المحتوي'), [
                //     MenuSection::make(__('كلية الدعوى'))->path('/nova-settings/main layout'),
                //     MenuSection::make(__('الرئيسبة'))->path('/nova-settings/dd'),
                //     // MenuSection::make( __('Footer link'))->path('/nova-settings/footer-link'),
                // ])->icon('adjustments')->collapsable(),
            ];
        });

        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([

            // Tabs::make(__('Some Title'), [
            //     Tab::make(__('Header'), [
            //         // File::make('Profile Photo')->disk('local'),
            //         // Image::make(__('Logo'), 'header_logo'),
            //         Text::make(__('phone number'), 'header_phone_number'),


            //     ]),

            // ]),
            Tabs::make(__('Some Title'), [
                Tab::make(__('Footer'), [


                    Text::make(__('Main Text'), 'main_text_footer'),
                    Text::make(__('Main Text'), 'sub_text_footer'),

                    // Text::make(__('phone number'), 'footer_phone_number'),


                ]),
            ]),

        ], ['logo' => 'collection',], __('main layout'));
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
            File::make('Profile Photo')->disk('local'),
            File::make(__('Image'), 'Image_Footer'),
            Text::make(__('Title Footer'), 'Title_Footer'),
            Text::make(__('sub Title Footer'), 'sub_Title_Footer'),

        ], ['logo' => 'collection',], __('كلية الدعوة'));
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
            new \Outl1ne\NovaSettings\NovaSettings,
            new \Badinansoft\LanguageSwitch\LanguageSwitch(),
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
