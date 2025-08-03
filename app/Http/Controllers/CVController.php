<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\UpdateCVRequest;
use Illuminate\Support\Str;

class CVController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.rmcvs.index')->with('list', CV::where('user_id', '=', auth()->id())->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rmcvs.form');
    }

    private function formatCVData($inputs): array
    {
        $cvData = [];
        foreach ($inputs as $key => $param)
        {
            if(gettype($param) != "array") {
                $cvData[$key] = $param;
            } else {
                foreach ($param as $value) {
                    if(
                        ($key == 'educations' && empty($value['degree']))
                        || ($key == 'jobs' && empty($value['job_title']))
                        || ($key == 'languages' && empty($value['language']))
                        || ($key == 'skills' && empty($value['skill']))
                        || ($key == 'interests' && empty($value['interest']))
                    )
                        continue;
                    $cvData[$key][] = $value;
                }
            }
        }
        return $cvData;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCVRequest $request)
    {
        $data = $request->except(['_token', 'title']);
        $cvData = $this->formatCVData($data);

        $cvModel = CV::create([
            "user_id" => auth()->id(),
            "title" => $request->title,
            "uuid" => Str::uuid(),
            "lang" => $data['lang'] ?? "en",
            "cv_data" => json_encode($cvData, JSON_UNESCAPED_UNICODE)
        ]);

        return redirect()->route('dashboard.cvs.index')->with('success', 'Done');
    }

    /**
     * Display the specified resource.
     */
    public function show(CV $cV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CV $cv)
    {
        $data = (object)json_decode($cv->cv_data, JSON_UNESCAPED_UNICODE);
        $data = new \App\Utils\CV($data);
        return view('dashboard.rmcvs.form', compact('cv', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCVRequest $request, CV $cv)
    {
        $data = $request->except(['_token', 'title', '_method']);
        $cvData = $this->formatCVData($data);

        $cv->update([
            "title" => $request->title,
            "cv_data" => json_encode($cvData, JSON_UNESCAPED_UNICODE)
        ]);

        return redirect()->route('dashboard.cvs.index')->with('success', 'Done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CV $cV)
    {
        //
    }
}
