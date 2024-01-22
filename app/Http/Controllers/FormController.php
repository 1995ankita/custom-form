<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomFieldField;
use App\Http\Requests\TextFieldRequest;

class FormController extends Controller
{
    public function index()
    {
        $custom_field = CustomFieldField::all();
        return view('form.index', compact('custom_field'));
    }
    public function create($field)
    {
        if ($field == 1) {
            return  view('form.createtext');
        }
    }
    public function store(TextFieldRequest $request)
    {
        $configData = [
            'required' => $request->input('required', 0),
            'uniquevalues' => $request->input('uniquevalues', 0),
            'locked' => $request->input('locked', 0),
            'visibility' => $request->input('visibility', 0),
            'defaultvalue' => $request->input('defaultvalue', ''),
            'displaysize' => $request->input('displaysize', 50),
            'maxlength' => $request->input('maxlength', 1333),
            'ispassword' => $request->input('ispassword', 0),
            'link' => $request->input('link_field', ''),
            'locked' => $request->input('locked', '0')
        ];

        $configDataJson = json_encode($configData);

        CustomFieldField::create([
            'shortname' => $request->input('shortname'),
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'descriptionformat' => $request->input('descriptionformat', 0),
            'sortorder' => $request->input('sortorder', 0),
            'categoryid' => 1,
            'configdata' => $configDataJson,
            'timecreated' => now()->timestamp,
            'timemodified' => now()->timestamp,
        ]);
        return redirect()->route('form')->with('success', 'TextField Created Successfully.');
    }
    public function edit($id)
    {
        $customField = CustomFieldField::findOrFail($id);
        return view('form.edittext', compact('customField'));
    }
    public function update(TextFieldRequest $request, $id)
    {
        $customField = CustomFieldField::findOrFail($id);

        $configData = [
            'required' => $request->input('required', 0),
            'uniquevalues' => $request->input('uniquevalues', 0),
            'locked' => $request->input('locked', 0),
            'visibility' => $request->input('visibility', 2),
            'defaultvalue' => $request->input('defaultvalue', ''),
            'displaysize' => $request->input('displaysize', 50),
            'maxlength' => $request->input('maxlength', 1333),
            'ispassword' => $request->input('ispassword', 0),
        ];

        $configDataJson = json_encode($configData);

        // Update the existing custom field with the new data
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

        return redirect()->route('form')->with('success', 'TextField Updated Successfully.');
    }
    public function show($id)
    {
        $field = CustomFieldField::findOrFail($id);

        return view('form.showtext', compact('field'));
    }
}
