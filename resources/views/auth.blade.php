@extends('partials.content_auth')
@section('body_content_auth')
<section class="section-account parallax bg-11">
    <div class="awe-overlay"></div>
    <div class="container">
    <div class="login-register">
            <div class="text text-center">
                <h2>LOGIN ACCOUNT</h2>
                <form action="{{ url('/auth')}}" method="POST" class="account_form">
                    @csrf
                    <div class="field-form">
                        <input type="text" class="field-text" name="username" placeholder="User name">
                    </div>
                    <div class="field-form">
                        <input type="password" class="field-text" name="password" placeholder="Password">
                        <span class="view-pass"><i class="lotus-icon-view"></i></span>
                    </div>
                    <div class="field-form field-submit">
                        <button class="awe-btn awe-btn-13" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
