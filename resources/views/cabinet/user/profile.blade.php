@extends('cabinet.layouts.app')


@section('content')
    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Консоль</a>
        </li>
        <li class="breadcrumb-item active">Профиль</li>
    </ol>
    <!-- Breadcrumbs end -->

    <form action="{{route('cabinet:user.update')}}" method="post" class="form">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                   placeholder="Адрес электронной почты">
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Никнейм</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                   placeholder="Ваш никнейм на сайте">
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
            <label for="full_name">Ф.И.О.</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->full_name}}"
                   placeholder="Введите Ваше полное имя">
            @if ($errors->has('full_name'))
                <p class="text-danger">{{ $errors->first('full_name') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                   placeholder="Контактный номер телефона">
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>

        <div class="form-group{{ $errors->has('skype') ? ' has-error' : '' }}">
            <label for="skype">Skype</label>
            <input type="text" class="form-control" id="skype" name="skype" value="{{$user->skype}}"
                   placeholder="Ваш никнейм в Skype">
            @if ($errors->has('skype'))
                <p class="text-danger">{{ $errors->first('skype') }}</p>
            @endif
        </div>

        <div class="form-group">
            <p>Реферальный ключ: <span class="badge badge-dark">{{Auth::user()->referer_key}}</span></p>
        </div>

        @if ($user->parent_id)
            <div class="form-group">
                <p>Patron: {{$user->getParent()->name}}</p>
            </div>
        @endif

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <a href="#" class="btn btn-link">Изменить пароль</a>
        </div>

        <div class="form-group mt-5">
            <div class="alert alert-light">
                *Мы не передаем Вашу персональную информацию третьим лицам.
            </div>
        </div>

    </form>
@endsection
