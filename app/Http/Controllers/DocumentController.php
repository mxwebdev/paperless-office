<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DocumentController extends Controller
{
    /**
     * Display the inbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        $inboxDocuments = Storage::allFiles('inbox');
        $inboxDocumentsWithMeta = array();

        foreach ($inboxDocuments as $inboxDocument) {
            $fileSize = Storage::size($inboxDocument);

            $fileTime = Storage::lastModified($inboxDocument);
            $fileTimeCarbon = Carbon::createFromTimestamp($fileTime)->toDateTimeString();

            $fileFullName = pathinfo($inboxDocument, PATHINFO_BASENAME);
            $fileName = pathinfo($inboxDocument, PATHINFO_FILENAME);
            $fileExtension = pathinfo($inboxDocument, PATHINFO_EXTENSION);

            $array = array(
                'path' => $inboxDocument,
                'full_name' => $fileFullName,
                'name' => $fileName,
                'extension' => $fileExtension,
                'size' => $fileSize,
                'last_modified' => $fileTimeCarbon
            );

            array_push($inboxDocumentsWithMeta, $array);
        }

        return view('dashboard.documents.inbox', compact('inboxDocumentsWithMeta'));
    }

    /**
     * Archieve the inbox document.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive($inboxDocument, $lastModified)
    {
        // Get available keywords
        $keywords = \App\Keyword::all();

        return view('dashboard.documents.archive', compact('inboxDocument', 'lastModified', 'keywords'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'orgname-input' => 'required|string',
            'name-input' => 'nullable|string|max:255',
            'date-input' => 'required|date',
            'description-input' => 'nullable|string|max:255',
            'keyword-input' => 'required',
        ]);

        // Get file info
        $oldFilePath = env('INBOX_LOCATION') . $validatedData['orgname-input'];
        $fileExtension = pathinfo($validatedData['orgname-input'], PATHINFO_EXTENSION);

        // Create unique filename
        $newFileName = $validatedData['date-input'] . "-" . uniqid() . "." . $fileExtension;
        $newFilePath = env('ARCHIVE_LOCATION') . $newFileName;

        // Move file to archive location
        $newFile = Storage::move($oldFilePath, $newFilePath);

        // Store document in DB
        $document = \App\Document::create([
            'name' => $validatedData['name-input'],
            'date' => $validatedData['date-input'],
            'description' => $validatedData['description-input'],
            'archive' => true,
            'user_id' => auth()->user()->id,
            'path' => $newFilePath
        ]);

        // Store keywords
        $keywords = json_decode($validatedData['keyword-input']);

        foreach ($keywords as $keyword) {

            $keywordInDB = \App\Keyword::where('name', $keyword->value)->first();
            $keywordExists = \App\Keyword::where('name', $keyword->value)->exists();

            if ($keywordInDB) {
                // Attach existing keyword to document
                $keywordInDB->documents()->attach($document);
            } else {
                // Create new keyword
                $newKeyword = \App\Keyword::create([
                    'name' => $keyword->value,
                    //'color' => $validatedData['']
                ]);

                // Attach new keyword to document
                $newKeyword->documents()->attach($document);
            }
        }

        return redirect(route('document.inbox'))->with('msg-success', __('Your document has been archived successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
