<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Image;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'events' => Event::all()
        ];

        return view('admin.events.index', $data);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function eventsData(Datatables $datatables)
    {

        $events = Event::query();

        return $datatables->eloquent($events)
            ->addColumn('actions', function (Event $event) {
                //print_r(__LINE__."<br>");
                $data = [
                    'edit'   => 'event.edit',
                    'delete' => 'event.destroy',
                    'deacrivate'=>'event.cahngestatus',
                    'submitions'=>'event.submitions',
                    'entity' => $event
                ];
                //print_r(__LINE__."<br>");
                $view = View::make('partials.actions', $data);
                //print_r(__LINE__."<br>");
                return $view->render();
            })
            //->addColumn('actions', 'partials.actions')
            ->rawColumns(['actions'])
            ->blacklist(['actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [

            'event_types'=>\App\EventType::all(),
            'teachers'=>\App\Teacher::all(),
        ];
        return view('admin.events.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'title'  => 'required|string|max:255',
            'sub_title1' => 'required|string|max:255',
            'sub_title2' => 'required|string|min:6',
            'syllabus' => 'required|string|min:6',
            'type' => 'numeric|max:6',
            'description' => 'required|string|min:6|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'cost' => 'required|numeric',
            'audience' => 'required|string|min:6|max:255',
            'duration' => 'required|numeric',
            'comment' => 'required|string|min:6|max:255',
            'feauture_event' => 'required|numeric',
        ];

        $request->validate($rules);

        try
        {
            $event        = new Event();
            $event->fill($request->all());
            $event->save();

            if ($request->hasFile("image")){
                $image       = $request->file('image');
                $event_image = new \App\ImageManager();
                $event_image->setType("event");
                $event_image->setEventTumbnailW(492);
                $event_image->setEventTumbnailH(344);
                $event_image->create($image,$event->id);
            }

            flash(__('app.save_event_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_event_error'))->error()->important();
        }

        return redirect()->route('event.edit',$event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'entity' => Event::find($id),
            'event_types'=>\App\EventType::all(),
            'teachers'=>\App\Teacher::all(),
        ];
        //dd($data['entity']->thumbnail);
        return view('admin.events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'title'  => 'required|string|max:255',
            'sub_title1' => 'required|string|max:255',
            'sub_title2' => 'required|string|min:6|max:255',
            'syllabus' => 'required|string|min:6|max:255',
            'type' => 'numeric|max:6',
            'description' => 'required|string|min:6|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'cost' => 'required|numeric',
            'audience' => 'required|string|min:6|max:255',
            'duration' => 'required|numeric',
            'comment' => 'required|string|min:6|max:255',
            'feauture_event' => 'required|numeric',
        ];


        $request->validate($rules);

        //dd($request);
        try
        {
            $event        = Event::findOrFail($id);
            $event->fill($request->all());
            $event->update();

            if ($request->hasFile("image")){
                $image       = $request->file('image');
                $event_image = new \App\ImageManager();
                $event_image->setType("event");
                $event_image->setEventTumbnailW(492);
                $event_image->setEventTumbnailH(344);
                $event_image->create($image,$event->id);
            }


            flash(__('app.save_user_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
            flash(__('app.save_event_error'))->error()->important();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        try
        {
            $event->delete();
            flash(__('app.delete_event_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.delete_event_error'))->error()->important();
        }

        return redirect()->route('events');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(Request $request){

        dd(444);
    }
    /**
     * change the specified resource status.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */

    public function cahngeStatus($id){
        try{
            $even = \App\Event::findOrFail($id);
            $even->status = ($even->status+1) % 2;
            $even->update();
            flash(__('app.status_changed'))->success()->important();
        }catch (\Exception $e){
            flash(__('app.status_change_error'))->success()->important();
        }

        return redirect()->route('events');
    }

}
