<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function postInsertVoucher(Request $req)
    {
        $this->validate(
            $req,
            [
                'voucher_code' => 'required',
                'condition_price' => 'required',
                'price_sale' => 'required'
            ]
        );

        $v = new Voucher();
        //dd($req->input());
        $v->voucher_code = $req->voucher_code;
        $v->condition_price = $req->condition_price;
        $v->price_sale = $req->price_sale;
        $v->status = 1;

        $v->save();
        return redirect('ad_voucherpage');
    }

    public function getEditVoucher(Request $req)
    {
        $voucher_edit = Voucher::where('id_voucher', $req->id_voucher)->first();
        return view('adminpage.ad_vouchereditpage', compact('voucher_edit'));
    }

    public function postUpdateVoucher(Request $req)
    {
        $voucher = [
            'voucher_code' => $req->voucher_code,
            'condition_price' => $req->condition_price,
            'price_sale' => $req->price_sale
        ];
        Voucher::where('id_voucher', $req->id_voucher)->update($voucher);
        return redirect('ad_voucherpage');
    }

    public function getDeleteVoucher($id_voucher)
    {
        $v = Voucher::findOrFail($id_voucher);
        $v->delete();
        return redirect('ad_voucherpage');
    }
}
