<?php
/**
     * Controller untuk menghubungkan model outlet dengan segala aktifitas website.
     * @author Muhammad Ibadurrahman Al-ahsan  
     * @filesource M_Outlet.php
     * @version Laravel 7.0
     */
namespace App\Http\Controllers;

use App\M_Outlet;
use App\M_Paket;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class C_Outlet extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $outlet = M_Outlet::paginate(5);
        
        return view('dashboard.admin.d_outlet.index', compact('outlet'));
        $search = M_Outlet::search()->get();
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table outlet sesuai pencarian data
		$outlet = DB::table('outlet')
        ->where('nama','like',"%".$cari."%")
        ->OrWhere('id','like',"%".$cari."%")
		->paginate();
        
        
    		// mengirim data outlet ke view index
		return view('outlet.index',['outlet' => $outlet]);
 
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.d_outlet.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Outlet::create($request->all());

        return redirect('/dashboard/admin/outlet')->with('status', 'Tambah data outlet berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show($outlet)
    {   
        $outlet = M_Outlet::findOrFail($outlet);
        
        return view('dashboard.admin.d_outlet.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit($outlet)
    {
        $outlet = M_Outlet::findOrFail($outlet);

        return view('dashboard.admin.d_outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,M_Outlet $outlet)
    {
        M_Outlet::where('id', $outlet->id )
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ]);

        return redirect('/dashboard/admin/outlet')->with('status', 'Update data outlet berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Outlet $outlet)
    {
        M_Outlet::destroy($outlet->id);

        return redirect('/dashboard/admin/outlet')->with('status', 'Hapus data outlet berhasil !');
    }
}
