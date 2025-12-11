<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
       /**
     * GET /notes
     * Return all notes
     */

    public function index()
    {
             return Comment::all();

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
               'note_id'=>'required|integer',
               'user_id' => 'required|integer',
               'content'=>  'required|string|max:255',
             ]);
                    // Create new note
            $comment = Comment::create($data);
             return response()->json($comment, 201);

    }

    /**
     * GET /notes/{id}
     * Show one note

     */
    public function show(string $id)
    {
         return Comment::findOrFail($id);

    }

    /**
      * PUT/PATCH /notes/{id}
     * Update a note
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        $data = $request->validate([

             'note_id' => 'integer',
             'user_id' => 'integer',
             'content' => 'sometimes|string|max:255',
        ]);
               $comment->update($data);

        return response()->json($comment);

    }

    /**
      * DELETE /notes/{id}
     * Delete a note

     */
    public function destroy(string $id)
    {
           $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);

    }
}
