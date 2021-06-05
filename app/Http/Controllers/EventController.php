<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfficeEvent;
use App\Models\EventAudiences;
use Hashids\Hashids;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EventsExport;
use App\Exports\AudiencesExport;
use App\Imports\EventAudiencesImport;

use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $widget = [
            'totalEvent'    => OfficeEvent::all()->count(),
            'eventToday'    => OfficeEvent::whereDate('event_date', Carbon::today())->count(),
            'eventMonth'    => OfficeEvent::whereDate('event_date', '>=', Carbon::now()->subDays(30))->count(),
            'audienceToday' => EventAudiences::whereHas('officeEvent', function($query) {
                                    $query->whereDate('event_date', Carbon::today());
                                })->count(),
            'audienceMonth' => EventAudiences::whereHas('officeEvent', function($query) {
                                    $query->whereDate('event_date', '>', Carbon::now()->subDays(30));
                                })->count()
        ];
        $event = OfficeEvent::all();
        $summary = [
            'byGender'  => [
                'male'  => EventAudiences::whereGender('Male')->count(),
                'female'=> EventAudiences::whereGender('Female')->count()
            ]
        ];
        
        return view('event.event_list', compact('widget','event','summary'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $officeEvent = new OfficeEvent;
        $officeEvent->name = $request->name;
        $officeEvent->event_date = $request->event_date;
        $officeEvent->location = $request->location;
        $officeEvent->speaker = $request->speaker;
        $officeEvent->save();

        $file = $request->file('file'); //GET FILE
        $importEventAudiences = new EventAudiencesImport($officeEvent->id);
        Excel::import($importEventAudiences, $file); //IMPORT FILE 
        $officeEvent->audience_count = $importEventAudiences->count();
        $officeEvent->save();
        return response()->json(true);
        // return redirect()->back()->with(['toastrnya' => 'Upload success']);
    }

    public function update(Request $request)
    {
        if($request->file('file')!=null){
            EventAudiences::where('office_event_id',$request->id)->delete();
            $file = $request->file('file'); //GET FILE
            $importEventAudiences = new EventAudiencesImport($request->id);
            Excel::import($importEventAudiences, $file); //IMPORT FILE 
            $audience_count = $importEventAudiences->count();

            OfficeEvent::where('id',$request->input('id'))->update([
                'name' => $request->name,
                'event_date' => $request->event_date,
                'location' => $request->location,
                'speaker' => $request->speaker,
                'event_date' => $request->event_date,
                'audience_count' => $audience_count,
            ]);
        }
        else{
            OfficeEvent::where('id',$request->input('id'))->update([
                'name' => $request->name,
                'event_date' => $request->event_date,
                'location' => $request->location,
                'speaker' => $request->speaker,
                'event_date' => $request->event_date,
            ]);
        }
        return response()->json(true);
    }

    public function query1($request)
    {
        $data = OfficeEvent::select([
            'office_events.*',
        ])
        ;
        if($request->input('search.value')!=null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(office_events.id) like ?',['%'.strtolower($request->input('search.value')).'%'])
                ->orwhereRaw('LOWER(office_events.name) like ?',['%'.strtolower($request->input('search.value')).'%'])
                ;
            });
        }

        if($request->input('fromDate')!=null){
            $data = $data->whereBetween('event_date',array($request->fromDate, $request->toDate));
        }
        return $data;
    }

    public function dataEvent(Request $request)
    {
        $orderBy =  'office_events.id';
        
        switch ($request->input('order.0.column')) {
            case "0":
                $orderBy = 'office_events.id';
                break;
            case "1":
                $orderBy = 'office_events.name';
                break;
            case "2":
                $orderBy = 'office_events.audience_count';
                break;
            case "3":
                $orderBy = 'office_events.event_date';
                break;
        }
        
        $data = $this->query1($request);

        $recordsFiltered = $data->get()->count();
        if($request->input('length')!=-1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy,$request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw'=>$request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function show(Request $request)
    {
        $hash = new Hashids();
        $event = OfficeEvent::find($request->id);
        
        $audiences = EventAudiences::where('office_event_id',$request->id)->get();
        
        return view('event.event_show',compact('event','audiences','hash'))->render();
    }

    public function exportEvent(Request $request)
    {
        $request = request();
        $data = $this->query1($request);
        return Excel::download(new EventsExport($data), 'event.xlsx');
    }

    public function exportAudience($id)
    {
        $id = $hash->decodeHex($id);
        return Excel::download(new AudiencesExport($id), 'audiences.xlsx');
    }

    public function destroy(Request $request)
    {
        OfficeEvent::where('id',$request->get('id'))->delete();
        return response()->json(true);
    }
}
