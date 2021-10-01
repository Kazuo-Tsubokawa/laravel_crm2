@extends('layouts.main')

@section('title', '編集画面')
@section('content')
    <h1>編集画面</h1>
    <form action="/customers/{{ $customer->id }}" method="POST">
        @csrf
        @method('PATCH')
        <p>
            <label for="name">名前</label>
            <input type="text" name="name" value="{{ old('name', $customer->name) }}">
        </p>
        <p>
            <label for="email">メールドレス</label>
            <input type="text" name="email" value="{{ old('email', $customer->email) }}">
        </p>
        <p>
            <label for="zipcode">郵便番号</label>
            <input type="text" name="zipcode" value="{{ old('zipcode', $customer->zipcode) }}">
        </p>
        <p>
            <label for="address">住所</label>
            <textarea name="address" id="address" cols="30" rows="10">{{ old('address', $customer->address) }}</textarea>
        </p>
        <p>
            <label for="telephone">電話番号</label>
            <input type="text" name="telephone" value="{{ old('telephone', $customer->telephone) }}">
        </p>
        <input type="submit" value="更新">
    </form>
    <button onclick="location.href='/customers'">一覧に戻る</button>
@endsection
