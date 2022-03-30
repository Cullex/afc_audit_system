<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Record;
use App\Review;

class Recordcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::latest()->paginate(10);
        return api()->data('records',$records)->build();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $records = new Record;

        $request->validate([

             'ir_no'  => ['required'],
             'date_received'  => ['required', 'before:date_occurred'],
             'dueDate' => ['required', 'after:tomorrow'],
             'date_occurred'  => ['required', 'before:date_received'],
             'informant'  => ['required'],
             'offence'  => ['required'],
             'accussed' => ['required'],
             'brief'  => ['required'],
             'currency'  => ['required'],
             'case_position'  => ['required'],
             'loss_type'  => ['required'],
             'officer'  => ['required'],
             'value'  => ['required'],
             'zwlEquivalent'  => ['required'],
             'bank_rate'  => ['required']
        ]);

        $records = new Record();
        $records-> ir_no = $request->ir_no;
        $records->dueDate = $request->dueDate;
        $records-> date_received = $request->date_received;
        $records-> date_occurred = $request->date_occurred;
        $records-> informant = $request->informant;
        $records-> offence = $request->offence;
        $records-> accussed = $request->accussed;
        $records-> brief = $request->brief;
        $records-> currency = $request->currency;
        $records-> case_position = $request->case_position;
        $records-> loss_type = $request->loss_type;
        $records-> officer = $request->officer;
        $records-> value = $request->value;
        $records-> zwlEquivalent = $request->zwlEquivalent;
        $records-> bank_rate = $request->bank_rate;
        $records->save();
        return api()->data('records',$records)->build();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $record = Record::findorfail($id);
        return api()->data('record', $record)->build();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
                $record = Record::findorfail($id);
                return api()->data('record', $record)->build();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([

            'ir_no'  => 'required',
            'date_received'  => 'required',
            'date_occurred'  => 'required',
            'informant'  => 'required',
            'offence'  => 'required',
            'accussed' => 'required',
            'brief'  => 'required',
            'currency'  => 'required',
            'case_position'  => 'required',
            'loss_type'  => 'required',
            'officer'  => 'required',
            'value'  => 'required',
            'zwlEquivalent'  => 'required',
            'bank_rate'  => 'required'
        ]);

        $records = Record::findorFail($request->id);
        $records-> ir_no = $request->ir_no;
        $records-> date_received = $request->date_received;
        $records-> date_occurred = $request->date_occurred;
        $records-> informant = $request->informant;
        $records-> offence = $request->offence;
        $records-> accussed = $request->accussed;
        $records-> brief = $request->brief;
        $records-> currency = $request->currency;
        $records-> case_position = $request->case_position;
        $records-> loss_type = $request->loss_type;
        $records-> officer = $request->officer;
        $records-> value = $request->value;
        $records-> zwlEquivalent = $request->zwlEquivalent;
        $records-> bank_rate = $request->bank_rate;
        $records->save();
        return api()->data('records',$records)->build();
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
