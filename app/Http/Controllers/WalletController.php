<?php

namespace App\Http\Controllers;

use App\Income;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function createWallet(){

        return view('wallets.addwalet');

    }

    public function store(){

        $wallet = $this->validate(request(), [
            'name' => 'required',
        ]);
        $wallet ['user_id'] = Auth::user()->id;

//        dd($wallet);
        if (Wallet::create($wallet)) {
            return back()->with('success', 'Кошелёк добавлен');
        }
        return back()->with('error', 'error');
    }

    public function createIncome(){

        $wallets = Wallet::all();

        return view('wallets.moneyincoming', ['wallets' => $wallets]);
    }

    public function addWallet(){

        $walet = $this->validate(request(), [
            'name' => 'required',
        ]);
        $walet ['user_id'] = Auth::user()->id;

//        dd($walet);
        if (Wallet::create($walet)) {
            return back()->with('success', 'Данные добавлены');
        }
    }

    public function addIncome(){

        $income = $this->validate(request(), [
            'sum' => 'required',
            'discription' => 'required',
            'wallet_id' => 'required',
        ]);
        $income ['user_id'] = Auth::user()->id;

//        dd($income);
        if (Income::create($income)) {
            return back()->with('success', 'Данные добавлены');
        }
        return back()->with('error', 'error');
    }
}
