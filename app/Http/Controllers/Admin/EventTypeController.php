<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\EventType;
class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'users' => EventType::all()
        ];

        return view('admin.event_types.index', $data);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function eventTypesData(Datatables $datatables)
    {
        $event_types = EventType::query();

        return $datatables->eloquent($event_types)
            ->addColumn('actions', function (EventType $event_type) {
                $data = [
                    'edit'   => 'event.types.edit',
                    'delete' => 'event.types.destroy',
                    'entity' => $event_type
                ];
                $view = View::make('partials.actions', $data);

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
        return view('admin.event_types.create');
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
        $rules = [
            'name'  => 'required|string|max:255',
        ];

        $request->validate($rules);

        try
        {
            $event_type        = new EventType();
            $event_type->name  = $request->name;

            $event_type->save();
            flash(__('app.save_user_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_event_type_error'))->error()->important();
        }

        return redirect()->route('event.types');
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
            'entity' => EventType::find($id)
        ];

        return view('admin.event_types.edit', $data);
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
            'name'  => 'required|string|max:255',
        ];


        $request->validate($rules);

        try
        {
            $event_type        = EventType::findOrFail($id);
            $event_type->name  = $request->name;

            $event_type->update();
            flash(__('app.save_event_type_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_event_type_error'))->error()->important();
        }

        return redirect()->route('event.types');
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
        $user = EventType::findOrFail($id);
        try
        {
            $user->delete();
            flash(__('app.delete_event_type_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.delete_event_type_error'))->error()->important();
        }

        return redirect()->route('event.types');
    }
}
