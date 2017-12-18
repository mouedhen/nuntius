<?php
/**
 * EmployeeController.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Selenkeys\Contacts\App\Http\Resources\Employees\EmployeeResource;
use Selenkeys\Contacts\App\Http\Resources\Employees\EmployeeResourceForCollection;
use Selenkeys\Contacts\App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeResourceForCollection::collection(Employee::all());
    }

    public function show($id)
    {
        return new EmployeeResource(Employee::findOrFail($id));
    }
}