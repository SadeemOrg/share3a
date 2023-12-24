<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\Text;
use Sietse85\NovaButton\Button;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Date;

class DependsOnForm extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\DependsOnForm>
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
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Button::make(__('go to page'))->link(($this->type == '1') ? url('/') . '/كلية_الدعوة'  :   url('/') . '/forms/' . $this->slug)->style('primary'),
            Text::make(__('slug'), 'slug')->hideFromIndex()->hideFromDetail()->hideFromDetail()->rules('required'),
            Image::make(__('logo'), 'icons')->disk("public"),
            // Flexible::make(__('logo'),'icons')
            // ->addLayout(__('add logo'), 'iconslogo', [
            //     Image::make(__('logo'),'icons')->disk("public"),

            // ])  ->button(__('add logo')),

            Text::make(__('text'), 'text')->rules('required'),
            Text::make(__('sub_text'), 'sup_text')->rules('required'),
            Text::make(__('note Form'), 'note')->rules('required'),
            Text::make(__('text_thanks'), 'text_thanks'),
            Text::make(__('sup_text_thanks'), 'sup_text_thanks'),
            Flexible::make('Content', 'questions')
                ->fullWidth()
                ->button(__('Add page'))
                ->confirmRemove($label = '', $yes = 'Delete', $no = 'Cancel')
                ->addLayout('Depends On', 'page', [
                    Flexible::make('Content', 'questions')
                        ->fullWidth()
                        ->button(__('Add section'))
                        ->confirmRemove($label = '', $yes = 'Delete', $no = 'Cancel')
                        ->addLayout('section', 'section', [
                            Text::make(__('section name'), 'section_name'),

                            Flexible::make('questions', 'questions')
                                ->fullWidth()
                                ->button('Add questions')
                                ->addLayout(__('Add select'), 'select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])  ->addLayout(__('Add radio select'), 'radio_select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])  ->addLayout(__('Add text'), 'text', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add date'), 'date', [

                                    text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add file'), 'file', [
                                    text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add Note Filed'), 'Note', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add boolean Filed'), 'boolean', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add Email Filed'), 'email', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add phone Filed'), 'phone', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])


                        ]) ->addLayout('Flexible section', 'Flexible_section', [
                            Text::make(__('section name'), 'section_name'),

                            Flexible::make('questions', 'questions')
                                ->fullWidth()
                                ->button('Add questions')
                                ->addLayout(__('Add select'), 'select', [
                                    Text::make(__('name'), 'name'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])  ->addLayout(__('Add radio select'), 'radio_select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])  ->addLayout(__('Add text'), 'text', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add date'), 'date', [

                                    text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add file'), 'file', [
                                    text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),

                                ])
                                ->addLayout(__('Add Note Filed'), 'Note', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add boolean Filed'), 'boolean', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add Email Filed'), 'email', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add phone Filed'), 'phone', [
                                    Text::make(__('text'), 'text'),
                                    Boolean::make(__('required'), 'required'),
                                ])


                        ])




                ])




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
        return [];
    }
}
