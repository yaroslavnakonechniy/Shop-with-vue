@extends('layout.admin.main')

@section('content')
<!-- Флеш-повідомлення -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-md-12">
        <h1>Orders</h1>
        
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Імя замовника
                </th>
                <th>
                    Ціна
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->getFullPrice() }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.order.show', $order) }}" method="POST">
                                @csrf
                                <input class="btn btn-success" type="submit" value="Oткрить">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>
    <div>
        {{ $orders->links() }}
    </div>
@endsection