<?php

namespace App\Nova;

use Acme\Analytics\Analytics;

use App\Models\Form as ModelsForm;
use App\Models\FormUser;
use App\Models\User;
use App\Nova\Actions\ExportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\MultiselectField\Multiselect;
use Whitecube\NovaFlexibleContent\Flexible;
use Sietse85\NovaButton\Button;
use Stepanenko3\NovaMediaField\Fields\Media;

class Form extends Resource
{

    public static function label()
    {
        return __(' صفحات الهبوط ');
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
            }
            else{

                if ($request->user()->usepermission()==2) {
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
            return $query;
        }

        $user = Auth::user();
        $formsarray = FormUser::where(['user_id' => Auth::id()])->Select('form_id')->pluck('form_id')->toArray();

        $query->where('added_by', $user->id)->orWherein('id', $formsarray);
    }
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make(__('slug'), 'slug')->rules('required'),
            Text::make(__('text'), 'text')->rules('required'),
            Text::make(__('sub_text'), 'sup_text')->rules('required'),
            Text::make(__('note'), 'note')->rules('required'),
            Flexible::make(__('questions'), 'questions')
            ->rules('required')
                ->addLayout(__('Add select'), 'select', [
                    Text::make(__('name'), 'name'),
                    Flexible::make(__('select'), 'selectform')->button(__('Add select choices'))
                        ->addLayout(__('Add select choices'), 'choices', [
                            Text::make(__('text'), 'text'),

                        ])

                ])->addLayout(__('Add text'), 'text', [
                    Text::make(__('text'), 'text'),


                ])->addLayout(__('Add Note Filed'), 'Note', [
                    Text::make(__('text'), 'text'),

                ])->addLayout(__('Add boolean Filed'), 'boolean', [
                    Text::make(__('text'), 'text'),

                ]),

            Multiselect::make(__('leading'), 'leadings')
            ->placeholder('للبحث عن مسؤولين')
                ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                    return null;
                })
                ->options(function () {
                    if (Auth::user()->userrole() == 1) {
                        $forms =  User::all();
                    } else {

                        $forms =  User::where("added_by", Auth::id())->get();
                    }

                    $address_type_admin_array =  array();
                    $address_type_admin_array += [0 => 'All'];
                    foreach ($forms as $forms) {

                        $address_type_admin_array += [$forms['id'] => ($forms['name'])];
                    }
                    return $address_type_admin_array;
                })->canSee(function (NovaRequest $request) {
                    if (Auth::check()) {
                        if ((in_array($request->user()->userrole(), [1, 2]))) {
                            return true;
                        }
                    }
                }),
            BelongsToMany::make(__("leading"), "leading", \App\Nova\User::class)->hideFromIndex(),

            BelongsTo::make(__('added_by'), 'addedby', \App\Nova\User::class)->hideWhenCreating()->hideWhenUpdating()->canSee(function (NovaRequest $request) {
                if (Auth::check()) {
                    if ((in_array($request->user()->userrole(), [1, 2]))) {
                        return true;
                    }
                }
            }),

            hasMany::make(__("new FormResults"), "FormResults", \App\Nova\NewFormResults::class),
            hasMany::make(__("old FormResults"), "FormResults", \App\Nova\FormResults::class),


        ];
    }
    public static function beforeCreate(Request $request, $model)
    {
        $user = Auth::user();
        // dd($user->roles == 1 ? 2 : 3);
        $model->added_by = $user->id;
        // $model->roles = $user->roles == 1 ? 2 : 3;
    }
    public static function aftersave(Request $request, $model)
    {
        if ($request->leadings != null) {
            if ((in_array(0, $request->leadings))) {
                $forms =  User::where("added_by", Auth::id())->get();
                foreach ( $forms as $key => $value) {
                    // dd( $value->id);
                    DB::table('form_users')
                        ->updateOrInsert(
                            ['form_id' => $model->id, 'user_id' =>  $value->id]

                        );
                }
            } else {
                foreach ($request->leadings as $key => $value) {
                    DB::table('form_users')
                        ->updateOrInsert(
                            ['form_id' => $model->id, 'user_id' =>  $value]

                        );
                }
            }
        }
    }
    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            // new Analytics(),
        ];
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
            new ExportForm(),
        ];
    }
}
