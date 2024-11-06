@extends('layouts.header')

@section('content')
<!-- <div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h2 class="text-center">Perfil</h2>
    <span>{{ session('message') }}</span>
    @if ($user != null)
        <form action="{{route('updateUser' , [$user->id])}}" method="POST" class="w-50">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" placeholder = "{{$user->name}}" required>
                @error('name') <span>{{$message}}</span> @enderror
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"  value="{{$user->email}}" placeholder = "{{$user->email}}"required>
                @error('email') <span>{{$message}}</span> @enderror
            </div>
        
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" id="password" name="password" value="{{$user->password}}" placeholder = "{{$user->password}}" class="form-control">
                @error('password') <span>{{$message}}</span> @enderror
            </div>
        
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>
        <form action="{{route('deleteUser' , [$user->id])}}" method="POST" class="w-50">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Excluir">
        </form>
    @endif
</div> -->
<div class="container">
    <div class="settings-container">
        <div class="sidebar">
            <div class="sidebar">
                <div class="sidebar-menu">
                    <h2>MENU</h2>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-compass"></i>Explore Topics</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-solid fa-tag"></i>Tags</p>
                </div>
                <div class="sidebar-personalnav">
                    <h2>PERSONAL NAVIGATOR</h2>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-circle-question"></i>My Questions</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-comments"></i>My Answers</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-thumbs-up"></i>My Likes</p>
                </div>
                <div class="sidebar-premium">

                </div>
            </div>
        </div>
        <div class="content">
            <h1>Public Profile</h1>
            <div class="settings-content">
                <div class="left">
                    <form action="{{route('updateUser', [$user->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="{{ $user->name }}" value="{{ $user->name }}" required>
                        @error('name') <span>{{ $message }}</span> @enderror

                        <label for="email">Public Email</label>
                        <input type="text" name="email" id="email" placeholder="{{ $user->email}}" value="{{ $user->email}}" required>
                        @error('email') <span>{{ $message }}</span> @enderror

                        <label for="senha">Senha</label>
                        <input type="password" name="password" id="password" placeholder="{{ $user->password}}" value="{{ $user->password}}" required>
                        @error('password') <span>{{ $message }}</span> @enderror

                        <label for="">Bio</label>
                        <input type="text" placeholder="Tell us a little bit about yourself">

                        <label for="">Pronouns</label>
                        <select name="" id="">
                            <option value="She/her">She/her</option>
                            <option value="He/Him">He Him</option>
                        </select>
                        <input type="submit" value="Edit" class="profile-btn edit">
                        </form>
                        <div class="btns">
                        <form action="{{ route('deleteUser', [$user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="profile-btn delete" value="Delete">
                    </form>
                        </div>
                    
                </div>
                <div class="right">
                    <p>Profile Picture</p>
                    <div class="user-wrapper">
                        <div class="user"></div>
                        <div class="edit">
                            <i class="fa-solid fa-pen"></i>
                            <p>Edit</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection
