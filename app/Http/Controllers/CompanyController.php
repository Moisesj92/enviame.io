<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::select('id','name','rut')->orderBy('id','desc')->get();

        return response()->json($companies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate Request
        $request->validate([
            'name' => 'required|string|unique:companies',
            'rut' => 'required|string|unique:companies',
        ]);

        Company::create([
            'name' => $request->name,
            'rut'  => $request->rut
        ]);

        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        return view('companies.edit', ['company' => $company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //validate Request
        $request->validate([
            'name' => 'required|string',
            'rut' => 'sometimes|string',
        ]);

        $company->name = $request->name;
        $company->rut  = ($request->has('rut') ) ? $request->rut : '';

        $company->save();

        return redirect()->route('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        if($company->delete())
            return response()->json(null); 

    }
}
