@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make Transaction</div>

                <div class="card-body">
                    <form method="POST" action="/processTransaction">
                        @csrf

                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">From Account Number</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="from" required autofocus>
                            </div>
                        </div> -->

                        
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right" for="exampleFormControlSelect1">From Account</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="from">
                                @foreach ($accountArray as $account)
                                    <option>{{$account->id}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">To Account Number</label>

                            <div class="col-md-6">
                                <input id="email" type="number" class="form-control" name="to"  required>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right" for="exampleFormControlSelect2">To Account</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect2" name="to">
                                @foreach ($notMyAccountsArray as $NotMyaccount)
                                    <option>{{$NotMyaccount->id}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Amount</label>

                            <div class="col-md-6">
                                <input id="password" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Transfer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
