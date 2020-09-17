<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;
 
class PdfController extends Controller
{
    public function download()
    {
        $start = request()->start;
        $end = request()->end;
  
        Browsershot::url(config('app.url').'/reports/view-pdf/'.$start.'/'.$end)
            ->setIncludePath('$PATH:/usr/local/bin')
            // ->setNodeBinary('/usr/local/bin/node')
            // ->setNpmBinary('/usr/local/bin/npm')
            ->savePdf('reports/'.$start.'-'.$end.'-report.pdf');

        return response()->streamDownload(function () use($start, $end){
            echo file_get_contents(public_path('reports/'.$start.'-'.$end.'-report.pdf'));
        }, $start.'-'.$end.'-report.pdf', ['Content-Type' => 'application/pdf']);
    }
    
    public function viewPDF($start, $end)
    {
        $tasks = Task::where('done', true)
            ->whereBetween('done_at', [$start ,$end])
            ->with('assignedUser', 'project')->get();

        return view('download-report')
                ->with('start', $start)
                ->with('end', $end)
                ->with('tasks', $tasks);
    }
}
