<?php

namespace App\Http\Controllers;

use App\Income;
use App\Operation;
use App\Wallet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Faker\Provider\DateTime;

class IndexController extends Controller
{
    /**
     * Show main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $operations = Operation::all();

        $income = Income::sum('sum');
        $expenditure = Operation::sum('value_UAH');
        $total = $income - $expenditure;

        $start = IndexController::date();
        $end = date('Y-m-d');

        return view('index', ['operations' => $operations, 'income' => $income, 'expenditure' => $expenditure,
            'total' => $total, 'start' => $start, 'end' => $end]);
    }

    /**
     * Choosing a gap in the calendar
     */
    public function store(Request $request)
    {

        $date = $this->validate(request(), [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $start = $date['start_date'];
        $end = $date['end_date'];

        $income = Income::whereBetween('created_at', [new Carbon($start), new Carbon($end)])->sum('sum');

        $operations = Operation::whereBetween('created_at', [new Carbon($start), new Carbon($end)])->get();

        if ($start > $end) {
            return back()->with('error', 'Начальная дата, не должна привышать конечную');
        } else {
            $expenditure = Operation::whereBetween('created_at', [new Carbon($start), new Carbon($end)])->sum('value_UAH');
        }

        $total = $income - $expenditure;

        return view('index', ['operations' => $operations, 'income' => $income, 'expenditure' => $expenditure, 'total' => $total, 'start' => $start, 'end' => $end]);

    }

    /**
     * Takes 30 days from the current date
     *
     * @return string
     */
    public function date()
    {

        $date = date("Y-m-d");

        $date = strtotime($date . "-30 days");

        $date = date('Y-m-d', $date);

        return $date;
    }
}
