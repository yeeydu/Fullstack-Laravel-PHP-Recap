@extends('master.main')
@section('content')

<div class="container mb-4 mt-4">
    <!--- item list --->
    <h3>@if($user){{$user->name}} this are @endif your products</h3>

    <table class="table mb-4 mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Details</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order amount</td>
                <td>{{ number_format( $total, 2)}} €</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>€ 0</td>
            </tr>
            <tr>
                <td>Delivery</td>
                <td>€ 0</td>
            </tr>
            <tr>
                <td> <strong>Total</strong> </td>
                <td>{{ number_format( $total, 2)}} €</td>
            </tr>
        </tbody>
    </table>


    <form class="mb-4 mt-4" action="/orderplace" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" id="address" required placeholder="Enter address">
            </input>
        </div>
        <div class="form-group">
            <label for="pwd">Payment method:</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="payment" value="card"
                checked>
            <label class="form-check-label" for="exampleRadios1">
                Credit / Debit Card
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment" id="payment" value="paypal">
            <label class="form-check-label" for="exampleRadios2">
                Paypal
            </label>
        </div>

        <button type="submit" class="btn btn-primary mb-4 mt-4">Order now</button>
    </form>

</div>

@endsection
