<?php

namespace App\Nova;

use App\Models\Form;
use App\Models\FormUser;
use App\Nova\Actions\contactedWith;
use App\Nova\Actions\DeleteUser;
use App\Nova\Actions\ExportForm;
use App\Nova\Actions\ExportFormReselt;
use App\Nova\Actions\MightSubscribe;
use App\Nova\Actions\notRespond;
use App\Nova\Actions\NotWantSubscribe;
use App\Nova\Actions\SubscriptionConfirmed;
use App\Nova\Filters\FormType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use R64\NovaFields\JSON;
use Manogi\Tiptap\Tiptap;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Pdmfc\NovaFields\ActionButton;

class NewFormResults extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\NewFormResults>
     */
    public static $model = \App\Models\FormResults::class;

    public static function label()
    {
        return __('ادارة العملاء الجدبدة ');
    }

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
        return false;
    }
    public  function authorizedToUpdate(Request $request)
    {
        return false;
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

    // public static function indexQuery(NovaRequest $request, $query)
    // {

    //     return $query->where('is_new',1);
    //     // return $query->whereBetween('created_at',  [Carbon::now()->subDays(10),Carbon::now()]);
    // }
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->userrole() == 1) {
            // dd("dd");
            return $query->where('is_new', 1);
        }

        $user = Auth::user();
        $formsarray = FormUser::where(['user_id' => Auth::id()])->Select('form_id')->pluck('form_id')->toArray();

        $query->where('is_new', 1)->Wherein('form_id', $formsarray);
    }
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),


            BelongsTo::make(__('form'), 'form', \App\Nova\form::class)->hideWhenCreating()->hideWhenUpdating(),
            BelongsTo::make(__('modified_by'), 'modifiedBy', \App\Nova\User::class),
            Select::make(__('status'), 'status')->options([
                '0' => __('لم يتم التواصل'),
                '1' => __('تم التواصل'),
                '2' => __('تم تأكيد الاشتراك'),
                '3' => __('لا يريد الاشتراك'),
                '4' => __('ربما يشترك'),
            ])->displayUsingLabels(),
            Text::make(__('result'), 'result', function () {
                $data = " ";
                $healthy = ["__", "_"];
                $yummy   = ["  ", "  "];
                // dd( Str::replace('-', '/', '12-28-2021'));
                foreach (json_decode($this->result) as $key => $value) {
                    // $series = str_replace(' ',   $healthy, $value->questionskey);
                    // dd( $series);

                    $substring = 'https://sajilne.com';
                    if (strpos($value->questionsanswerkey, $substring) !== false) {
                        $data .= "<p>" .   str_replace($healthy,  $yummy, $value->questionskey)  . '</p>';

                        $data .=    "<a style='color: blue;' href='$value->questionsanswerkey'>اذهب الي المستند</a>";
                    } else {

                        $data .= "<p style='color: white;'><b>" .   str_replace($healthy,  $yummy, $value->questionskey)  . '</b></p>';
                        $data .= "<p style='color: green;'>" . $value->questionsanswerkey . '</p>';
                    }
                }
                return  $data;
            })->hideWhenCreating()->hideWhenUpdating()->asHtml(),




            // Textarea::make('result', 'result', function () {
            //     $data = "";
            //     // dd($this->result);
            //     foreach (json_decode($this->result) as $key => $value) {
            //         // dd($key,$value);
            //         $data .= "" .    $value->questionskey .  ' == ' . $value->questionsanswerkey ;
            //     }
            //     return $data;
            // }),


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
            new FormType
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
            new ExportFormReselt,
            new contactedWith,
            new SubscriptionConfirmed,
            new   NotWantSubscribe(),
            new MightSubscribe()

        ];
    }
}
