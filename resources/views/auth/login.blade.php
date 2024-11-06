@extends('layouts.header_form')

@section('content')
<div class="container">
    <div class="form-container">
        <div class="form-left">
            <div class="form-title">
                <h1>Sign In</h1>
                <p>Please Sign In to continue</p>
            </div>
            <form action="{{ route('login')}}" method="POST">
                @csrf
                <div class="form-inputs">
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user input-icons"></i>
                        <input type="email" id="email" name="email" class="form-control"  value="{{ old('email') }}" placeholder="Email | Username" required> 
                    </div>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icons"></i>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <i class="fa-regular fa-eye-slash input-icons_password" id="togglePassword"></i>
                    </div>
                </div>
                <div class="form-low">
                    <input type="submit" value="Login" class="form-btn">
                    <div class="form-connections">
                        <p>Or connect with</p>
                        <div class="connections">
                            <img src="https://img.freepik.com/free-icon/google_318-278809.jpg" alt="">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/facebook-3-logo-png-transparent.png" alt="">
                            <img src="https://th.bing.com/th/id/R.1ec11a869384bc5e59625bac39b6a099?rik=1dlGqAp84GWGFw&riu=http%3a%2f%2fpngimg.com%2fuploads%2fapple_logo%2fapple_logo_PNG19692.png&ehk=5ghp5P0aLzQqfUKTsPihTYaIP%2b4VcHGKNovcBq8KOuo%3d&risl=&pid=ImgRaw&r=0" alt="">
                        </div>
                        <p>Don't have an account? <a href="{{route('register')}}">Sign Up</a></p>
                    </div>          
                </div>
                
            </form>
        </div>
        <div class="form-right">
            <img src="../../../img/NewarkConsulting.png" alt="">
        </div>
    </div>
</div>
@endsection
