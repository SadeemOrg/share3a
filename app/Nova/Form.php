<?php

namespace App\Nova;

use App\Models\User;
use App\Nova\Actions\ExportForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if ((in_array($request->user()->userrole(), [1, 2]))) {
            return true;
        } else return false;
    }
    public  function authorizedToUpdate(Request $request)
    {

        if ((in_array($request->user()->userrole(), [1, 2]))) {
            return true;
        } else return false;
    }
    // public function authorizedToDelete(Request $request)
    // {
    //     if ((in_array("0",json_decode(  $request->user()->userrole()) ))){

    //         return true;
    //     }
    // }


    public static function indexQuery(NovaRequest $request, $query)
    {
        // dd( $request->user()->userrole());
        if ($request->user()->userrole() == 1) {
            // dd("dd");
            return $query;
        }
        //  dd(in_array("1",  $request->user()->userrole()));/
        //  dd(in_array("1",json_decode( $request->user()->userrole())));
        // dd(gettype( $request->user()->userrole()));
        if ($request->user()->userrole() == 2) {
            dd( Auth::user()->leadingform()) ;// $query->where('added_by',   Auth::id());
        }

        // return $query->where('added_by',   Auth::id());
    }
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('slug', 'slug'),
            Text::make('text', 'text'),
            Text::make('sup_text', 'sup_text'),
            Text::make('note', 'note'),
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

            Multiselect::make('leading', 'leadings')
                ->fillUsing(function (NovaRequest $request, $model, $attribute, $requestAttribute) {
                    return null;
                })
                ->options(function () {
                    if (Auth::user()->userrole()==1) {
                        $forms =  User::all();
                    }
                    else{

                        $forms =  User::where("added_by", Auth::id())->get();
                    }

                    $address_type_admin_array =  array();

                    foreach ($forms as $forms) {

                        $address_type_admin_array += [$forms['id'] => ($forms['name'])];
                    }
                    return $address_type_admin_array;
                })->canSee(function (NovaRequest $request) {
                    if (Auth::check()) {
                        if ($request->user()->userrole() !=3) {
                            return true;
                        }
                    }
                }),
            BelongsToMany::make(__("leadingw"), "leading", \App\Nova\User::class)->showOnCreating(),
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
        foreach ($request->leadings as $key => $value) {
            DB::table('form_users')
                ->updateOrInsert(
                    ['form_id' => $model->id, 'user_id' =>  $value]

                );
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
            new ExportForm(),
        ];
    }
}
