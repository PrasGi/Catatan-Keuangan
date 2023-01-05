<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecapController extends Controller
{
    public function all()
    {
        $users = DB::table('users')
            ->join('pemasukans', 'users.id', '=', 'pemasukans.user_id')
            ->join('pengeluarans', 'users.id', '=', 'pengeluarans.user_id')
            ->get();

        return $users;

    }

    public function show(User $user){
        $users = DB::table('users')->where('users.id', '=', $user->id)
            ->join('pemasukans', 'users.id', '=', 'pemasukans.user_id')
            ->join('pengeluarans', 'users.id', '=', 'pengeluarans.user_id')
            ->get();

        return $users;
    }
}
