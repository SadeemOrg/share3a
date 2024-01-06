<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\FormResults;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;



class ExportFormReselt implements FromCollection, WithHeadings
{
    use Exportable;
    public function __construct(array $year)
    {
        $this->year = $year;
    }

    public function headings(): array
    {
        $array = [];
        array_push($array, 'user_ip');
        array_push($array, '');
        array_push($array, 'browser');
        array_push($array, 'os');
        $healthy = ["__", "_"];
        $yummy   = ["  ", "  "];
        $FormResults = FormResults::where('id', $this->year[0])->first();

        $form = Form::where('id', $FormResults->form_id)->first();
        $questions = $form->questions;
        $questions = json_decode($questions);
        // foreach ($questions as $question) {
        //     if ($question->layout == 'select') {
        //         array_push($array, str_replace($healthy,  $yummy, $question->attributes->name));

        //     } else {
        //         array_push($array, str_replace($healthy,  $yummy, $question->attributes->text));

        //     }
        // }
        // foreach (json_decode($FormResults->result) as $key => $value) {
        //     // $series = str_replace(' ',   $healthy, $value->questionskey);
        //     // dd( $series);
        //     array_push($array, str_replace($healthy,  $yummy, $value->questionskey));
        // }


        // dd($array);
        return $array;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd($this->year);
        $FormResults = FormResults::select('user_ip', 'result', 'browser', 'os')->wherein('id', $this->year)->get();


        $healthy = ["__", "_"];
        $yummy   = ["  ", "  "];
        foreach ($FormResults as $key => $FormResult) {
            $data = " ";

            // dd( Str::replace('-', '/', '12-28-2021'));
            foreach (json_decode($FormResult->result) as $key => $value) {
                // $series = str_replace(' ',   $healthy, $value->questionskey);
                // dd( $series);
                $KEYS = str_replace($healthy,  $yummy, $value->questionskey);
                $FormResult->$KEYS  = $value->questionsanswerkey;
            }
            $FormResult->result = [];
        }
        // dd($FormResults);
        return $FormResults;
    }
}
