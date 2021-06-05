<?php

namespace App\Imports;

use App\Models\EventAudiences;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EventAudiencesImport implements ToModel, WithHeadingRow
{
    private $office_event_id;
    private $audience_count = 0;

    public function __construct(int $office_event_id)
    {
        $this->office_event_id = $office_event_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->audience_count;
        return new EventAudiences([
            'office_event_id' => $this->office_event_id,
            'name' => $row['name'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'company' => $row['company'],
            'skills' => $row['skills'],
            'profession' => $row['profession'],
        ]);
    }

    public function count()
    {
        return $this->audience_count;
    }
}
