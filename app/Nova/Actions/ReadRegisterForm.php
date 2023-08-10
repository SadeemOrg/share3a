<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use PhpParser\Node\Stmt\TryCatch;

class ReadRegisterForm extends Action
{
    use InteractsWithQueue, Queueable;

    public function name()
    {
        return __('ReadRegisterForm');
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
        foreach ($models as $model) {

            try {
                DB::table('users')->insert([
                    'name' => $model->name,
                    'email' =>  $model->email,
                    'password' => Hash::make('10203040'),
                    'roles'=>'2',
                    'status'=>'2',
                    'phone_number'=>$model->phone,
                ]);
            } catch (\Throwable $th) {
                return Action::danger('حدث خطا');
            }
            $model->update([
                'is_new'=>'1',

            ]);
            $details = [
              'name' => $model->name,
                'title' => 'لقد تم قبولك في sajilne.com',
                'email'=>$model->email,
                'password' => '10203040',


            ];

            \Mail::to($model->email)->send(new \App\Mail\MyUSerMail($details));
        }
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
