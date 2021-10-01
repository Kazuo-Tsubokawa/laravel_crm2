@extends('layouts.main')

@section('title', '郵便番号検索画面')
@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="/customers/create" method="GET">
        @csrf

        <label for="zipcode">郵便番号検索</label>

        <input type="text" name="zipcode" placeholder="検索したい郵便番号">
        <input type="submit" value="検索">

    </form>
    <button onclick="location.href='/customers'">一覧へ戻る</button>
@endsection
