<?php

namespace App\Nova;

use App\Models\Form;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany as FieldsHasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\MultiselectField\Multiselect;

class User extends Resource
{

    public static function label()
    {
        return __('User');
    }
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */



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
     public static function availableForNavigation(Request $request)
     {
         if ((in_array( $request->user()->userrole(),[1,2] ) )){
             return true;
         }
        else return false;
     }

    public static function indexQuery(NovaRequest $request, $query)
    {

       if ($request->user()->userrole()==1){

           return $query;
       }
       elseif($request->user()->userrole()==2){
        $user = Auth::user();
        return $query->where('added_by', $user->id  );
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


            Text::make(__('Name'),'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Email'),'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

                Text::make(__('phone number'),'phone_number')
                ->sortable()
                ->rules('max:14'),




            Password::make(__('Password'),'password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),




                Select::make('permission','permission')->options([
                    '1' => 'read',
                    '2' => 'write && read',
                ])->canSee(function (NovaRequest $request) {
                    if(Auth::check())
                    {
                    if ($this->roles==3){
                        return true;
                    }
                }
                })->hideFromIndex()->displayUsingLabels(),
            BelongsTo::make(__('added_by'), 'addedby', \App\Nova\User::class)->hideWhenCreating()->hideWhenUpdating(),
            FieldsHasMany::make(__('userAdded'), 'useradd', \App\Nova\User::class)->hideWhenCreating()->hideWhenUpdating()
            ->canSee(function (NovaRequest $request) {
                if(Auth::check())
                {
                if ($this->roles==3){
                    return false;
                }
                else
                {
                    return true;
                }
            }
            }) ,
            FieldsHasMany::make(__('Forms'), 'Forms', \App\Nova\Form::class)->hideWhenCreating()->hideWhenUpdating(),


        ];
    }
    // Do something before the model is created
    public static function beforeCreate(Request $request, $model)
    {
        $user = Auth::user();
        // dd($user->roles == 1 ? 2 : 3);
        $model->added_by = $user->id;
        $model->roles = $user->roles == 1 ? 2 : 3;
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
