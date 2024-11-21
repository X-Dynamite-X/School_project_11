<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class SubjectUser extends Model
{
    //
    protected $table = 'subject_users'; // اسم الجدول المرتبط بالنموذج

    protected $fillable = ['mark']; // حقول يمكن تعبئتها

    // إضافة العلاقة بين المستخدمين والمواضيع
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
