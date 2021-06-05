<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\User;

class MembersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $data = [];
    
    function __construct($dataCtrl){
        $this->data = $dataCtrl;
    }

    public function collection()
    {
        return $this->data->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'gender',
            'status',
            'dob',
            'city',
            'profession',
            'company',
            'bc',
            'expertises',
            'expertise_categories',
            'instagram',
            'linkedin',
            'facebook',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($users): array
    {
        if($users->is_verified == 1){
            $verified = "Verified";
        }else{
            $verified = "Unverified";
        }
        return [
            $users->id,
            $users->name,
            $users->email,
            $users->phone,
            $users->gender,
            $verified,
            $users->dob,
            $users->city,
            $users->profession,
            $users->company,
            $users->bc,
            $users->expertises,
            $users->expertise_categories,
            $users->instagram,
            $users->linkedin,
            $users->facebook,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => DataType::TYPE_STRING,
            'B' => DataType::TYPE_STRING,
            'C' => DataType::TYPE_STRING,
            'D' => DataType::TYPE_STRING,
            'E' => DataType::TYPE_STRING,
            'F' => DataType::TYPE_STRING,
            'G' => DataType::TYPE_STRING,
            'H' => DataType::TYPE_STRING,
            'I' => DataType::TYPE_STRING,
            'J' => DataType::TYPE_STRING,
            'K' => DataType::TYPE_STRING,
            'L' => DataType::TYPE_STRING,
            'M' => DataType::TYPE_STRING,
            'N' => DataType::TYPE_STRING,
            'O' => DataType::TYPE_STRING,
            'P' => DataType::TYPE_STRING,
        ];
    }
}
