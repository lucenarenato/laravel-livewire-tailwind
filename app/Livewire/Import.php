<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Livewire\WithFileUploads;

class Import extends Component
{
    use WithFileUploads;

    public $fileHasHeader = true;
    public $csv_file;
    public $csv_data = [];
    public $db_fields = [];
    public $csv_header_cols = [];
    public $match_fields;
    public $data;
    public $failed = [];
    public $imported = false;

    public function rules()
    {
        return ['csv_file' => 'required|file'];
    }

    // public function render()
    // {
    //     return view('livewire.contacts.import');
    // }

    function parseFile()
    {
        $cols = Schema::getColumnListing('contacts');

        $this->db_fields = array_diff($cols, ['id', 'user_id', 'photo', 'team_id', 'starred', 'pinned', 'created_at', 'updated_at', 'deleted_at']);
        array_unshift($this->db_fields,'Skip');

        $path = $this->csv_file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $this->data = $data;

        if (count($data) > 0) {

            $this->csv_header_cols = [];

            if ($this->fileHasHeader) {
                foreach ($data[0] as $key => $value) {
                    $this->csv_header_cols[] = $key;
                }
                $this->csv_data = array_slice($data, 0, 2);
            } else {
                $this->csv_data = array_slice($data, 0, 1);
            }
        } else {
            $this->emit('error', 'No data found in your file');
        }
        $this->match_fields = [];
    }

    function processImport()
    {
        if (empty($this->match_fields) || count($this->match_fields) < count($this->csv_header_cols)) {
            $this->emit('error', __("All columns must be matched"));
            return;
        }

        $errors = [];

        foreach ($this->data as $key => $row) {
            if ($this->fileHasHeader && $key == 0) continue;
            $contact = new Contact();
            if (empty($this->csv_header_cols)) {
                foreach ($this->match_fields as $k => $mf) {
                    $this->csv_header_cols[$mf] = $k;
                }
            }

            foreach ($this->csv_header_cols as $header_col) {

                $field = $this->match_fields[$header_col]??null;
                if(is_null($field)) continue;

                $value = $row[$header_col];
                if ($field == "Skip") continue;
                if ($field == 'email' || $field == 'phone' || $field == 'address' || $field == 'website') {
                    $value = json_encode([[
                        $field  => $value,
                        'label' => 'home'
                    ]]);
                }
                if ($field == 'birthday') {
                    try {
                        $value = Carbon::parse($value)->format('Y-m-d');
                    } catch (\Exception $e) {
                        $value = null;
                    }
                }
                if (empty($field)) continue; //skip headings

                $contact->$field = $value;
            }
            try {
                $contact->user_id = auth()->id();
                $contact->team_id = auth()->user()->currentTeam->id;
                $contact->save();
            } catch (\Exception $e) {
                $errors[] = $row;
                return;
            }
        }
        if (empty($errors)) {

            $this->csv_file = null;
            $this->csv_data = [];
            $this->db_fields = [];
            $this->csv_header_cols = [];
            $this->match_fields = null;
            $this->data = null;
            $this->failed = [];
            $this->imported = true;
            $this->emit('success', __('Contacts imported'));
            $this->emit('confetti');
        } else {
            $this->failed = $errors;
            $this->emit('error', 'Error saving some records');
        }
    }

    public function render()
    {
        return view('livewire.import')->layout('layouts.app-livewire');
    }
}
