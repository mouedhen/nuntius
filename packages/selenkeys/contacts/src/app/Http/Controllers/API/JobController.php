<?php
/**
 * JobController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Selenkeys\Contacts\App\Http\Resources\Jobs\JobResource;
use Selenkeys\Contacts\App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return new ResourceCollection(Job::all());
    }

    public function show($id)
    {
        return new JobResource(Job::findOrFail($id));
    }
}