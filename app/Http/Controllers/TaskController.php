<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomFieldField;
use App\Http\Requests\FieldRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $project_id, $board_id)
    {
        $custom_field = CustomFieldField::where('categoryid', $board_id)->get();

        return view('task.index', compact('project_id', 'board_id', 'custom_field'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $project_id, $board_id, $field)
    {
        if ($field === 'text') {
            return  view('form.text.create', compact('project_id', 'board_id'));
        } elseif ($field === 'select') {
            return  view('form.select.create', compact('project_id', 'board_id'));
        } elseif ($field === 'radio') {
            return  view('form.radio.create', compact('project_id', 'board_id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($project_id, $board_id, FieldRequest $request)
    {
        if ($request->input('type') == 'text') {
            $configDataJson = $this->FieldText($request);
        } elseif ($request->input('type') == 'select') {
            $configDataJson = $this->FieldSelect($request);
        } elseif ($request->input('type') == 'radio') {
            $configDataJson = $this->FieldRadio($request);
        }
        CustomFieldField::create([
            'shortname' => $request->input('shortname'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'descriptionformat' => $request->input('descriptionformat', 0),
            'sortorder' => $request->input('sortorder', 0),
            'categoryid' => $board_id,
            'configdata' => $configDataJson,
            'timecreated' => now()->timestamp,
            'timemodified' => now()->timestamp,
        ]);
        return redirect()->route('project.board.task.index', [$project_id, $board_id])->with('success',  $request->input('type') . 'Field Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($project_id, $board_id, string $id)
    {
        $customField = CustomFieldField::findOrFail($id);
        if ($customField->type === 'text') {
            return view('form.text.edit', compact('customField', 'project_id', 'board_id'));
        } elseif ($customField->type === 'select') {
            return view('form.select.edit', compact('customField', 'project_id', 'board_id'));
        } elseif ($customField->type === 'radio') {
            return view('form.radio.edit', compact('customField', 'project_id', 'board_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($project_id, $board_id, FieldRequest $request, string $id)
    {
        $customField = CustomFieldField::findOrFail($id);
        if ($request->input('type') == 'text') {
            $configDataJson = $this->FieldText($request);
        } elseif ($request->input('type') == 'select') {
            $configDataJson = $this->FieldSelect($request);
        } elseif ($request->input('type') == 'radio') {
            $configDataJson = $this->FieldRadio($request);
        }

        $customField->update([
            'shortname' => $request->input('shortname'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'descriptionformat' => $request->input('descriptionformat', 0),
            'sortorder' => $request->input('sortorder', 0),
            'configdata' => $configDataJson,
            'timemodified' => now()->timestamp,
        ]);

        return redirect()->route('project.board.task.index', [$project_id, $board_id])->with('success',  $request->input('type') . 'Field Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($project_id, $board_id, $id)
    {
        $field = CustomFieldField::findOrFail($id);
        $field->delete();
        return redirect()->route('project.board.task.index',[$project_id , $board_id])->with('danger',   'Field Deleted Successfully.');
    }
    public function FieldText($request)
    {
        $configData = [
            'required' => $request->input('required', 0),
            'uniquevalues' => $request->input('uniquevalues', 0),
            'locked' => $request->input('locked', 0),
            'visibility' => $request->input('visibility', 0),
            'defaultvalue' => $request->input('default_value', ''),
            'displaysize' => $request->input('form_input_size', 50),
            'maxlength' => $request->input('max_no_of_char', 1333),
            'ispassword' => $request->input('password_field', 0),
            'link' => $request->input('link_field', ''),
        ];
        return  json_encode($configData);
    }
    public function FieldSelect($request)
    {
        $configData = [
            'required' => $request->input('required', 0),
            'uniquevalues' => $request->input('uniquevalues', 0),
            'options' => $request->input('option', ''),
            'defaultvalue' => $request->input('default_value', ''),
            'locked' => $request->input('locked', 0),
            'visibility' => $request->input('visibility', 0),
        ];
        return json_encode($configData);
    }
    public function FieldRadio($request)
    {
        $configData = [
            'required' => $request->input('required', 0),
            'uniquevalues' => $request->input('uniquevalues', 0),
            'options' => $request->input('option', ''),
            'defaultvalue' => $request->input('default_value', ''),
            'locked' => $request->input('locked', 0),
            'visibility' => $request->input('visibility', 0),
        ];
        return json_encode($configData);
    }
}
