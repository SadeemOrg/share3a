<?php

namespace App\Nova;

use App\Nova\Actions\ExportForm;
use Illuminate\Http\Request;
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
    public static function availableForNavigation(Request $request)
    {
        return false;
    }
    public static function label()
    {
        return __('ادارة المشاركين ');
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
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('user_ip', 'user_ip'),
            Text::make('os', 'os'),
            Text::make('browser', 'browser'),
            Tiptap::make('result', 'browser', function () {
                $data = " ";
                $healthy = ["__", "_"];
                $yummy   = ["  ", "  "];
                // dd( Str::replace('-', '/', '12-28-2021'));
                foreach (json_decode($this->result) as $key => $value) {
                    // $series = str_replace(' ',   $healthy, $value->questionskey);
                    // dd( $series);
                    $data .= "<p>" .   str_replace( $healthy,  $yummy, $value->questionskey)  .  ' :' . $value->questionsanswerkey . '</p>';
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
            // new ExportForm(),
        //   (  new DownloadExcel())->withHeadings(),
            // new DownloadExcel,
        ];
    }
}
