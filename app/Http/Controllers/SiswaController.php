<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use File;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambahsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages=[
            'required' => 'Field :attribute harus diisi.',
            'min' => 'Panjang :attribute minimal :min karakter.',
            'max' => 'Panjang :attribute maksimal :max karakter.',
            'numeric' => 'Field :attribute hanya bisa diisi angka.',
            'mimes' => 'File :attribute harus bertipe jpg, jpeg, svg, atau gif.',
            'size' => 'File yang diunggah maksimal berukuran :size.'
        ];
        $this->validate($request, [
            'nama' => 'required|min:2|max:30',
            'alamat' => 'required|min:5|max:80',
            'jk' => 'required',
            'email' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,svg',
            'about' => 'required|min:5|max:500'
        ], $messages);
    
    //ambil informasi file yang diupload
    $file = $request->file('foto');

    //rename + ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

    //proses upload
    $tujuan_upload = './template/img/';
    $file->move($tujuan_upload,$nama_file);
    

    siswa::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jk' => $request->jk,
        'email' => $request->email,
        'foto' => $nama_file,
        'about' => $request->about
    ]);

    return redirect('/mastersiswa');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id);
        return view('admin.showsiswa', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('admin.editsiswa', compact('data'));
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
        $messages=[
            'required' => 'Field :attribute harus diisi.',
            'min' => 'Panjang :attribute minimal :min karakter.',
            'max' => 'Panjang :attribute maksimal :max karakter.',
            'numeric' => 'Field :attribute hanya bisa diisi angka.',
            'mimes' => 'File :attribute harus bertipe jpg, jpeg, svg, atau gif.',
            'size' => 'File yang diunggah maksimal berukuran :size.'
        ];
        $this->validate($request, [
            'nama' => 'required|min:2|max:30',
            'alamat' => 'required|min:5|max:80',
            'jk' => 'required',
            'email' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg',
            'about' => 'min:5|max:500'
        ], $messages);

        if($request->foto != ''){
            //dengan ganti foto
            //hapus foto lama
            $old=Siswa::find($id);
            file::delete('./template/img/'.$old->foto);

            $file = $request->file('foto');

            //rename + ambil nama file 
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './template/img/';
            $file->move($tujuan_upload,$nama_file);

            $siswa=Siswa::find($id);
            $siswa->nama=$request->nama;
            $siswa->alamat=$request->alamat;
            $siswa->jk=$request->jk;
            $siswa->email=$request->email;
            $siswa->foto=$nama_file;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect('mastersiswa');
        }
        else{
            $siswa=Siswa::find($id);
            $siswa->nama=$request->nama;
            $siswa->alamat=$request->alamat;
            $siswa->jk=$request->jk;
            $siswa->email=$request->email;
            $siswa->about=$request->about;
            $siswa->save();
            return redirect('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
