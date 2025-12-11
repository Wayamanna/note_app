<?php

namespace App\Http\Controllers;
use App\Models\SubNote;

use Illuminate\Http\Request;

class SubNoteController extends Controller
{
    /**
     * GET /notes
     * Return all notes
     */
    public function index()
    {
         return SubNote::all();

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
           'title' => 'required|string|max:255',
           'note_id'=> 'required|integer',
          ]);
          
        // Create new note
        $subNote  = SubNote::create($data);
        return response()->json($subNote , 201);

    }

    /**
      * GET /notes/{id}
     * Show one note
     */
    public function show(string $id)
    {
        return SubNote::findOrFail($id);
    }

    /**
     * PUT/PATCH /notes/{id}
     * Update a note
     */
    public function update(Request $request, string $id)
    {
         $subNote  = SubNote::findOrFail($id);
         $data = $request->validate ([
           'title'=> 'sometimes|string|max:255',
            'note_id'=> 'required|integer',
        ]);
          
         $subNote->update($data);
        return response()->json($subNote );
    }

    /**
      * DELETE /notes/{id}
      * Delete a note
     */
    public function destroy(string $id)
    {
        $subNote  = SubNote::findOrFail($id);
        $subNote ->delete();
        return response()->json(['message' => 'SubNote deleted successfully']);

    }
}
