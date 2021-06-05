<?php

namespace App\Exports;

use App\Models\EventAudiences;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AudiencesExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $list_id;

    function __construct($list_id){
        $this->list_id = $list_id;
    }

    public function query()
    {
        $data = EventAudiences::query();
        $data = $data->where('office_event_id',$this->list_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'name',
            'phone',
            'email',
            'gender',
            'skills',
            'profession',
            'company',
        ];
    }
    
    public function map($event_audiences): array
    {
        return [
            $event_audiences->name,
            $event_audiences->phone,
            $event_audiences->email,
            $event_audiences->gender,
            $event_audiences->skills,
            $event_audiences->profession,
            $event_audiences->company,
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
        ];
    }
}
