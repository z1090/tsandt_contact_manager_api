# Contact Manager App

A Contact Manager API application, created with Laravel for Tshirt&Sons Remote Technical Challenge.
Thanks for taking the time to review my work!

## Project Setup

The project is using [Sanctum](https://laravel.com/docs/8.x/sanctum) for authentication.

After your initial setup, please run the database seeders using
```
php artisan db:seed
```

As well as seeding the Companies, Contacts and Notes tables with test data, this will also create **two test users** and generate an authentication token for each user.

The tokens will be written to the console after the seeding has completed. Please make a note of these.

Test User 1 has Read and Write abilities.

Test User 2 only has Read abilities.

Not essential, but to receive nicer 403 responses (just the error message), please go to your `.env` file and change the `APP_DEBUG` setting to `false`.

### Postman
There is a Postman Collection in the `postman` folder of the `root` of the project; please import this.

There are three subfolders, each with the same 12 endpoints.

Please right click and edit the two **'Test User'** subfolders, select **'Authorization'** then pick **'Bearer Token'** from the dropdown, copy and paste the new tokens from the terminal into the field on the right.

All Requests in **'Test User 1'** should now work, all the GET requests in **'Test User 2'**, and only the 'Read all companies' request should work in the **'No Auth'** subfolder.

---

# Endpoints
**Please ensure that an `Accept: application/json` header has been set for all requests.**


## Companies Routes

### 1. Read all companies
Will return an array of all companies in the database. The list includes only the company ids and names.
Note that no authorization is required for this route as the data isn't particularly sensitive (but mainly for demonstration purposes!).

**Path Params required:** NONE.

**Request Type:** `GET`

**Route:** `/api/companies`


#### Example Request:
```
http://localhost:8000/api/companies
```
#### Example Response:
```JSON
{
    "data": [
        {
            "id": 1,
            "company_name": "Mita"
        },
        {
            "id": 2,
            "company_name": "Browsebug"
        },
        {
            "id": 3,
            "company_name": "Tazzy"
        },
        {
            "id": 4,
            "company_name": "Blogspan"
        }
    ]
}
```
---

### 2. Read a single company
Will return an object with information about a single, specified company, including the company id, name and address.

**Path Params required:** `company_id`(integer)

**Request Type:** `GET`

**Route:** `/api/companies/<company_id>`


#### Example Request:
```
http://localhost:8000/api/companies/1
```
#### Example Response:
```JSON
{
    "data": {
        "id": 1,
        "company_name": "Mita",
        "company_address": "87 Kipling Center"
    }
}
```

---

## Contacts at a Company Routes

### 3. Read all contacts at a given company
Will return an array of all the contacts associated with a specified company. The information for each contact includes:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address

**Path Params required:** `company_id`(integer)

**Request Type:** `GET`

**Route:** `/api/companies/<company_id>/contacts`

#### Example Request:
```
http://localhost:8000/api/companies/1/contacts
```
#### Example Response:
```JSON
{
    "data": [
        {
            "contact_id": 3,
            "first_name": "Clive",
            "last_name": "Petruskevich",
            "email": "cpetruskevich2@mita.com",
            "phone": "01610030782",
            "company": {
                "company_id": 1,
                "company_name": "Mita",
                "company_address": "87 Kipling Center"
            }
        },
        {
            "contact_id": 4,
            "first_name": "Kim",
            "last_name": "Lyndon",
            "email": "klyndon3@mita.com",
            "phone": "01610779901",
            "company": {
                "company_id": 1,
                "company_name": "Mita",
                "company_address": "87 Kipling Center"
            }
        }
    ]
}
```
---

### 4. Create a single contact at a given company
Creates a single contact from a supplied JSON object. The following fields should be supplied:
- **first_name:** [required, string, max: 50 characters]
- **last_name:** [required, string, max: 50 characters]
- **email:** [required, must be unique, must be a valid email address, max: 50 characters]
- **phone:** [required, string, max: 15 characters] (note that the phone number does not have to be unique)

Returns a data object with the following information:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address
- notes (will be an empty array)


**Path Params required:** `company_id`(integer)

**Request Type:** `POST`

**Route** `/api/companies/<company_id>/contact`


#### Example Request:
```
http://localhost:8000/api/companies/1/contact
```
#### Example Request Body:
```JSON
{
    "first_name": "John",
    "last_name": "Smith",
    "email": "john.smith@gmail.com",
    "phone": "01234567890"
}
```


#### Example Response:
```JSON
{
    "data": {
        "contact_id": 21,
        "first_name": "John",
        "last_name": "Smith",
        "email": "john.smith@gmail.com",
        "phone": "01234567890",
        "company": {
            "company_id": 1,
            "company_name": "Mita",
            "company_address": "87 Kipling Center"
        },
        "notes": []
    }
}
```
---


### 5. Create multiple contacts at a given company
Creates multiple contacts from a supplied JSON array named **`"contacts"`**. Each entry in the array should be an object where the following fields should be supplied:
- **first_name:** [required, string, max: 50 characters]
- **last_name:** [required, string, max: 50 characters]
- **email:** [required, must be unique, must be a valid email address, max: 50 characters]
- **phone:** [required, string, max: 15 characters] (note that the phone number does not have to be unique)

Returns a data array where each entry is an object containing the following information:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address
- notes (will be an empty array)

**Path Params required:** `company_id`(integer)

**Request Type:** `POST`

**Route** `/api/companies/<company_id>/contacts`


#### Example Request:
```
http://localhost:8000/api/companies/1/contacts
```
#### Example Request Body:
```JSON
{
    "contacts": [
        {
            "first_name": "Jon",
            "last_name": "Doe",
            "email": "jon.doe@gmail.com",
            "phone": "01234567890"
        },
        {
            "first_name": "Jane",
            "last_name": "Doe",
            "email": "jane.doe@hotmail.com",
            "phone": "01234567890"
        }
    ]
}
```
#### Example Response:
```JSON
{
    "data": [
        {
            "contact_id": 22,
            "first_name": "Jon",
            "last_name": "Doe",
            "email": "jon.doe@gmail.com",
            "phone": "01234567890",
            "company": {
                "company_id": 1,
                "company_name": "Mita",
                "company_address": "87 Kipling Center"
            },
            "notes": []
        },
        {
            "contact_id": 23,
            "first_name": "Jane",
            "last_name": "Doe",
            "email": "jane.doe@hotmail.com",
            "phone": "01234567890",
            "company": {
                "company_id": 1,
                "company_name": "Mita",
                "company_address": "87 Kipling Center"
            },
            "notes": []
        }
    ]
}
```
---

## Contacts Routes

### 6. Create a single contact
Creates a single contact from a supplied JSON object. The following fields should be supplied:
- **first_name:** [required, string, max: 50 characters]
- **last_name:** [required, string, max: 50 characters]
- **email:** [required, must be unique, must be a valid email address, max: 50 characters]
- **phone:** [required, string, max: 15 characters] (note that the phone number does not have to be unique)
- **company_id:** [required, integer, must be an existing company id]

Returns a data object with the following information:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address
- notes (will be an empty array)


**Path Params required:** NONE

**Request Type:** `POST`

**Route** `/api/contacts`


#### Example Request:
```
http://localhost:8000/api/contacts
```
#### Example Request Body:
```JSON
{
    "first_name": "Sally",
    "last_name": "Jones",
    "email": "sally.jones@gmail.com",
    "phone": "01234567890",
    "company_id": 3
}
```


#### Example Response:
```JSON
{
    "data": {
        "contact_id": 24,
        "first_name": "Sally",
        "last_name": "Jones",
        "email": "sally.jones@gmail.com",
        "phone": "01234567890",
        "company": {
            "company_id": 3,
            "company_name": "Tazzy",
            "company_address": "86269 Garrison Lane"
        },
        "notes": []
    }
}
```
---

### 7. Read a single contact
Will return a data object with the following information about a single, specified contact:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address
- notes (array)
  - id
  - note_text
  - contact_id
  - created_at
  - updated_at

**Path Params required:** `contact_id`(integer)

**Request Type:** `GET`

**Route:** `/api/contacts/<contact_id>`


#### Example Request:
```
http://localhost:8000/api/contacts/1
```
#### Example Response:
```JSON
{
    "data": {
        "contact_id": 1,
        "first_name": "Nadia",
        "last_name": "Issatt",
        "email": "nissatt0@browsebug.co.uk",
        "phone": "01225340164",
        "company": {
            "company_id": 2,
            "company_name": "Browsebug",
            "company_address": "69 Forster Place"
        },
        "notes": [
            {
                "id": 7,
                "note_text": "Robust reciprocal success",
                "contact_id": 1,
                "created_at": "2020-10-31T17:31:34.000000Z",
                "updated_at": "2020-10-31T17:31:34.000000Z"
            }
        ]
    }
}
```
---

## 8. Update a single contact
Creates a single contact from a supplied JSON object. Any of the following fields may be updated but none are required :
- **first_name:** [string, max: 50 characters]
- **last_name:** [string, max: 50 characters]
- **email:** [must be unique, must be a valid email address, max: 50 characters]
- **phone:** [string, max: 15 characters] (note that the phone number does not have to be unique)
- **company_id:** [integer, must be an existing company id]

Returns a data object with the following information:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address
- notes (array)
  - id
  - note_text
  - contact_id
  - created_at
  - updated_at


**Path Params required:** `contact_id`(integer)

**Request Type:** `PUT`

**Route:** `/api/contacts/<contact_id>`


#### Example Request:
```
http://localhost:8000/api/contacts/1
```
#### Example Request Body:
```JSON
{
    "first_name": "Ian",
    "last_name": "Wildsmith"
}
```


#### Example Response:
```JSON
{
    "data": {
        "contact_id": 1,
        "first_name": "Ian",
        "last_name": "Wildsmith",
        "email": "nissatt0@browsebug.co.uk",
        "phone": "01225340164",
        "company": {
            "company_id": 2,
            "company_name": "Browsebug",
            "company_address": "69 Forster Place"
        },
        "notes": [
            {
                "id": 7,
                "note_text": "Robust reciprocal success",
                "contact_id": 1,
                "created_at": "2020-10-31T17:31:34.000000Z",
                "updated_at": "2020-10-31T17:31:34.000000Z"
            }
        ]
    }
}
```
---

## 9. Read Paginated Contacts
Will return a data array where each object in will include the information for each contact:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address

Other metadata will also be included, alongside the data array.

If the 'page' query string isn't included, the first page of results will be returned.

**Path Params required:** `contacts_per_page`(integer)

**Query Params:** `page_number`(integer)

**Request Type:** `GET`

**Route:** `/api/contacts/list/<contacts_per_page>?page=<page_number>`

#### Example Request:
```
http://localhost:8000/api/contacts/list/3?page=2
```
#### Example Response:
```JSON
{
    "data": [
        {
            "contact_id": 4,
            "first_name": "Kim",
            "last_name": "Lyndon",
            "email": "klyndon3@mita.com",
            "phone": "01610779901",
            "company": {
                "company_id": 1,
                "company_name": "Mita",
                "company_address": "87 Kipling Center"
            }
        },
        {
            "contact_id": 5,
            "first_name": "Dee",
            "last_name": "Element",
            "email": "delement4@blogspan.org",
            "phone": "01249159682",
            "company": {
                "company_id": 4,
                "company_name": "Blogspan",
                "company_address": "44966 Green Ridge Court"
            }
        },
        {
            "contact_id": 6,
            "first_name": "Robert",
            "last_name": "Warrior",
            "email": "rwarrior5@browsebug.co.uk",
            "phone": "01225977981",
            "company": {
                "company_id": 2,
                "company_name": "Browsebug",
                "company_address": "69 Forster Place"
            }
        }
    ],
    "links": {
        "first": "http://localhost:8000/api/contacts/list/3?page=1",
        "last": "http://localhost:8000/api/contacts/list/3?page=10",
        "prev": "http://localhost:8000/api/contacts/list/3?page=1",
        "next": "http://localhost:8000/api/contacts/list/3?page=3"
    },
    "meta": {
        "current_page": 2,
        "from": 4,
        "last_page": 10,
        "links": [
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=1",
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=1",
                "label": 1,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=2",
                "label": 2,
                "active": true
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=3",
                "label": 3,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=4",
                "label": 4,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=5",
                "label": 5,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=6",
                "label": 6,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=7",
                "label": 7,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=8",
                "label": 8,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=9",
                "label": 9,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=10",
                "label": 10,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/contacts/list/3?page=3",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/contacts/list/3",
        "per_page": "3",
        "to": 6,
        "total": 28
    }
}
```
---

## 10. Search for a contact by name or company
Returns a data array where each entry is a contact that somehow matches the search query string. Part of the **first_name**, **last_name** or **company_name** will be a match. Each object in the array will have the following information:
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name
- company_address

**Query Params required:** `search_term`(string)

**Request Type:** `GET`

**Route:** `/api/contacts?search=<search_term>`

#### Example Request:
```
http://localhost:8000/api/contacts?search=Kim
```
#### Example Response:
```JSON
{
    "data": [
        {
            "contact_id": 4,
            "first_name": "Kim",
            "last_name": "Lyndon",
            "email": "klyndon3@mita.com",
            "phone": "01610779901",
            "company_id": 1,
            "company_name": "Mita",
            "company_address": "87 Kipling Center"
        },
        {
            "contact_id": 8,
            "first_name": "Kim",
            "last_name": "Somerbell",
            "email": "ksomerbell7@browsebug.co.uk",
            "phone": "01225135649",
            "company_id": 2,
            "company_name": "Browsebug",
            "company_address": "69 Forster Place"
        }
    ]
}
```
---

## Notes Routes

### 11. Create a single note for a contact
Creates a single note from a supplied JSON object. Only the following field should be supplied:
- **note_text:** [required, string]

Returns a data object with the following information:
- note_id
- note_text
- created_at
- updated_at
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name


**Path Params required:** `contact_id`(integer)

**Request Type:** `POST`

**Route** `/api/contacts/<contact_id>/note`


#### Example Request:
```
http://localhost:8000/api/contacts/2/note
```
#### Example Request Body:
```JSON
{
    "note_text": "I am a new note"
}
```


#### Example Response:
```JSON
{
    "data": {
        "note_id": 61,
        "note_text": "I am a new note",
        "created_at": "2020-11-01T02:07:40.000000Z",
        "updated_at": "2020-11-01T02:07:40.000000Z",
        "contact": {
            "contact_id": 2,
            "first_name": "Bertie",
            "last_name": "Evered",
            "email": "bevered1@tazzy.com",
            "phone": "01380440743",
            "company_id": 3,
            "company_name": "Tazzy"
        }
    }
}
```
---

### 12. Create multiple notes for a contact
Creates multiple notes from a supplied JSON array named **`"notes"`**. Only the following field should be supplied to each object in the array:
- **note_text:** [required, string]

Returns a data array with the following information for each object in the array:
- note_id
- note_text
- created_at
- updated_at
- contact_id
- first_name
- last_name
- email
- phone
- company_id
- company_name


**Path Params required:** `contact_id`(integer)

**Request Type:** `POST`

**Route** `/api/contacts/<contact_id>/notes`


#### Example Request:
```
http://localhost:8000/api/contacts/3/notes
```
#### Example Request Body:
```JSON
{
    "notes": [
        {
            "note_text": "I am yet another note."
        },
        {
           "note_text": "This is the second note."
        },
        {
           "note_text": "I am the third note."
        }
    ]
}
```


#### Example Response:
```JSON
{
    "data": [
        {
            "note_id": 62,
            "note_text": "I am yet another note.",
            "created_at": "2020-11-01T02:23:37.000000Z",
            "updated_at": "2020-11-01T02:23:37.000000Z",
            "contact": {
                "contact_id": 3,
                "first_name": "Clive",
                "last_name": "Petruskevich",
                "email": "cpetruskevich2@mita.com",
                "phone": "01610030782",
                "company_id": 1,
                "company_name": "Mita"
            }
        },
        {
            "note_id": 63,
            "note_text": "This is the second note.",
            "created_at": "2020-11-01T02:23:37.000000Z",
            "updated_at": "2020-11-01T02:23:37.000000Z",
            "contact": {
                "contact_id": 3,
                "first_name": "Clive",
                "last_name": "Petruskevich",
                "email": "cpetruskevich2@mita.com",
                "phone": "01610030782",
                "company_id": 1,
                "company_name": "Mita"
            }
        },
        {
            "note_id": 64,
            "note_text": "I am the third note.",
            "created_at": "2020-11-01T02:23:37.000000Z",
            "updated_at": "2020-11-01T02:23:37.000000Z",
            "contact": {
                "contact_id": 3,
                "first_name": "Clive",
                "last_name": "Petruskevich",
                "email": "cpetruskevich2@mita.com",
                "phone": "01610030782",
                "company_id": 1,
                "company_name": "Mita"
            }
        }
    ]
}
```
