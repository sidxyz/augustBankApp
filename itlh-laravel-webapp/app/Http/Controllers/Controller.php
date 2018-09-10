<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Account;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function processAccount(Request $data)
    {
        $data = $data->all();
        
        $account = new Account();
        $account->type = $data['type'];
        $account->balance = $data['balance'];
        $account->user_id = $data['user_id'];
        $account->save();

        dd("added successfully");

    }

    public function processTransaction(Request $data)
    {
        $data = $data->all();
        
        $transaction = new Transaction();
        $transaction->from = $data['from'];
        $transaction->to = $data['to'];
        $transaction->amount = $data['amount'];
        $transaction->save();

        dd("added successfully");
    }

    public function showAllAccounts()
    {
        // $user = new User();
        // $someUserArray = $user->where('id',1)->get();
        // $siddarth = $someUserArray[0];
        // dd($siddarth->account);

        $account = new Account();
        $someaccountArray = $account->where('id',1)->get();
        $who = $someaccountArray[0];
        dd($who->user->name);
        //dd($siddarth->account);


        // $account = new Account();
        // $allAccounts = $account->all();
        // for($i=0;$i<count($allAccounts);$i++)
        // {
        //     echo nl2br($allAccounts[$i]->type);
        //     echo nl2br($allAccounts[$i]->id);
        //     echo nl2br($allAccounts[$i]->balance);
        //     echo nl2br($allAccounts[$i]->user_id)."\n";

        // }

    }

    public function showUsers()
    {
        $loggedInUser = Auth::user();

        if($loggedInUser->type=="admin")
        {
            //dd("test");
            $user = new User();
            $userArray = $user->all();
            return view('showUsers')->with('userArray',$userArray);
        }
        else
        {
            //dd("test");
            return redirect('home');
        }
        
    }

    public function addAccount($userId)
    {
        return view('addAccount')->with('userId',$userId);
    }
}
