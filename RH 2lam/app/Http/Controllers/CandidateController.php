<?php

namespace App\Http\Controllers;
use Smalot\PdfParser\Parser;
use OpenAI;
use TCPDF;
use Spatie\PdfToText\Pdf;

use Illuminate\Support\Facades\Storage;
use App\Models\candidates;
use App\Models\Schedule;
use App\Models\jobs;
use App\Models\interviews;
use App\Models\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = candidates::all();
        $jobs=jobs::all();
        $interviews=interviews::all();
        $status=null;
        return view('admin.candidates', compact('candidates','jobs','status','interviews'));
    }
    public function updateStatus(Request $request,$id)
    {
        $candidate=candidates::where('id', $id)->first();

        $jobId = $candidate->JobId;
        $job = jobs::where('id', $jobId)->first();
        $candidate->status = $request->status;
        $candidate->save();

        if ($candidate->status === 'validated') {

            Employee::create([
                'name' => $candidate->name,
                'position'=>$job->name,
                'email' => $candidate->email,
                'pin_code' =>bcrypt('123456789'),
            ]);

        }
        flash()->success('Success','Employee Record has been created successfully !');
        return redirect()->back()->with('success', 'Candidate status updated successfully.');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'age' => 'nullable|integer',
        'file' => 'required|file',
        'job_id' => 'required|exists:jobs,id',
    ]);
    $file = $request->file('file');
    $filename = $file->getClientOriginalName();

    $directory = 'public/pdf_files';
    if (!Storage::exists($directory)) {
        Storage::makeDirectory($directory);
    }

    $file->storeAs($directory, $filename);
    $filePath = storage_path('app/' . $directory . '/' . $filename);

    try {
        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $pages = $pdf->getPages();
        $extractedText = '';

        foreach ($pages as $page) {
            $extractedText .= $page->getText() . PHP_EOL;
        }

        // Perform further processing on the extracted text
        // ...
        $lines = explode("\n", $extractedText);
        $lineCount = count($lines);
        $requiredWords = ['Informations Personnelles', 'Formation', 'Expérience Professionnelle', 'Compétences'];
        $missingWords = [];

        foreach ($requiredWords as $word) {
            if (strpos($extractedText, $word) === false) {
                $missingWords[] = $word;
            }
        }

        if (!empty($missingWords)) {
            $missingWordsString = implode(', ', $missingWords);
            flash()->error('Error', "Invalid CV file. The following required words are missing: $missingWordsString");
            return redirect()->back()->with('error', "Invalid CV file. The following required words are missing: $missingWordsString");
        }

        if ($lineCount < 15) {
            flash()->error('Error', "Invalid CV file. Fill your CV with the right information, please.");
            return redirect()->back()->with('error', "Fill your CV with the right information, please.");
        }

    } catch (\Exception $e) {
        // Handle any exceptions that occur during the PDF processing
        flash()->error('Error', "An error occurred while processing the CV file.");
        return redirect()->back()->with('error', "An error occurred while processing the CV file.");
    }

   $candidate = candidates::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'age' => $validatedData['age'],
        'cv_file' => $filename,
        'JobId' => $validatedData['job_id'],
        'status' => 'pending',
    ]);
    flash()->success('Success','Candidat Record has been created successfully !');
    return redirect()->back()->with('success', 'Candidate status updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function show(candidates $candidates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function edit(candidates $candidates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'nullable|integer',
            'file' => 'nullable|file',
            'job_id' => 'required|exists:jobs,id',
        ]);

        $candidate = candidates::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();

            $directory = 'public/pdf_files';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            $file->storeAs($directory, $filename);


        }
        $candidate->cv_file = $filename;
        $candidate->name = $validatedData['name'];
        $candidate->email = $validatedData['email'];
        $candidate->age = $validatedData['age'];
        $candidate->JobId = $validatedData['job_id'];
        $candidate->status = 'pending';

        $candidate->save();

        flash()->success('Success', 'Candidate Record has been updated successfully!');
        return redirect()->back()->with('success', 'Candidate record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function destroy(candidates $candidate)
    {
        $candidate->delete();
        flash()->success('Success','Candidate Record has been Deleted successfully !');
        return redirect()->back()->with('success');
    }
    public function interview(Request $request)
{
    $interviewId = $request->input('id');
    $candidateId = $request->input('candidate_id');
    $jobId = $request->input('job_id');

    $interview = interviews::findOrFail($interviewId);

    $interview->candidat_id = $candidateId;
    $interview->post_id = $jobId;
    $interview->save();


    flash()->success('Success', 'Candidate Record has been updated successfully!');


    return redirect()->back()->with('success', 'Candidate record updated successfully.');

}

}
