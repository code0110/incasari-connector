<?php

namespace Botble\IncasariConnector\Http\Models;

use Botble\ACL\Models\User;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Neomanager extends BaseModel
{
    use HasFactory;
    
    protected $table = 'incasari_neomanager';
    protected $fillable = [
        'id_comanda',
        'nume_client',
        'suma',
    ];
}
