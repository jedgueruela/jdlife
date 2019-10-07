<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;

class EntryController extends Controller
{
    /**
     * The validation rules.
     *
     * @var array
     */
    static $rules = [
        'drawings_or_paye' => 'required',
        'is_more_than_three_years' => 'required',
        'years_in_business' => 'required|integer',
        'work_type' => 'required',
        'number_of_staff' => 'required|integer',
        'on_tools' => 'required',
        'other_not_on_tools' => 'required',
        'income' => 'required|integer',
        'payment_frequency' => 'required',
        'acc_cover_plan' => 'required',
        'cover_plus_extra_cover_amount'  => 'required|integer'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::paginate(5);

        return view('entry.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, static::$rules);

        Entry::create($request->input());

        return response()->json(['message' => 'Entry was successfully saved!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Entry::findOrFail($id);

        return view('entry.show', compact('entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);

        return view('entry.edit', compact('entry'));
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
        $this->validate($request, static::$rules);

        Entry::findOrFail($id)->update($request->input());

        return response()->json(['message' => 'Entry was successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entry::findOrFail($id)->delete();

        return redirect()->route('entries.index');
    }
}
