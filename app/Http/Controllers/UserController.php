<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * GET /notes
     * Return all notes
     */
    public function index()
    {
        return User::all();

    }

   
    /**
     * POST /notes
     * Create a new note
     */

    public function store(Request $request)
    {
          // Validate input
        $data = $request->validate
        ([
           'name'     => 'required|string|max:255',
           'email'    => 'required|email|unique:users,email',
           'password' => 'required|string|min:6',
        ]);
             // Create new note
              $user = User::create($data);
              return response()->json($user, 201);

    }

    /**
     * GET /notes/{id}
     * Show one note
     */
    public function show(string $id)
    {
        return User::findOrFail($id);

    }

    /**
     * PUT/PATCH /notes/{id}
     * Update a note
     */
    public function update(Request $request, string $id)
    {
            $user = User::findOrFail($id);
              $data = $request->validate
              ([
                 'name'     => 'sometimes|string|max:255',
                 'email'    => 'sometimes|email|unique:users,email,' . $user->id,
                 'password' => 'sometimes|nullable|string|min:8',
              ]);
               $user->update($data);
               return response()->json($user);


    }

    /**
     * DELETE /notes/{id}
     * Delete a note
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'user deleted successfully']);

    }
}
