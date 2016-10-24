<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use File;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('statement')->store('statements');
        $contents = explode('^', File::get(storage_path('app/' . $file)));
        $transactionArray = [];

        foreach($contents as $index => $transaction)
        {
            $line = explode("\n", $transaction);

            foreach($line as $part)
            {
                if(starts_with($part, 'D'))
                {
                    $date = explode("/", ltrim($part, 'D'));

                    $transactionArray[$index]['date'] = format_date($date[2], $date[0], $date[1]);
                }
                if(starts_with($part, 'T'))
                {
                    $amount = ltrim($part, 'T');

                    $transactionArray[$index]['amount'] = $amount * 100;
                }
                if(starts_with($part, 'P'))
                {
                    $description = ltrim($part, 'P');

                    $transactionArray[$index]['description'] = $description;
                }
            }

            if (isset($transactionArray[$index]['date'])) {
                $transaction = new Transaction([
                    'date'        => $transactionArray[$index]['date'],
                    'category_id' => 1,
                    'account_id'  => 1,
                    'amount'      => $transactionArray[$index]['amount'],
                    'description' => $transactionArray[$index]['description']
                ]);

                $transaction->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('transactions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
