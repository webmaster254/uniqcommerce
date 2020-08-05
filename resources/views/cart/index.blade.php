@extends('layouts.app')

@section('content')
<h2>Your Products</h2>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>

    @foreach ($cartItems as $item)
    <tbody>
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
            <td>
                <form action="{{route('cart.update',$item->id)}}">
                <input name="quantity" type="number" value="{{$item->quantity}}">
                <input type="submit" value="save">
                <td>
                </form>
            </td>
            <td>

                    <a href="{{route('cart.destroy',$item->id)}}">Delete</a>
                </td>
        </tr>

        @endforeach

    </tbody>
</table>

<h3>
    Total Price:$ {{\Cart::session(auth()->id())->getTotal()}};
</h3>
<a name="id" class="btn btn-primary" href="" role="button">Proceed to checkout</a>

@endsection
