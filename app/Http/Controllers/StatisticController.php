<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OfficeEvent;
use App\Models\EventAudience;
use App\Models\Member;

class StatisticController extends Controller
{
    public function index() {

        $dayRange = 30;
        $monthRange = 12;

        $days = collect(range(0, $dayRange-1));
        $months = collect(range(0, $monthRange-1));

        // Daily Member
        $dailyMember = $days->map(function($dt) {
            $date = now()->addDays($dt * -1);
            return [
                'index' => $dt,
                'x_format' => $date->format('d F Y'),
                'x' => $date->format('Y-m-d'),
                'y' => Member::whereDate('created_at', '<=', $date)->count()
            ];
        })->sortByDesc('index')->values();

        // Monthly Member
        $monthlyMember = $months->map(function($dt) {
            // force to last day of month
            $date = now()->addMonths($dt * -1)->endOfMonth();
            return [
                'index' => $dt,
                'x_format' => $date->format('F Y'),
                'x' => $date->format('Y-m'),
                'y' => Member::whereDate('created_at', '<=', $date)->count()
            ];
        })->sortByDesc('index')->values();

        // Daily Event
        $dailyEvent = $days->map(function($dt) {
            $date = now()->addDays($dt * -1);
            $events = OfficeEvent::whereDate('event_date', '=', $date);
            $audienceCount = $events->get()->map(function($dt) {
                return $dt->audiences;
            })->sum();
            return [
                'index' => $dt,
                'x_format' => $date->format('d F Y'),
                'x' => $date->format('Y-m-d'),
                'y' => $events->count(),
                'y_audiences' => $audienceCount,
            ];
        })->sortByDesc('index')->values();

        // Monthly Event
        $monthlyEvent = $months->map(function($dt) {
            // force to last day of month
            $date = now()->addMonths($dt * -1)->endOfMonth();
            $events = OfficeEvent::whereMonth('event_date', '=', $date->format('m'))
                                ->whereYear('event_date', '=', $date->format('Y'));
            $audienceCount = $events->get()->map(function($dt) {
                return $dt->audiences;
            })->sum();
            return [
                'index' => $dt,
                'x_format' => $date->format('F Y'),
                'x' => $date->format('Y-m'),
                'y' => $events->count(),
                'y_audiences' => $audienceCount,
            ];
        })->sortByDesc('index')->values();

        return view('statistic', compact(
            'dailyMember',
            'monthlyMember',

            'dailyEvent',
            'monthlyEvent',
        ));
    }
}
