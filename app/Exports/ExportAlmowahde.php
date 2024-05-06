<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\FormResults;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;



class ExportAlmowahde implements FromCollection, WithHeadings
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


        $FormResults = FormResults::select('user_ip', 'result', 'browser', 'os')->wherein('id', $this->year)->get();

        $healthy = ["__", "_"];
        $yummy   = ["  ", "  "];
        foreach ($FormResults as $key => $FormResult) {
            $data = " ";
            foreach (json_decode($FormResult->result) as $key => $value) {
                $KEYS = str_replace($healthy,  $yummy, $value->questionskey);
                array_push($array,  $KEYS);
            }
            $FormResult->result = [];
        }

        return $array;
    }




    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $valueKey = [
            "user_ip",
            'browser'


        ];
        $FormResults = FormResults::select( 'result')->wherein('id', $this->year)->get();


        $healthy = ["__", "_"];
        $yummy   = ["  ", "  "];
        foreach ($FormResults as $key => $FormResult) {
            $data = " ";

            // dd( Str::replace('-', '/', '12-28-2021'));
            foreach (json_decode($FormResult->result) as $key => $value) {
                // $series = str_replace(' ',   $healthy, $value->questionskey);
                // dd( $series);
                $KEYS = str_replace($healthy,  $yummy, $value->questionskey);
                if (in_array($KEYS, $valueKey)) {
                } else {

                    $FormResult->$KEYS  = $value->questionsanswerkey;
                }
            }
            $FormResult->result = [];
        }
        // dd($FormResults);
        return $FormResults;
    }
}
