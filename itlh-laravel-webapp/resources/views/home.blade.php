@extends('layouts.app')

@section('content')

<!-- @if (Session::has('message'))
<script type = "text/javascript">
alert({{Session::get('message')}});
</script>
@endif -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        
                            <tr>
                                <th>Account id</th>
                                <th>Account Type</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($accountsArray as $account)
                            
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->type }}</td>
                                <td>{{ $account->balance }}</td>
                            </tr> 
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
