<?php
/**
     * Controller untuk menghubungkan model customer/i dengan segala aktifitas website.
     * @author Muhammad Ibadurrahman Al-ahsan  
     * @filesource M_Customer.php
     * @version Laravel 7.0
     */
namespace App\Http\Controllers;

use App\M_Customer;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class C_Customer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customer = M_Customer::paginate(5);
        
        return view('dashboard.admin.d_customer.index', compact('customer'));
        $search = M_Customer::search()->get();
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table customer sesuai pencarian data
		$customer = DB::table('customer')
        ->where('nama','like',"%".$cari."%")
        ->OrWhere('id','like',"%".$cari."%")
		->paginate();
        
        
    		// mengirim data customer ke view index
		return view('customer.index',['customer' => $customer]);
 
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.d_customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        M_Customer::create($request->all());

        return redirect('/dashboard/admin/customer')->with('status', 'Tambah data customer berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {   
        $customer = M_Customer::findOrFail($customer);

        return view('dashboard.admin.d_customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        $customer = M_Customer::findOrFail($customer);

        return view('dashboard.admin.d_customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,M_Customer $customer)
    {
        M_Customer::where('id', $customer->id )
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);

        return redirect('/dashboard/admin/customer')->with('status', 'Update data customer berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Customer $customer)
    {
        M_Customer::destroy($customer->nis);

        return redirect('/customer');
    }
}
