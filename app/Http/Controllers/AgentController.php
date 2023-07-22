<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Models\Agent;
use App\Models\Position;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AgentsExport;



class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Agent List';

         // ELOQUENT
        //  $agents = agent::all();
        confirmDelete();

        return view('agent.index', compact('pageTitle'));

        // RAW SQL QUERY
        // $agents = DB::select('
        //     select *, agents.id as agent_id, positions.name as position_name
        //     from agents
        //     left join positions on agents.position_id = positions.id
        // ');

        //QUERY BUILDER
        // $agents = DB::table('agents')
        // ->select('*', 'agents.id as agent_id')
        // ->leftJoin('positions', 'agents.position_id', '=', 'positions.id')
        // ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Agent';

        // ELOQUENT
        $positions = Position::all();

        return view('agent.create', compact('pageTitle', 'positions'));

        // RAW SQL Query
        // $positions = DB::select('select * from positions');

        //QUERY BUILDER
        // $positions = DB::table('positions')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('cv');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->store('public/files');
        }

        // ELOQUENT
        $agent = New Agent;
        $agent->firstname = $request->firstName;
        $agent->lastname = $request->lastName;
        $agent->email = $request->email;
        $agent->age = $request->age;
        $agent->position_id = $request->position;

        if ($file != null) {
            $agent->original_filename = $originalFilename;
            $agent->encrypted_filename = $encryptedFilename;
        }

        $agent->save();

        Alert::success('Added Successfully', 'Agent Data Added Successfully.');

        return redirect()->route('agents.index');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Agent Detail';

        // ELOQUENT
        $agent = Agent::find($id);

        return view('agent.show', compact('pageTitle', 'agent'));

        // RAW SQL QUERY
        // $agent = collect(DB::select('
        //     select *, agents.id as agent_id, positions.name as position_name
        // from agents
        // left join positions on agents.position_id = positions.id
        // where agents.id = ?
        // ', [$id]))->first();

        //QUERY BUILDER
        // $agent = DB::table('agents')
        // ->select('*', 'agents.id as agent_id', 'positions.name as position_name')
        // ->leftJoin('positions', 'agents.position_id', '=', 'positions.id')
        // ->where('agents.id', $id)
        // ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Agent';

        // ELOQUENT
        $positions = Position::all();
        $agent = Agent::find($id);

        return view('agent.edit', compact('pageTitle', 'agent', 'positions'));

        // $agent = DB::table('agents')->find($id);
        // $positions = DB::select('select * from positions');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Attribute harus diisi',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $agent = Agent::find($id);
        $agent->firstname = $request->firstName;
        $agent->lastname = $request->lastName;
        $agent->email = $request->email;
        $agent->age = $request->age;
        $agent->position_id = $request->position;

        // Cek apakah ada file CV yang diunggah
        if ($request->hasFile('cv')) {
            // Hapus file CV lama jika ada
            if ($agent->encrypted_filename) {
                Storage::disk('public')->delete('files/' . $agent->encrypted_filename);
            }

            // Upload file CV yang baru
            $file = $request->file('cv');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');

            $agent->original_filename = $originalFilename;
            $agent->encrypted_filename = $encryptedFilename;
        }

        $agent->save();

        Alert::success('Changed Successfully', 'Agent Data Changed Successfully.');

        return redirect()->route('agents.index')->with('succes', 'Agent updated succesfully');
    }
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $agent = Agent::find($id);

        // Hapus file CV jika ada
        if ($agent->encrypted_filename) {
            Storage::disk('public')->delete('files/' . $agent->encrypted_filename);
        }

        // Hapus data agent
        $agent->delete();

        Alert::success('Deleted Successfully', 'Agent Data Deleted Successfully.');

        return redirect()->route('agents.index');
    }

    public function downloadFile($agentId)
    {
        $agent = Agent::find($agentId);
        $encryptedFilename = 'public/files/'.$agent->encrypted_filename;
        $downloadFilename = Str::lower($agent->firstname.'_'.$agent->lastname.'_cv.pdf');

        if(Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }

    public function getData(Request $request)
    {
        $agents = Agent::with('position');

        if ($request->ajax()) {
            return datatables()->of($agents)
                ->addIndexColumn()
                ->addColumn('actions', function($agent) {
                    return view('agent.actions', compact('agent'));
                })
                ->toJson();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new AgentsExport, 'agents.xlsx');
    }

    public function exportPdf()
    {
        $agents = Agent::all();

        $pdf = PDF::loadView('agents.export_pdf', compact('agents'));

        return $pdf->download('agents.pdf');
    }

}
