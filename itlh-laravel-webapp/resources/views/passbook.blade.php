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
                <div class="card-header">Passbook</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        
                            <tr>
                                <th>Account From</th>
                                <th>Account To</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transactionArray as $transaction)
                            
                            <tr>
                                <td>{{ $transaction->from }}</td>
                                <td>{{ $transaction->to }}</td>
                                <td>{{ $transaction->amount }}</td>
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
