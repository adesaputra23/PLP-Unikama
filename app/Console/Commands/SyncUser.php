<?php

namespace App\Console\Commands;

use App\Mahasiswa;
use App\User;
use App\UserRole;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SyncUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronisasi data user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $list_mahasiswa = Mahasiswa::all();
        foreach ($list_mahasiswa as $key => $value) {
            $user = User::where('nik', $value->npm)->first();
            $user_role = UserRole::where('nik', $value->npm)->where('role', 5)->first();

            // membuat user mahasiswa baru
            if (!$user) {
                $NewUser = new User();
                $NewUser->nik          = $value->npm;
                $NewUser->password     = Hash::make($value->npm);
                $NewUser->created_at   = date('Y-m-d H:i:s');
                $NewUser->updated_at   = date('Y-m-d H:i:s');
                $NewUser->save();
                echo $this->info('Berhasil membuat User dengan NPM : '.$value->npm);
            }

            // membuat role/level user mahasiswa baru
            if (!$user_role) {
                $newrole       = new UserRole();
                $newrole->nik  = $value->npm;
                $newrole->role = 5;
                $newrole->save();
                echo $this->info('Berhasil membuat Role User dengan NPM: '.$value->npm);
            }
        }
    }
}
