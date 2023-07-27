<?php

namespace App\Nova;

use App\Nova\Actions\ReadRegisterForm;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Sietse85\NovaButton\Button;
class RegisterForm extends Resource
{


    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\RegisterForm>
     */
    public static $model = \App\Models\RegisterForm::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name'),
            Text::make('Phone Number', 'phone'),
            Text::make('Country', 'email'),
            // Text::make('Area', 'area'),
            Boolean::make('is_read', 'is_new'),
            Button::make('اضافة كمستخدك')->action(ReadRegisterForm::class)->canSee(function () {
                return $this->is_new === '0';
            })->style('success'),
            Button::make('تمت اضافة')->visible($this->is_new === '1')->canSee(function () {
                return $this->is_new === '1';
            })->disabled()->style('grey'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            new ReadRegisterForm,
        ];
    }
}
