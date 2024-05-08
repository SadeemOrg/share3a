<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ExportFormReselt extends Action
{
    public function name()
    {
        return __('ExportFormReselt');
    }
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {

        // ?name=AASAS&email=qqq%40jjf.f&phone=Q&password=ASASA
        $string = '?';
        foreach ($models as $key => $value) {
            // dump($key);
            $test = $key;
            if ($test != 0) {

                if (!( $models[--$test]->form_id == $value->form_id))
                {
                    return Action::danger('لا يمكن طباعة نتيجة لاكثر من صفحة');
                }
            }

            $value->update([
                'is_new' => '0',
                'modified_by' => Auth::id(),


            ]);
            $string .= 'reselt' . $key . '=' . $value->id . '&&';
        }
        // dd('/export-form/' .$string);

        return   Action::download(url('/export-form-reseat/' . $string), 'file.cvs');
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
