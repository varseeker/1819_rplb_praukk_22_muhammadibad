<?php

/**
 * Controller untuk menghubungkan model petugas/i dengan segala aktifitas website.
 * @author Muhammad Ibadurrahman Al-ahsan  
 * @filesource M_Petugas.php
 * @version Laravel 7.0
 */

namespace App\Http\Controllers;

use App\M_Petugas;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PDF;

class C_Petugas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        $petugas = M_Petugas::paginate(5);

        return view('dashboard.admin.d_petugas.index', compact('petugas'));
        $search = M_Petugas::search()->get();
    }

    public function cetak_pdf()
    {
        $petugas = M_Petugas::all();

        $pdf = PDF::loadview('petugas_pdf', ['petugas' => $petugas]);
        return $pdf->download('laporan-petugas-pdf');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table petugas sesuai pencarian data
        $petugas = DB::table('petugas')
            ->where('nama', 'like', "%" . $cari . "%")
            ->OrWhere('id', 'like', "%" . $cari . "%")
            ->paginate();


        // mengirim data petugas ke view index
        return view('petugas.index', ['petugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        return view('dashboard.admin.d_petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Petugas::create($request->all());

        return redirect('/dashboard/petugas')->with('status', 'Tambah data petugas berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($petugas)
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        $petugas = M_Petugas::findOrFail($petugas);

        return view('dashboard.admin.d_petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($petugas)
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        $petugas = M_Petugas::findOrFail($petugas);

        return view('dashboard.admin.d_petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_Petugas $petugas)
    {
        M_Petugas::where('id', $petugas->id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tlp' => $request->tlp,
            ]);

        return redirect('/dashboard/petugas')->with('status', 'Update data petugas berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Petugas $petugas)
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        M_Petugas::destroy($petugas->id);

        return redirect('/dashboard/petugas')->with('status', 'Hapus data petugas berhasil !');
    }
}
