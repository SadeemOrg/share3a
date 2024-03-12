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
        // $healthy = ["__", "_"];
        // $yummy   = ["  ", "  "];


        // $FormResults = FormResults::where('id', $this->year[0])->first();

        // $form = Form::where('id', $FormResults->form_id)->first();




        //     $Contents = json_decode($form->questions);

        //     foreach ($Contents as $key => $page) {

        //         foreach ($page->attributes->questions as $key => $sections) {
        //             if ($sections->layout == "Flexible_section") {


        //                 foreach ($sections->attributes->questions as $key22 => $questions) {
        //                     array_push($array,  $questions->attributes->text);
        //                 }
        //             }

        //             if ($sections->layout == "section") {
        //                 foreach ($sections->attributes->questions as $key22 => $questions) {
        //                     array_push($array,  $questions->attributes->text);
        //                 }
        //             }

        //             if ($sections->layout == "multi_section") {
        //                 foreach ($sections->attributes->select as $key => $attributes) {
        //                     foreach ($attributes->attributes->select as $key => $select) {
        //                         if ($select->layout == "section") {
        //                             foreach ($select->attributes->questions as $key22 => $questions) {
        //                                 array_push($array,  $questions->attributes->text);
        //                             }
        //                         }
        //                         if ($select->layout == "Flexible_section") {


        //                             foreach ($select->attributes->questions as $key22 => $questions) {
        //                                 array_push($array,  $questions->attributes->text);
        //                             }
        //                         }
        //                         if ($select->layout == "multi_section") {
        //                             foreach ($select->attributes->select as $key => $attributes) {
        //                                 foreach ($attributes->attributes->select as $key => $select) {
        //                                     if ($select->layout == "section") {
        //                                         foreach ($select->attributes->questions as $key22 => $questions) {
        //                                             array_push($array,  $questions->attributes->text);
        //                                         }
        //                                     }
        //                                     if ($select->layout == "Flexible_section") {


        //                                         foreach ($select->attributes->questions as $key22 => $questions) {
        //                                             array_push($array,  $questions->attributes->text);
        //                                         }
        //                                     }



        //                                 }

        //                                 # code...

        //                             }
        //                         }




        //                     }

        //                     # code...

        //                 }
        //             }
        //         }

        //         $page->validation = $array;
        //     }

        //     return $array;
        $FormResults = FormResults::select('user_ip', 'result', 'browser', 'os')->wherein('id', $this->year)->get();

        $healthy = ["__", "_"];
        $yummy   = ["  ", "  "];
        foreach ($FormResults as $key => $FormResult) {
            $data = " ";

            // dd( json_decode($FormResult->result));

            foreach (json_decode($FormResult->result) as $key => $value) {
                $KEYS = str_replace($healthy,  $yummy, $value->questionskey);
                                array_push($array,  $KEYS);

            }
            $FormResult->result = [];
        }

        // dd($FormResults,$this->array2);

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
