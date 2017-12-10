<?php
/**
 * Employee.php
 * Project: nuntius
 */

namespace Selenkeys\Contacts\App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Selenkeys\Contacts\App\Models\Contact $contact
 * @property \Selenkeys\Contacts\App\Models\Job $job
 * @property \Selenkeys\Contacts\App\Models\Department $department
 * @property \Selenkeys\Contacts\App\Models\Company $company
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['contact_id', 'job_id', 'department_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}