<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Resources\ContactsListResource;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            return $this->search($request);
        } else {
            return response("Resource not found.\n To list all contacts, use the 'api/contacts/list/<number>?page=1' endpoint.\n Replace <number> with the number of contacts required per page.", 404);
        }
    }

    /**
     * Display a paginated listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paginate($perPage)
    {
        return ContactsListResource::collection(Contact::paginate($perPage));
    }

    /**
     * Search for a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->all()['search'];
        $columns = [
            'contacts.id as contact_id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'contacts.created_at as created_at',
            'contacts.updated_at as updated_at',
            'companies.id as company_id',
            'company_name',
            'company_address'
        ];

        $results = Contact::select($columns)
            ->join('companies', 'companies.id', '=', 'contacts.company_id')
            ->where('first_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('company_name', 'LIKE', "%{$searchTerm}%")
            ->get();

        $content = json_encode(["data" => $results]);

        return response($content)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $data = $request->all();
        $contact = Contact::create($data);

        return new ContactResource($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $data = $request->only(["first_name", "last_name", "email", "phone", "company_id"]);
        $contact->fill($data)->save();

        return new ContactResource($contact);
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
