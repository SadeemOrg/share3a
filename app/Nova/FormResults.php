<?php

namespace App\Nova;

use App\Models\Form;
use App\Nova\Actions\ExportForm;
use App\Nova\Actions\ExportFormReselt;
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
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class FormResults extends Resource
{
    // public static function availableForNavigation(Request $request)
    // {
    //     return false;
    // }
    public static function label()
    {
        return __('ادارة العملاء القدم ');
    }

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\FormResults>
     */
    public static $model = \App\Models\FormResults::class;

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
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('is_new',0);
        // return $query->whereNotBetween('created_at', [Carbon::now()->subDays(10), Carbon::now()]);
    }
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            // Text::make(__('Page'), 'form_id',function(){

            //    $form= Form::find($this->form_id);
            //     return$form->slug;
            // })->sortable(),
            Text::make(__('user_ip'), 'user_ip'),
            Text::make(__('os'), 'os'),
            Text::make(__('browser'), 'browser'),

            Tiptap::make(__('result'), 'result', function () {
                $data = " ";
                $healthy = ["__", "_"];
                $yummy   = ["  ", "  "];
                // dd( Str::replace('-', '/', '12-28-2021'));
                foreach (json_decode($this->result) as $key => $value) {
                    // $series = str_replace(' ',   $healthy, $value->questionskey);
                    // dd( $series);
                    $data .= "<p>" .   str_replace($healthy,  $yummy, $value->questionskey)  .  ' :' . $value->questionsanswerkey . '</p>';
                }
                return $data;
            })->alwaysShow(),
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
            // new ExportForm(),
            // new ExportFormReselt(),
            // new ExportForm(),
            //   (  new DownloadExcel())->withHeadings(),
            // new DownloadExcel,
        ];
    }
}
