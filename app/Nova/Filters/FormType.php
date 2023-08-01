<?php

namespace App\Nova\Filters;

use App\Models\Form;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class FormType extends Filter
{

    public function name()
    {
        return __('FormType');
    }

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        if($value=="non" )
        { return $query;}

        return $query->where('form_id',$value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        $Areas = Form::all();
        $foo = array();
        $foo['All']='non';
        foreach ($Areas as $Area)
        $foo[$Area->slug]=$Area->id ;
        return $foo;

    }
}
