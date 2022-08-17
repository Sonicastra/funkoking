<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesCreateRequest;
use App\Order;
use App\Photo;
use App\Product;
use App\Review;
use App\Role;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //We blijven alle roles zien in de Tabel ook de Deleted roles met withTrashed()
        //$roles = Role::withTrashed()->paginate(5);
        $roles = Role::paginate(5);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesCreateRequest $request)
    {
        //
        Role::create($request->all());
        Session::flash('created_role', 'The role has been created!');
        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit', compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->update($request->all());
        Session::flash('updated_role', 'The role has been updated!');
        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        Session::flash('deleted_role', 'The role has been deleted!');
        return redirect()->back();
    }

   /* public function roleRestore($id){
        Role::onlyTrashed()->where('id', $id)->restore();
        Session::flash('softdeleted_role', 'The role has been restored!');
        return redirect()->back();
    }*/
}
