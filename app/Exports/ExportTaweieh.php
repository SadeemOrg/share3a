<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\FormResults;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;



class ExportTaweieh implements FromCollection, WithHeadings
{
    use Exportable;
    public function __construct(array $year)
    {
        $this->year = $year;
    }

    public function headings(): array
    {
        $array = [];
        array_push($array, 'الاسم الكامل');
        array_push($array, 'الهاتف');
        array_push($array, 'ملاحظات');

        return $array;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd($this->year);

        $FormResults = FormResults::select('id','user_ip', 'result', 'browser', 'os')->wherein('id', $this->year)->get();
        // dd($FormResults,$this->year);
        $valueKey = [
            "الاسم الكامل",
            "الهاتف",
            "note",
        ];
        // dd($valueKey);
        // $finalArray = [];
        // foreach ($FormResults as $key => $FormResult) {
        //     $pushArray = [];
        //     foreach ($valueKey as $element) {
        //         foreach (json_decode($FormResult->result) as $item) {

        //             if ($item->questionskey === $element) {

        //                 array_push($pushArray, $item->questionskey);
        //             }

        //         }

        //     }
        //     array_push($finalArray,$pushArray);


        // }
        $finalArray = [];

        foreach ($FormResults as $key => $FormResult) {
            $pushArray = [];
            // Initialize the pushArray with 0 for each element in $valueKey
            foreach ($valueKey as $element) {
                $pushArray[$element] = 0;
            }

            foreach (json_decode($FormResult->result) as $item) {
                // dump($item->questionskey);

                // Check if the questionskey exists in the valueKey array
                if (in_array($item->questionskey, $valueKey)) {
                    // If found, update the value in pushArray

                    $pushArray[$item->questionskey] = $item->questionsanswerkey;
                }
            }

            $pushArray['url'] =url('/Admin/resources/form-results/'.$FormResult->id);
            // Push the pushArray to finalArray
            $finalArray[] = $pushArray;
        }

        return collect($finalArray);
    }
}
