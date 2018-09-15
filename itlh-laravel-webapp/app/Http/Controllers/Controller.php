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

        $accountFrom = new Account();
        $accountFrom = $accountFrom->where('id',$data['from'])->get();
        $accountFrom = $accountFrom[0];

        if($accountFrom->balance >= $data['amount'])
        {            
            $accountFrom->balance = $accountFrom->balance - $data['amount']; 
            $accountFrom->save();

            $accountTo = new Account();
            $accountTo = $accountTo->where('id',$data['to'])->get();
            $accountTo = $accountTo[0];
            $accountTo->balance = $accountTo->balance + $data['amount'];
            $accountTo->save();

            $transaction = new Transaction();
            $transaction->from = $data['from'];
            $transaction->to = $data['to'];
            $transaction->amount = $data['amount'];
            $transaction->save();

        }
        else
        {
           // $message = ["message" => "insufficent funds, Transaction Cancelled!"];
            return redirect('home');//->with($message);    
        }
        


        return redirect('home');
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


    public function createTransaction()
    {
        $loggedInUser = Auth::user();
        $accounts = $loggedInUser->account;
        $accountArray = $accounts->all();

        $allAccounts = new Account();
        $allAccounts = $allAccounts->all();
        $allAccountsArray=[];
        
        foreach ($allAccounts as $account) {
          array_push($allAccountsArray,$account);
        }

        $notMyAccountsArray = array_diff($allAccountsArray,$accountArray);

        return view('createTransaction')->with('accountArray',$accountArray)
        ->with('notMyAccountsArray',$notMyAccountsArray);
    }


}
