<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteAbandonedCVs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-abandoned-cvs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete abandoned cvs pdfs every day to free storage!';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pdfDirectory = "cvs";
        $picsDirectory = "cv/pictures";
        $pdfs = Storage::allFiles($pdfDirectory);
        $pics = Storage::allFiles($picsDirectory);
        Storage::delete($pdfs);
        Storage::delete($pics);
        $this->info("All abandoned files deleted!");
    }
}
