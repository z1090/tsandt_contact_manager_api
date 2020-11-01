<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactAtCompanyRequest;
use App\Http\Requests\MultipleContactsAtCompanyRequest;
use App\Http\Resources\ContactsListResource;
use App\Http\Resources\ContactResource;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsAtCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return ContactsListResource::collection($company->contacts);
    }

    /**
     * Store a newly created contact in storage at a specified company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactAtCompanyRequest $request, Company $company)
    {
        $contact = new Contact($request->all());
        $company->contacts()->save($contact);

        return new ContactResource($contact);
    }

    /**
     * Store many newly created contacts in storage at a specified company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMany(MultipleContactsAtCompanyRequest $request, Company $company)
    {
        $data = $request->all()['contacts'];

        foreach($data as $key => $value) {
            $contact = new Contact($value);
            $data[$key] = $company->contacts()->save($contact);
        }

        return ContactResource::collection($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
