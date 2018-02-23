<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Submition;
class SubmitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'submitions' => Submition::all()
        ];

        return view('admin.submitions.index', $data);
    }
    /**
     * Display a listing of the event submissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventSubmitions(Datatables $datatables,Request $request,$id)
    {

        if ($request->ajax()){
            $submitions = Submition::query();

            return $datatables->eloquent($submitions)
                ->addColumn('actions', function (Submition $submition) {
                    $data = [
                        'edit'   => 'submition.edit',
                        'delete' => 'submition.destroy',
                        'entity' => $submition
                    ];
                    $view = View::make('partials.actions', $data);

                    return $view->render();
                })
                //->addColumn('actions', 'partials.actions')
                ->rawColumns(['actions'])
                ->blacklist(['actions'])
                ->make(true);
        }else{
            $data = [
                'submitions' => Submition::all()
            ];

            return view('admin.submitions.index', $data);
        }

    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function submitionsData(Datatables $datatables)
    {

        $submitions = Submition::query();

        return $datatables->eloquent($submitions)
            ->addColumn('actions', function (Submition $submition) {
                $data = [
                    'edit'   => 'submition.edit',
                    'delete' => 'submition.destroy',
                    'entity' => $submition
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
        return view('admin.submitions.create');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];

        $request->validate($rules);

        try
        {
            $user        = new User;
            $user->name  = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            flash(__('app.save_user_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_user_error'))->error()->important();
        }

        return redirect()->route('users');
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
            'entity' => Submition::find($id)
        ];

        return view('admin.submitions.edit', $data);
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
            'email' => 'required|string|email|max:255|unique:users,id,' . $id,
        ];

        if ($request->password)
        {
            $rules['password'] = 'string|min:6|confirmed';
        }

        $request->validate($rules);

        try
        {
            $user        = User::findOrFail($id);
            $user->name  = $request->name;
            $user->email = $request->email;
            if ($request->password)
            {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            flash(__('app.save_submition_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_submition_error'))->error()->important();
        }

        return redirect()->route('submitions',$id);
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
        $submition = Submition::findOrFail($id);
        try
        {
            $submition->delete();
            flash(__('app.delete_submition_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.delete_submition_error'))->error()->important();
        }

        return redirect()->route('submition');
    }
}
