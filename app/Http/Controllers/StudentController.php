<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([
            'students' => student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
    {
        $validate = $request->validated();
        
        $student = new student;
        $student->id_mahasiswa = $request->nim;
        $student->nama_mahasiswa = $request->nama;
        $student->gender = $request->gender;
        $student->alamat = $request->alamat;
        $student->jurusan= $request->jurusan;
        $student->angkatan= $request->angkatan;
        $student->save();

        return redirect('students')->with('msg','Data Mahasiswa Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $students,$id_mahasiswa)
    {
        $data = $students->find($id_mahasiswa);
        return view('students.formedit')->with([
            'nim' => $id_mahasiswa,
            'nama' => $data->nama_mahasiswa,
            'gender' => $data->gender,
            'alamat' => $data->alamat,
            'jurusan' => $data->jurusan,
            'angkatan' => $data->angkatan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(student $student)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request, student $students,$id_mahasiswa)
    {
        $data = $students->find($id_mahasiswa);
        $data->nama_mahasiswa = $request->nama;
        $data->gender = $request->gender;
        $data->alamat = $request->alamat;
        $data->jurusan= $request->jurusan;
        $data->angkatan= $request->angkatan;
        $data->save();

        return redirect('students')->with('msg','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $students,$id_mahasiswa)
    {
        $data =  $students->find($id_mahasiswa);
        $data -> delete();

        return redirect('students')->with('msg','Data Berhasil DiHapus');
    }
}
