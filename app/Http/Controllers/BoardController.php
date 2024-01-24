<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Http\Requests\BoardRequest;
use App\Models\CustomFieldField;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $boards = Board::all();
        return view('board.index', compact('id','boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('board.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, boardRequest $request)
    {
        $board = Board::create([
            'board' => $request->board,
            'project_id' => $id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fields = CustomFieldField::where('categoryid', $id)->get();
        return view('board.show', compact('fields'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
