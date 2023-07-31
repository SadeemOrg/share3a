<?php

namespace App\Nova\Actions;

use App\Exports\ExportForm as ExportsExportForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\Excel\Facades\Excel;

class ExportForm extends Action
{
    public $showOnTableRow = true;

    use InteractsWithQueue, Queueable;
    public function name()
    {
        return __('ExportForm');
    }
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {

        foreach ($models as $key => $value) {
                return   Action::download(url('/export-users/' . $value->id), 'aaa.cvs');
            }
         $array = [];


        foreach ($models as $model) {

            array_push($array, $model->id);
        }
        // dd($array);
        return redirect('/export-users');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }
}
