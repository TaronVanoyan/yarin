<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'teachers' => Teacher::all()
        ];

        return view('admin.teachers.index', $data);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function teachersData(Datatables $datatables)
    {
        $teachers = Teacher::query();

        return $datatables->eloquent($teachers)
            ->addColumn('actions', function (Teacher $teacher) {
                $data = [
                    'edit'   => 'teacher.edit',
                    'delete' => 'teacher.destroy',
                    'entity' => $teacher
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

        return view('admin.teachers.create');
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
            'position' => 'required|string|min:6'
        ];

        $request->validate($rules);

        try
        {
            $teacher        = new Teacher();
            $teacher->fill($request->all());
            $teacher->save();
            if ($request->hasFile("image")){
                $image       = $request->file('image');
                $teacher_image = new \App\ImageManager();
                $teacher_image->setType("teacher");
                $teacher_image->setEventTumbnailH(251);
                $teacher_image->setEventTumbnailW(251);
                $teacher_image->create($image,$teacher->id);
            }
            flash(__('app.save_teachers_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
            flash(__('app.save_teachers_error'))->error()->important();
        }

        return redirect()->route('teacher.edit',$teacher->id);
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
            'entity' => Teacher::find($id)
        ];

        return view('admin.teachers.edit', $data);
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
            'position' => 'required|string|min:6'
        ];



        $request->validate($rules);

        try
        {
            $teacher        = \App\Teacher::findOrFail($id);
            $teacher->fill($request->all());
            $teacher->update();
            if ($request->hasFile("image")){
                $image       = $request->file('image');
                $teacher_image = new \App\ImageManager();
                $teacher_image->setType("teacher");
                $teacher_image->setEventTumbnailH(251);
                $teacher_image->setEventTumbnailW(251);
                $teacher_image->create($image,$teacher->id);
            }
            flash(__('app.save_teachers_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.save_teachers_error'))->error()->important();
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
        $user = Teacher::findOrFail($id);
        try
        {
            $user->delete();
            flash(__('app.delete_teachers_success'))->success()->important();
        }
        catch (\Exception $e)
        {
            flash(__('app.delete_teachers_error'))->error()->important();
        }

        return redirect()->route('teachers');
    }
}
