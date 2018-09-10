@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Account</div>

                <div class="card-body">
                    <form method="POST" action="/processAccount">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Account Type</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="type" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Account Balance</label>

                            <div class="col-md-6">
                                <input id="email" type="number" class="form-control" name="balance"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" style="display:none;" class="col-md-4 col-form-label text-md-right">User Id</label>

                            <div class="col-md-6">
                                <input id="password" type="hidden" class="form-control" name="user_id" value={{$userId}} >
                            </div>
                        </div>                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Account
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
