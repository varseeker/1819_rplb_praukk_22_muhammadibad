<?php

/**
 * Controller untuk menghubungkan model transaksi/i dengan segala aktifitas website.
 * @author Muhammad Ibadurrahman Al-ahsan  
 * @filesource M_Transaksi.php
 * @version Laravel 7.0
 */

namespace App\Http\Controllers;

use PDF;
use App\M_Transaksi;
use App\M_Detail_Transaksi;
use App\M_Paket;
use App\M_Outlet;
use App\M_Petugas;
use App\User;
use App\M_Customer;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class C_Transaksi extends Controller
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
        }
        
        $transaksi = M_Transaksi::paginate(5);

        return view('dashboard.admin.d_transaksi.index', compact('transaksi'));
        $search = M_Transaksi::search()->get();
    }

    public function cetak_pdf()
    {
        $transaksi = M_Transaksi::all();

        $pdf = PDF::loadview('transaksi_pdf', ['transaksi' => $transaksi]);
        return $pdf->download('laporan-transaksi-pdf');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table transaksi sesuai pencarian data
        $transaksi = DB::table('transaksi')
            ->where('nama', 'like', "%" . $cari . "%")
            ->OrWhere('id', 'like', "%" . $cari . "%")
            ->paginate();


        // mengirim data transaksi ke view index
        return view('transaksi.index', ['transaksi' => $transaksi]);
    }

    public function pengguna()
    {
        // menangkap data pencarian
        $id = Auth()->user()->id;
        // mengambil data dari table transaksi sesuai pencarian data
        $transaksi = DB::table('t_transaksi')
            ->where('id_customer','=',$id)
            ->paginate();

        // mengirim data transaksi ke view index
        return view('dashboard.admin.d_transaksi.pelanggan', ['transaksi' => $transaksi]);
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

        $customer = M_Customer::all();
        $outlet = M_Outlet::all();
        $transaksi = M_Transaksi::all();
        $petugas = M_Petugas::all();
        $paket = M_Paket::all();

        return view('dashboard.admin.d_transaksi.add', compact('customer', 'petugas', 'transaksi', 'paket', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Transaksi::create([
            'id' => $request->id,
            'id_outlet' => $request->id_outlet,
            'id_customer' => $request->id_customer,
            'id_petugas' => $request->id_petugas,
            'tgl_pesan' => $request->tgl_pesan,
            'tgl_bayar' => $request->tgl_bayar,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
            'total' => $request->total,
        ]);

        M_Detail_Transaksi::create([
            'id_transaksi' => $request->id,
            'id_paket' => $request->id_paket,
            'kuantitas' => $request->kuantitas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/dashboard/pesanan')->with('status', 'Tambah data transaksi berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($transaksi)
    {
        // if (Gate::allows('usir_customer')) {
        //     return redirect('dashboard');
        // } elseif (Gate::allows('usir_petugas')) {
        //     return redirect('dashboard');
        // }
        $transaksi = M_Transaksi::findOrFail($transaksi);

        return view('dashboard.admin.d_transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($transaksi)
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        $transaksi = M_Transaksi::findOrFail($transaksi);

        return view('dashboard.admin.d_transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_Transaksi $transaksi)
    {
        M_Transaksi::where('id', $transaksi->id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tlp' => $request->tlp,
            ]);

        return redirect('/dashboard/transaksi')->with('status', 'Update data transaksi berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Transaksi $transaksi)
    {
        if (Gate::allows('usir_customer')) {
            return redirect('dashboard');
        } elseif (Gate::allows('usir_petugas')) {
            return redirect('dashboard');
        }
        M_Transaksi::destroy($transaksi->id);

        return redirect('/dashboard/transaksi')->with('status', 'Hapus data transaksi berhasil !');
    }
}
