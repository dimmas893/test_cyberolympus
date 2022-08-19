<?php

namespace App\Http\Controllers;

use App\User;
use App\order_detail;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = DB::table('users')
                ->join('customer', 'customer.id', '=', 'users.id')
                ->where('account_type', '4')
                ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <td>
                                    <a href="' . route('customor-edit', $item->id) . '" class="btn btn-primary"> edit</a>
                    </td>
                              ';
                })
                ->editColumn('photo', function ($item) {
                    return $item->photo ? '<img src="' . asset('/storage/' . $item->photo) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }

        return view('home');
    }

    public function welcome()
    {
        $agent = DB::table('users')
            ->join('orders', 'orders.agent_id', '=', 'users.id')
            ->where('users.account_role', '=', 'agent')->paginate(3);

        $pro = DB::table('order_detail')
            ->leftjoin('product', 'order_detail.product_id', '=', 'product.id')
            ->select(
                'order_detail.product_id as id_product',
                'product.product_name as nama_product',

                DB::raw('COUNT(product_id) as total')
            )

            //->where('product.id', 'order_detail.product_id')
            ->groupBy('order_detail.product_id', 'product.product_name')
            ->limit(10)
            ->orderBy('total', 'desc')
            ->get();

        $customor = DB::table('orders')
            ->leftjoin('users', 'orders.customer_id', '=', 'users.id')
            ->select(
                'orders.customer_id as id_customor',
                'users.first_name as nama_customor',

                DB::raw('COUNT(customer_id) as total')
            )

            ->where('account_type', '4')
            ->groupBy('orders.customer_id', 'users.first_name')
            ->limit(10)
            ->orderBy('total', 'desc')
            ->get();

        $agent = DB::table('orders')
            ->leftjoin('users', 'orders.customer_id', '=', 'users.id')
            ->select(
                'orders.customer_id as id_customor',
                'users.first_name as nama_customor',

                DB::raw('COUNT(customer_id) as total')
            )

            ->where('account_type', '3')
            ->groupBy('orders.customer_id', 'users.first_name')
            // ->limit(10)
            ->orderBy('total', 'desc')
            ->get();


        $data = array(
            'pro' => $pro,
            'customor' => $customor,
            'products' => order_detail::with('product')->paginate(10),
            'agent' => $agent
        );
        return view('welcome', $data);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'pin' => 'required|integer',
            'phone' => 'required|integer',
            'alamat' => 'required',
        ]);

        $data = $request->all();

        $data['photo'] = $request->file('photo')->store('assets/users', 'public');
        $data['account_role'] = 'customer';
        $data['account_type'] = '4';

        User::create($data);

        return redirect()->route('home')->with('success', 'Berhasil Menambah Produk');
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('customer.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {

        $item = User::FindOrFail($id);

        if ($request->file('photo')) {

            Storage::delete('public/' . $item->photo);
            $file = $request->file('photo')->store('assets/Users', 'public');
            $item->photo = $file;
        }

        $item->first_name = $request->first_name;
        $item->last_name = $request->last_name;
        $item->email = $request->email;
        $item->pin = $request->pin;
        $item->phone = $request->phone;
        $item->alamat = $request->alamat;


        $item->save();

        return redirect()->route('home')->with('success', 'Berhasil mengubah Produk');
    }

    public function delete($id)
    {
        $item = User::findorFail($id);
        $item->delete();

        return redirect()->route('home')->with('success', 'Berhasil Mengahapus Produk');
    }

    public function show()
    {

        return view('customer.show');
    }
}
