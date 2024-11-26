<?php

namespace App\Nova;

use App\Models\FormUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\Fields\Text;
use Sietse85\NovaButton\Button;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Tag;
use Outl1ne\MultiselectField\Multiselect;

class DependsOnForm extends Resource
{

    public static function label()
    {
        return __('صفحة جديدة');
    }
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

    public static function authorizedToCreate(Request $request)
    {
        if (Auth::check()) {
            if ((in_array($request->user()->userrole(), [1, 2]))) {
                return true;
            } else return false;
        }
    }
    public  function authorizedToUpdate(Request $request)
    {
        if (Auth::check()) {
            if ((in_array($request->user()->userrole(), [1, 2]))) {
                return true;
            } else {

                if ($request->user()->usepermission() == 2) {
                    return true;
                }
            }
            // return false;
        }
    }

    public  function authorizedToDelete(Request $request)
    {
        if (Auth::check()) {
            if ((in_array($request->user()->userrole(), [1, 2]))) {
                return true;
            } else return false;
        }
    }
    public  function authorizedToForceDelete(Request $request)
    {
        if (Auth::check()) {
            if ((in_array($request->user()->userrole(), [1]))) {
                return true;
            } else return false;
        }
    }
    public  function authorizedToReplicate(Request $request)
    {
        if (Auth::check()) {
            if ((in_array($request->user()->userrole(), [1, 2]))) {
                return true;
            } else return false;
        }
    }
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->userrole() == 1) {
            // dd("dd");
            return $query->where('type', 0);
        }

        $user = Auth::user();
        $formsarray = FormUser::where(['user_id' => Auth::id()])->Select('form_id')->pluck('form_id')->toArray();

        $query->where('type', 0)->where('added_by', $user->id)->orWherein('id', $formsarray);
    }
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
            Text::make(__('note Form'), 'form_note')->rules('required'),

            Text::make(__('note Register'), 'note')->rules('required'),
            Text::make(__('text_thanks'), 'text_thanks'),
            Text::make(__('sup_text_thanks'), 'sup_text_thanks'),
            Tag::make(__("leading"), "User", \App\Nova\User::class)->preload()->withPreview()->displayAsList()->showCreateRelationButton(),

            BelongsToMany::make(__("leading"), "leading", \App\Nova\User::class)->hideFromIndex(),

            BelongsTo::make(__('added_by'), 'addedby', \App\Nova\User::class)->hideWhenCreating()->hideWhenUpdating()->canSee(function (NovaRequest $request) {
                if (Auth::check()) {
                    if ((in_array($request->user()->userrole(), [1, 2]))) {
                        return true;
                    }
                }
            }),

            HasMany::make(__("new FormResults"), "FormResults", \App\Nova\NewFormResults::class),
            hasMany::make(__("old FormResults"), "FormResults", \App\Nova\FormResults::class),


            Flexible::make(__('Content'), 'questions')
                ->fullWidth()
                ->button(__('Add page'))
                ->confirmRemove($label = '', $yes = 'Delete', $no = 'Cancel')
                ->addLayout(__('page'), 'page', [
                    Flexible::make(__('Content page'), 'questions')
                        ->fullWidth()
                        ->button(__('Add section'))
                        ->confirmRemove($label = '', $yes = 'Delete', $no = 'Cancel')
                        ->addLayout(__('section'), 'section', [
                            Text::make(__('section name'), 'section_name'),

                            Flexible::make(__('questions'), 'questions')
                                ->fullWidth()
                                ->button(__('Add questions'))
                                ->addLayout(__('Add select'), 'select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),

                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add text'), 'text', [
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
                                    Number::make(__('validation num'), 'validation_num'),
                                    Boolean::make(__('required'), 'required'),
                                ])
                                ->addLayout(__('radio select depend'), 'radio_select_depend', [

                                    text::make(__('questions text'), 'text'),
                                    text::make(__('true answer'), 'yes'),
                                    text::make(__('false answer'), 'no'),

                                    Flexible::make(__('questions'), 'questions')
                                        ->fullWidth()
                                        ->button(__('Add questions'))
                                        ->addLayout(__('Add select'), 'select', [
                                            Text::make(__('text'), 'text'),
                                            Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                ->fullWidth()
                                                ->addLayout(__('Add select choices'), 'choices', [
                                                    Text::make(__('text'), 'text'),

                                                ]),
                                            Boolean::make(__('required'), 'required'),
                                        ])->addLayout(__('Add radio select'), 'radio_select', [
                                            Text::make(__('text'), 'text'),
                                            Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                ->fullWidth()
                                                ->addLayout(__('Add select choices'), 'choices', [
                                                    Text::make(__('text'), 'text'),

                                                ]),
                                            Boolean::make(__('required'), 'required'),
                                        ])->addLayout(__('Add text'), 'text', [
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
                                            Number::make(__('validation num'), 'validation_num'),

                                            Boolean::make(__('required'), 'required'),
                                        ])
                                        ->addLayout(__('radio select depend'), 'radio_select_depend', [

                                            text::make(__('questions text'), 'text'),
                                            text::make(__('true answer'), 'yes'),
                                            text::make(__('false answer'), 'no'),

                                            Boolean::make(__('required'), 'required'),


                                        ]),
                                    Boolean::make(__('required'), 'required'),


                                ])


                        ])->addLayout(__('Multi section'), 'multi_section', [
                            Text::make(__('select name'), 'text'),

                            Flexible::make(__('select'), 'select')->button(__('Add select choices'))
                                ->fullWidth()
                                ->addLayout(__('Add select choices'), 'choices', [
                                    Text::make(__('choice'), 'text'),


                                    Flexible::make(__('select'), 'select')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('section'), 'section', [
                                            Text::make(__('section name'), 'section_name'),

                                            Flexible::make(__('questions'), 'questions')
                                                ->fullWidth()
                                                ->button(__('Add questions'))
                                                ->addLayout(__('Add select'), 'select', [
                                                    Text::make(__('text'), 'text'),
                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                        ->fullWidth()
                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                            Text::make(__('text'), 'text'),

                                                        ]),
                                                    Boolean::make(__('required'), 'required'),
                                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                                    Text::make(__('text'), 'text'),
                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                        ->fullWidth()
                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                            Text::make(__('text'), 'text'),

                                                        ]),
                                                    Boolean::make(__('required'), 'required'),
                                                ])->addLayout(__('Add text'), 'text', [
                                                    Text::make(__('text'), 'text'),
                                                    Boolean::make(__('required'), 'required'),

                                                ])->addLayout(__('Add date'), 'date', [

                                                    text::make(__('text'), 'text'),
                                                    Boolean::make(__('required'), 'required'),

                                                ])->addLayout(__('Add file'), 'file', [
                                                    text::make(__('text'), 'text'),
                                                    Boolean::make(__('required'), 'required'),

                                                ])->addLayout(__('Add Note Filed'), 'Note', [
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
                                                    Number::make(__('validation num'), 'validation_num'),

                                                    Boolean::make(__('required'), 'required'),
                                                ])


                                        ])
                                        ->addLayout(__('Flexible Section'), 'Flexible_section', [
                                            Text::make(__('section name'), 'section_name'),

                                            Flexible::make(__('questions'), 'questions')
                                                ->fullWidth()
                                                ->button(__('Add questions'))
                                                ->addLayout(__('Add select'), 'select', [
                                                    Text::make(__('text'), 'text'),
                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                        ->fullWidth()
                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                            Text::make(__('text'), 'text'),

                                                        ]),
                                                    Boolean::make(__('required'), 'required'),
                                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                                    Text::make(__('text'), 'text'),
                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                        ->fullWidth()
                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                            Text::make(__('text'), 'text'),

                                                        ]),
                                                    Boolean::make(__('required'), 'required'),
                                                ])->addLayout(__('Add text'), 'text', [
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
                                                    Number::make(__('validation num'), 'validation_num'),

                                                    Boolean::make(__('required'), 'required'),
                                                ])


                                        ])->addLayout(__('Multi section'), 'multi_section', [
                                            Text::make(__('select name'), 'text'),

                                            Flexible::make(__('select'), 'select')->button(__('Add select choices'))
                                                ->fullWidth()
                                                ->addLayout(__('Add select choices'), 'choices', [
                                                    Text::make(__('choice'), 'text'),


                                                    Flexible::make(__('select'), 'select')->button(__('Add select choices'))
                                                        ->fullWidth()
                                                        ->addLayout(__('section'), 'section', [
                                                            Text::make(__('section name'), 'section_name'),

                                                            Flexible::make(__('questions'), 'questions')
                                                                ->fullWidth()
                                                                ->button(__('Add questions'))
                                                                ->addLayout(__('Add select'), 'select', [
                                                                    Text::make(__('text'), 'text'),
                                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                                        ->fullWidth()
                                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                                            Text::make(__('text'), 'text'),

                                                                        ]),
                                                                    Boolean::make(__('required'), 'required'),
                                                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                                                    Text::make(__('text'), 'text'),
                                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                                        ->fullWidth()
                                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                                            Text::make(__('text'), 'text'),

                                                                        ]),
                                                                    Boolean::make(__('required'), 'required'),
                                                                ])->addLayout(__('Add text'), 'text', [
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
                                                                    Number::make(__('validation num'), 'validation_num'),

                                                                    Boolean::make(__('required'), 'required'),
                                                                ])


                                                        ])
                                                        ->addLayout(__('Flexible Section'), 'Flexible_section', [
                                                            Text::make(__('section name'), 'section_name'),

                                                            Flexible::make(__('questions'), 'questions')
                                                                ->fullWidth()
                                                                ->button(__('Add questions'))
                                                                ->addLayout(__('Add select'), 'select', [
                                                                    Text::make(__('text'), 'text'),
                                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                                        ->fullWidth()
                                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                                            Text::make(__('text'), 'text'),

                                                                        ]),
                                                                    Boolean::make(__('required'), 'required'),
                                                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                                                    Text::make(__('text'), 'text'),
                                                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                                        ->fullWidth()
                                                                        ->addLayout(__('Add select choices'), 'choices', [
                                                                            Text::make(__('text'), 'text'),

                                                                        ]),
                                                                    Boolean::make(__('required'), 'required'),
                                                                ])->addLayout(__('Add text'), 'text', [
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
                                                                    Number::make(__('validation num'), 'validation_num'),

                                                                    Boolean::make(__('required'), 'required'),
                                                                ])


                                                        ]),


                                                ]),

                                        ]),


                                ]),

                        ])->addLayout(__('Flexible Section'), 'Flexible_section', [
                            Text::make(__('section name'), 'section_name'),

                            Flexible::make(__('questions'), 'questions')
                                ->fullWidth()
                                ->button(__('Add questions'))
                                ->addLayout(__('Add select'), 'select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add radio select'), 'radio_select', [
                                    Text::make(__('text'), 'text'),
                                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                        ->fullWidth()
                                        ->addLayout(__('Add select choices'), 'choices', [
                                            Text::make(__('text'), 'text'),

                                        ]),
                                    Boolean::make(__('required'), 'required'),
                                ])->addLayout(__('Add text'), 'text', [
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
                                    Number::make(__('validation num'), 'validation_num'),

                                    Boolean::make(__('required'), 'required'),
                                ])
                                ->addLayout(__('radio select depend'), 'radio_select_depend', [

                                    text::make(__('questions text'), 'text'),
                                    text::make(__('true answer'), 'yes'),
                                    text::make(__('false answer'), 'no'),

                                    Flexible::make(__('questions'), 'questions')
                                        ->fullWidth()
                                        ->button(__('Add questions'))
                                        ->addLayout(__('Add select'), 'select', [
                                            Text::make(__('text'), 'text'),
                                            Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                ->fullWidth()
                                                ->addLayout(__('Add select choices'), 'choices', [
                                                    Text::make(__('text'), 'text'),

                                                ]),
                                            Boolean::make(__('required'), 'required'),
                                        ])->addLayout(__('Add radio select'), 'radio_select', [
                                            Text::make(__('text'), 'text'),
                                            Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                                                ->fullWidth()
                                                ->addLayout(__('Add select choices'), 'choices', [
                                                    Text::make(__('text'), 'text'),

                                                ]),
                                            Boolean::make(__('required'), 'required'),
                                        ])->addLayout(__('Add text'), 'text', [
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
                                            Number::make(__('validation num'), 'validation_num'),

                                            Boolean::make(__('required'), 'required'),
                                        ])
                                        ->addLayout(__('radio select depend'), 'radio_select_depend', [

                                            text::make(__('questions text'), 'text'),
                                            text::make(__('true answer'), 'yes'),
                                            text::make(__('false answer'), 'no'),

                                            Boolean::make(__('required'), 'required'),


                                        ]),
                                    Boolean::make(__('required'), 'required'),


                                ])


                        ])



                ])




        ];
    }
    public function rules(NovaRequest $request)
    {
        return false;
        return [
            // Your other validation rules...

            // Custom validation for minimum flexible content sections
            'flexible_content_field_name' => 'required|array|min:2',
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
