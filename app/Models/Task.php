<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';

    protected $guarded = ['id'];

    public function isDeplay()
    {
        $deadline = Carbon::parse($this->deadline_at);
        if ($deadline->lt(Carbon::parse($this->finished_at)) || !empty($this->finished_at)){
            return true;
        }
        return  false;
    }
}
