@extends('layouts.Master-Layout')

@section('title')Enable 2FA @endsection

@section('body')


<div>
    <h1>Enable Two-Factor Authentication</h1>

    <p>Scan the QR code below with Google Authenticator or any other TOTP app:</p>

    <img src="{{ $imageDataUri }}" alt="QR Code" />

    <p>Or, you can manually enter the key: <strong>{{ $secret }}</strong></p>

    <form action="{{ route('two-factor.verify') }}" method="POST">
        @csrf
        <label for="one_time_password">Enter Code from App:</label>
        <input type="text" name="one_time_password" required>

        <button type="submit">Verify</button>
    </form>
</div>

@endsection

@section('scripts')

@endsection
