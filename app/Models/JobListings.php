<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListings extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_name',
        'location',
        'tags',
        'email',
        'website',
        'job_id',
        'name_of_team',
    ];

    //filter job listings by tag, location, description, and title
    public function scopeFilter($query, array $filters): void
    {

        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('company_name', 'like', '%' . request('search') . '%');
        }
    }

}
