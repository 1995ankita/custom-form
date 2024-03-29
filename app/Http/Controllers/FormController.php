<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomFieldField;
use App\Http\Requests\FieldRequest;


class FormController extends Controller
{
    public function index()
    {
        $custom_field = CustomFieldField::all();
        return view('form.index', compact('custom_field'));
    }
    public function create($field)
    {
        if ($field === 'text') {
            return  view('form.text.create');
        } elseif ($field === 'select') {
            return  view('form.select.create');
        } elseif ($field === 'radio') {
            return  view('form.radio.create');
        }
    }

    public function store(FieldRequest $request)
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
            'categoryid' =>1 ,
            'configdata' => $configDataJson,
            'timecreated' => now()->timestamp,
            'timemodified' => now()->timestamp,
        ]);
        return redirect()->route('form')->with('success',  $request->input('type') . 'Field Created Successfully.');
    }
    public function edit($id)
    {
        $customField = CustomFieldField::findOrFail($id);
        if ($customField->type === 'text') {
            return view('form.text.edit', compact('customField'));
        } elseif ($customField->type === 'select') {
            return view('form.select.edit', compact('customField'));
        } elseif ($customField->type === 'radio') {
            return view('form.radio.edit', compact('customField'));
        }
    }
    public function update(FieldRequest $request, $id)
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

        return redirect()->route('form')->with('success',  $request->input('type') . 'Field Updated Successfully.');
    }
    public function show($id)
    {
        $field = CustomFieldField::findOrFail($id);
        if ($field->type === 'text') {
            return view('form.text.show', compact('field'));
        } elseif ($field->type === 'select') {
            return view('form.select.show', compact('field'));
        }elseif ($field->type === 'radio') {
            return view('form.radio.show', compact('field'));
        }
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
    public function delete($id){
        $field = CustomFieldField::findOrFail($id);
        $field->Delete();
        return redirect()->route('form')->with('danger',   $field->type. 'Field Deleted Successfully.');
    }
}
