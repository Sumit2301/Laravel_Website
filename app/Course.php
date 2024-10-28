<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	public $table = 'courses';
    protected $fillable = ["name", "approval", "description", "exam", "seats", "mode", "total_fees", "fee_details", "eligibility_criteria", "duration", "brochure", "offer_by","college_id","url","featured"];
}
