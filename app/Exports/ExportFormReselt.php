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
        array_push($array, 'الاسم');
        array_push($array, 'العائلة');
        array_push($array, 'البلد');
        array_push($array, 'رقم الهويه');
        array_push($array, 'رقم الهاتف');
        array_push($array, 'اسم البنك ورقمه');
        array_push($array, 'رقم الفرع');
        array_push($array, 'رقم الحساب');
        array_push($array, 'معدل_الدخل_الشهري_للأسرة');
        array_push($array, 'حالة الاحتياج');
        array_push($array, 'رابط الملف');


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
            "الاسم:_שם",
            "العائلة:_המשפחה",
            "البلد",
            "رقم_الهوية:_מספר_ת_ז",
            'رقم_الجوال__',
            "اسم_البنك_ورقمه",
            "الفرع",
            "رقم_الحساب",
            "معدل_الدخل_الشهري_للأسرة",
            "تعبئة_استمارة_حالة_الاحتياج_"
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
