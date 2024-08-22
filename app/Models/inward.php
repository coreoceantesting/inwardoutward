<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class inward extends BaseModel
{
    use HasFactory, SoftDeletes;
        protected $fillable = [
                                'delivery_id', 'letter_id', 'usertype', 'fromwhom', 'ward_id', 'subject',
                                'sendername_designation', 'letter_ref_no', 'recevied_data', 'letter_date',
                                'daily_date', 'file_upload', 'mobile', 'email', 'comments', 'formatted_id'
                            ];

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }
}
