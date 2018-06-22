<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;
use App\Conseiller;


use Calendar;

class EventController extends Controller
{
    // public function index(){
    // 	$events = Event::get();
    // 	$event_list = [];
    // 	foreach ($events as $key => $event) {
    // 		$event_list[] = Calendar::event(
    //             $event->event_name,
    //             true,
    //             new \DateTime($event->start_date),
    //             new \DateTime($event->end_date.' +1 day')
    //         );
    // 	}
    // 	$calendar_details = Calendar::addEvents($event_list); 

    //     return view('events', compact('calendar_details') );
    // }

   //   public function addEvent(Request $request)
   //  {
   //      $validator = Validator::make($request->all(), [
   //          'event_name' => 'required',
   //          'start_date' => 'required',
   //          'end_date' => 'required'
   //          ]);

   //      if ($validator->fails()) {
   //      	\Session::flash('warnning','Please enter the valid details');
   //          return Redirect::to('/events')->withInput()->withErrors($validator);
   //      }

   //      $event = new Event;
   //      $event->event_name = $request['event_name'];
   //      $event->start_date = $request['start_date'];
   //      $event->end_date = $request['end_date'];
   //      $event->save();

   //      \Session::flash('success','Event added successfully.');
   //      return Redirect::to('/events');
   // }


    public function returnCalendar($id){
        $conseiller = Conseiller::find($id);

        $events = Event::where('conseiller_id',  $conseiller->id)->get();
        // var_dump($events);
        // // $events = Event::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
                );
        }
        $calendar_details = Calendar::addEvents($event_list); 

        return view('events', compact('calendar_details','conseiller') );
    }
// public function addEvent(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'event_name' => 'required',
//             'start_date' => 'required',
//             'end_date' => 'required'
//             ]);

//         if ($validator->fails()) {
//             \Session::flash('warnning','Please enter the valid details');
//             return Redirect::to('/events')->withInput()->withErrors($validator);
//         }

//         $event = new Event;
//         $event->event_name = $request['event_name'];
//         $event->start_date = $request['start_date'];
//         $event->end_date = $request['end_date'];
//         $event->save();

//         \Session::flash('success','Event added successfully.');
//         return Redirect::to('/events');
//     }


public function addHours(Request $request ,$id)
    {
        $responsables_id = Auth::id();
        $conseiller_id =$id;

        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
            ]);

        if ($validator->fails()) {
            \Session::flash('warnning','Please enter the valid details');
            return Redirect::to('/agendaConseiller/{id}')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->responsables_id = $responsables_id;
         $event->conseiller_id = $conseiller_id;
        $event->save();

        \Session::flash('success','Event added successfully.');
        // return Redirect::to('/agendaConseiller',);
        return Redirect::back();
    }

    // public function delete




}