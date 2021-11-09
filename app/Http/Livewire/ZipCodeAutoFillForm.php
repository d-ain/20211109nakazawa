<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */

namespace App\Http\Livewire;

use Livewire\Component;
use Seus31\ZipCodeAutoFill\Models\ZipCodeAutoFillZipCode;

class ZipCodeAutoFillForm extends Component
{
    protected $listeners = [
        'searchZipCode'
    ];

    public function searchZipCode($zipCode)
    {
        if (preg_match('/\A\d{7}\z/', $zipCode) === 1) {
            $zipCodeRecord = ZipCodeAutoFillZipCode::where('zipcode', $zipCode)->first();

            if (!empty($zipCodeRecord)) {
                $result = [
                    'status' => 'OK',
                    'result' => [
                        'prefecture' => $zipCodeRecord->prefecture,
                        'city' => $zipCodeRecord->city,
                        'address' => $zipCodeRecord->address,
                    ]
                ];
            } else {
                $result = [
                    'status' => 'NG',
                    'message' => '該当するデータがありません。'
                ];
            }
        } else {
            $result = [
                'status' => 'NG',
                'message' => '郵便番号が正しくありません。'
            ];
        }

        $this->emit('resultSearchZipCode', $result);
    }

    public function render()
    {
        return view('livewire.zip-code-auto-fill-form');
    }
}
