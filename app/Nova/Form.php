<?php

namespace App\Nova;

use App\Nova\Actions\ExportForm;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Sietse85\NovaButton\Button;

class Form extends Resource
{

    public static function label()
    {
        return __('ادارة صفحات الهبوط ');
    }
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Form>
     */
    public static $model = \App\Models\Form::class;

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
    public static function authorizedToCreate(Request $request)
    {
        if ((in_array("0",json_decode(  $request->user()->userrole()) ))){

            return true;
        }
    }
    // public  function authorizedToUpdate(Request $request)
    // {
    //     if ((in_array("0",json_decode(  $request->user()->userrole()) ))){

    //         return true;
    //     }
    // }
    public function authorizedToDelete(Request $request)
    {
        if ((in_array("0",json_decode(  $request->user()->userrole()) ))){

            return true;
        }
    }
     public static function indexQuery(NovaRequest $request, $query)
     {
        // dd( $request->user()->userrole());
        if ((in_array("0",json_decode(  $request->user()->userrole()) ))){
            // dd("dd");
            return $query;
        }
        //  dd(in_array("1",  $request->user()->userrole()));/
        //  dd(in_array("1",json_decode( $request->user()->userrole())));
// dd(gettype( $request->user()->userrole()));


         return $query->wherein('id',   json_decode( $request->user()->userrole()));

     }
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name', 'name'),
            Text::make('slug', 'slug'),
            Text::make('text', 'text'),
            Text::make('sup_text', 'sup_text'),
            File::make('Profile Photo or vidio','file')->disk('public'),
            Flexible::make('questions', 'questions')
                ->addLayout('Add select', 'select', [
                    Text::make('name'),
                    Flexible::make('select', 'selectform')
                        ->addLayout('Add select choices', 'choices', [
                            Text::make('text'),

                        ])

                ])->addLayout('Add text', 'text', [
                    Text::make('text'),


                ])->addLayout('Add Note Filed', 'Note', [
                    Text::make('text'),

                ])->addLayout('Add boolean Filed', 'boolean', [
                    Text::make('text'),

                ]),


            HasMany::make(__("FormResults"), "FormResults", \App\Nova\FormResults::class)


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
        return [

        ];
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
            new ExportForm(),
        ];
    }
}
