<?php
/**
     * Controller untuk menghubungkan model paket/i dengan segala aktifitas website.
     * @author Muhammad Ibadurrahman Al-ahsan  
     * @filesource M_Paket.php
     * @version Laravel 7.0
     */
namespace App\Http\Controllers;

use App\M_Paket;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class C_Paket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $paket = M_Paket::paginate(5);
        
        return view('dashboard.admin.d_paket.index', compact('paket'));
        $search = M_Paket::search()->get();
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table paket sesuai pencarian data
		$paket = DB::table('paket')
        ->where('nama','like',"%".$cari."%")
        ->OrWhere('id','like',"%".$cari."%")
		->paginate();
        
        
    		// mengirim data paket ke view index
		return view('paket.index',['paket' => $paket]);
 
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.d_paket.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Paket::create($request->all());

        return redirect('/dashboard/admin/paket')->with('status', 'Tambah data paket berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $paket
     * @return \Illuminate\Http\Response
     */
    public function show($paket)
    {   
        $paket = M_Paket::findOrFail($paket);

        return view('dashboard.admin.d_paket.show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($paket)
    {
        $paket = M_Paket::findOrFail($paket);

        return view('dashboard.admin.d_paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,M_Paket $paket)
    {
        M_Paket::where('id', $paket->id )
        ->update([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);

        return redirect('/dashboard/admin/paket')->with('status', 'Update data paket berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Paket $paket)
    {
        M_Paket::destroy($paket->id);

        return redirect('/dashboard/admin/paket')->with('status', 'Hapus data paket berhasil !');
    }
}
