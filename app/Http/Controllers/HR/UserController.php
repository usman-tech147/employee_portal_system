<?php

namespace App\Http\Controllers\HR;

use App\EmployeeFinalReport;
use App\Models\Hr\ManageProgram\School;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
//        $users = User::all();
//        return view('hr.users.user_show', compact('users'));
        return view('hr.users.user_show');
    }

    public function getAllUsers()
    {
        $users = User::all();

        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$user->id.'" onclick="editUser('.$user->id.')" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$user['id'].'" onclick="deleteUser('.$user->id.')" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('name',function ($user){
                return $user->first_name;
            })
            ->addColumn('role',function ($user){

                $user_role = "";
                foreach($user->getRoleNames() as $role){
                    $user_role = $role;
                }
                return $user_role;
            })
            ->rawColumns(['action','name','role'])->toJson();

    }

    public function getAllSchools()
    {
        $schools = School::all();
        return response()->json(['schools' => $schools]);
    }

    public function getSchoolDepartments($id)
    {
        $departments = School::find($id)->departments;
        return response()->json(['departments' => $departments]);
    }
//    public function create()
//    {
//        $roles = Role::all();
//        $schools = School::all();
////        dd($schools);
//        return view('hr.users.user_create', compact('roles','schools'));
//    }
//
//    public function getDepartments($id)
//    {
//        $departments = School::find($id)->departments;
//        $template = '';
//        foreach ($departments as $department) {
//            $template .= '<option value="' . $department->id . '">' . $department->name . '</option>';
//        }
//        return response()->json(['data' => $template]);
////        $departments = School::find($id)->departments;
////        return $departments;
////        return response()->json(['data',$departments]);
//    }
//
//    public function store(Request $request)
//    {
////        dd($request);
//        $this->validate($request, [
//            'first_name' => 'required|string|max:255',
//            'last_name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'gender' => 'required|not_in:default',
//            'school_id' => 'not_in:default',
//            'department_id' => 'not_in:default',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//
//        $request['password'] = bcrypt($request->password);
//        $user = User::create($request->all());
//        $user->assignRole($request->role);
//        if($request->role=='teacher')
//        {
//            $emp_final = new EmployeeFinalReport();
//            $emp_final->user_id = $user->id;
//            $emp_final->save();
//        }
////        $user->syncRoles([$request->role]);
//        $user->save();
//        return redirect()->route('users.index');
//    }
}

