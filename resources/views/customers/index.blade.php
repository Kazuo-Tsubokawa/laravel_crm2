@extends('layouts.main')

@section('title', '顧客一覧')

@section('content')

    <h1>顧客一覧</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        @foreach ($customers as $customer)
            <tr>
                <th><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></th>
                <th>{{ $customer->name }}</th>
                <th>{{ $customer->email }}</th>
                <th>{{ $customer->zipcode }}</th>
                <th>{{ $customer->address }}</th>
                <th>{{ $customer->telephone }}</th>
            </tr>
        @endforeach
    </table>
    <button onclick="location.href='/customers/zipcode'">新規作成</button>
@endsection
