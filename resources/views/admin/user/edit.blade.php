@extends('admin.layout')

@section('title')
   Ubah User
@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Ubah User</h2>
                        
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">                  
                        {{-- <a href="#" class="btn btn-secondary btn-round">Ubah Tentang Kami</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                            
                                <form method="POST" action="{{ route('user.update',$user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <!-- Name -->
                                    <div class="form-group">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                            
                                    <!-- Email Address -->
                                    <div   class="form-group">
                                        <x-input-label for="username" value="Username" />
                                        <x-text-input id="username" class="form-control" type="text" name="username" value="{{$user->username}}"  required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select class="form-control" name="role">
                                            <option value="blogguru" {{$user->role=='blogguru'? ' selected':''}}>Blog Guru</option>
                                            <option value="admin" {{$user->role=='admin'? ' selected':''}}>Admin</option>
                                           
                                            
                                        </select>
                                    </div>
                            
                                    <!-- Password -->
                                    <div   class="form-group">
                                        <x-input-label for="password" :value="__('Password')" />
                            
                                        <x-text-input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                          autocomplete="new-password" />
                            
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                            
                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            
                                        <x-text-input id="password_confirmation" class="form-control"
                                                        type="password"
                                                        name="password_confirmation"   autocomplete="new-password" />
                            
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                            
                                    <div class="flex items-center justify-end mt-4">
                                    
                                        <x-primary-button class="ms-4 btn btn-primary">
                                          Ubah
                                        </x-primary-button>
                                        <a href="{{route('user.index')}}" class="btn btn-link" >Batal</a>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </div>
    </div>
@endsection

 