<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::get();
        return view('transactions', compact('transactions'));
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->name = $request->name;
        $transaction->email = $request->email;
        $transaction->address = $request->address;
        $transaction->city = $request->city;
        $transaction->token = $request->token;
        $transaction->save();
        return redirect()->route('index');
    }

    public function matchtoken(Request $request)
    {
        $details = $request->token;
        // $decrypt= Crypt::decryptString($details);
        // log::info('decrypt me kyaa rha hai'.$decrypt);

        
        log::info('request token me kya aa rha hai' . $details);
        $detail = Transaction::where('token',$details)->first();
        log::info('isme aa rha hai'. $details);
        if ($detail->token) {
            log::info('User found');
        } else {
            log::info('got in else condition');
        }

    }

    public function get_by_id($id)
    {
        $amit = Transaction::find($id);
        return view('transactions',compact('amit'));
    }

}
