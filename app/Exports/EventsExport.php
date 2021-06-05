<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventsExport implements FromCollection, WithHeadings, WithMapping
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
            'name',
            'event_date',
            'speaker',
            'audience_count',
            'location',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($office_events): array
    {
        return [
            $office_events->name,
            $office_events->event_date,
            $office_events->speaker,
            $office_events->audience_count,
            $office_events->location,
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
        ];
    }
}