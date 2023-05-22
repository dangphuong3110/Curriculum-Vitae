@extends('login/layout')
@section('content')
<div class="wrapper">

    <div class="form-box verify">
        <h2>Verify</h2>
        <form action="{{ route('verify-code') }}" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" name="verification-code" id="verifyCode" required autofocus>
                <label for="verification-code">Verify Code</label>
                @if($message = Session::get('failure'))

                    <span role="alert" style="color: red; font-size: 12px;">
                        <br>
                        <strong>{{ $message }}</strong>
                    </span>

                @endif
            </div>
            <button type="submit" class="btn">Confirm</button>
        </form>
    </div>
</div>
@endsection
