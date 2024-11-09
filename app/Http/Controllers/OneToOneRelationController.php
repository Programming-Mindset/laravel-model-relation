<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OneToOneRelationController extends Controller

{
    public function insert()
    {
        // Creating a user
        $user = User::create([
            'name' => 'Programmingmindset',
            'email' => 'test@gmail.com',
            'password' => Hash::make(12345678),
        ]);

        $bankAccount = new BankAccount([
            'bank_name' => 'ABC Bank',
            'account_name' => 'Programmingmindset.com',
            'account_number' => '12444444444560',
            'account_type' => 'checking',
        ]);

        $user->profile()->save($bankAccount);
    }

    public function getUserData()
    {
        // Creating a user
        $user = User::find(10);
        $userBankAccount = $user->bank_account;
    }
}
