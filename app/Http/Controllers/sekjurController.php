<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class sekjurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tambahSekjur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sukses;
        $msg;
        if ($this->emailExist($request->input('email'))) {
            $sukses = false;
            $msg = 'Gagal Menambah Sekjur, Karena Email Sudah Digunakan.';
        } else {
            // $password = bcrypt('12345678');
            // Hash::make($data['password']),
            $request->request->add(['password' => Hash::make($request['password']),]);
            $level = 2;
            $request->request->add(['level' => $level]);
            $insert = User::create($request->all());

            if ($insert) {
                $msg = 'Berhasil Menambah Admin.';
                $sukses = true;
            } else {
                $msg = 'Gagal Menambah Admin.';
                $sukses = false;
            }
        }
        return redirect()->back()->with([
            'afterAction' => true,
            'msg' => $msg,
            'sukses' => $sukses
        ]);
        // return json_encode($request->all());
    }
    public function emailExist($email)
    {
        $cek = User::where('email', '=', $email)->first();
        if ($cek == null) {
            return false;
        } else {
            return true;
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
