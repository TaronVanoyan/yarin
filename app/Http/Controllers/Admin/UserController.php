<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = [
			'users' => User::all()
		];

		return view('admin.users.index', $data);
	}

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Exception
	 */
	public function usersData(Datatables $datatables)
	{
		$users = User::query();

		return $datatables->eloquent($users)
			->addColumn('actions', function (User $user) {
				$data = [
					'edit'   => 'users.edit',
					'delete' => 'users.destroy',
					'entity' => $user
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
		return view('admin.users.create');
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
			'entity' => User::find($id)
		];

		return view('admin.users.edit', $data);
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
			flash(__('app.save_user_success'))->success()->important();
		}
		catch (\Exception $e)
		{
			flash(__('app.save_user_error'))->error()->important();
		}

		return redirect()->route('users');
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
		$user = User::findOrFail($id);
		try
		{
			$user->delete();
			flash(__('app.delete_user_success'))->success()->important();
		}
		catch (\Exception $e)
		{
			flash(__('app.delete_user_error'))->error()->important();
		}

		return redirect()->route('users');
	}
}
