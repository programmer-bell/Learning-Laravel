<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'image_path', 'github_url', 'live_url'])]
class Project extends Model
{
    //
}
