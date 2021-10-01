@extends('layouts.main')

@section('title', '顧客詳細画面')
@section('content')
    <h1>顧客詳細画面</h1>
    <div class="container">
        <table border="1">
            <tr>
                <th>顧客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </tr>
            <tr>
                <th>{{ $customer->id }}</th>
                <th>{{ $customer->name }}</th>
                <th>{{ $customer->email }}</th>
                <th>{{ $customer->zipcode }}</th>
                <th>{{ $customer->address }}</th>
                <th>{{ $customer->telephone }}</th>
            </tr>
        </table>

        <button onclick="location.href='/customers/{{ $customer->id }}/edit'">編集画面</button>

        <form action="/customers/{{ $customer->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('本当に削除しますか？')){return false};">
        </form>

        <button onclick="location.href='/customers'">一覧へ戻る</button>
    </div>
@endsection
