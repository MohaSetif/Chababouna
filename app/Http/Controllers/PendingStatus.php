<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chababounauser;

class PendingStatus extends Controller
{
    public function changeStatus(Chababounauser $chababounauser, Request $req)
    {
    if ($req->submit == "accepted") {
        $chababounauser->update(['status' => 'مقبول']);

        return redirect('chababounausers.index')->with('success', 'تم قبول مستخدم جديد');
    } elseif ($req->submit == "rejected"){
        $chababounauser->update(['status' => 'مرفوض']);

        return redirect('chababounausers.index')->with('success', 'تم رفض مستخدم جديد');
    }
    }  
}
