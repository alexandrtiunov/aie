<?php

namespace App\Http\Controllers;

use App\Income;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Show the form for creating a new wallet.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWallet()
    {
        return view('wallets.addwalet');
    }

    /**
     * Show the form for creating a new income.
     *
     * @return \Illuminate\Http\Response
     */
    public function createIncome()
    {

        $wallets = Wallet::all();

        return view('wallets.moneyincoming', ['wallets' => $wallets]);
    }

    /**
     * Store a newly created wallet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addWallet()
    {

        $walet = $this->validate(request(), [
            'name' => 'required',
        ]);
        $walet ['user_id'] = Auth::user()->id;

        if (Wallet::create($walet)) {
            return back()->with('success', 'Данные добавлены');
        }
    }

    /**
     * Store a newly created income in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addIncome()
    {

        $income = $this->validate(request(), [
            'sum' => 'required',
            'discription' => 'required',
            'wallet_id' => 'required',
        ]);
        $income ['user_id'] = Auth::user()->id;

        if (Income::create($income)) {
            return back()->with('success', 'Данные добавлены');
        }
        return back()->with('error', 'error');
    }
}
