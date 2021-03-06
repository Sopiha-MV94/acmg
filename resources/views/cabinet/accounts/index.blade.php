@extends('cabinet.layouts.app')


@section('content')

    <!-- Breadcrumbs begin -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('cabinet:dashboard')}}">Консоль</a>
        </li>
        <li class="breadcrumb-item active">
            Аккаунты
        </li>
    </ol>
    <!-- Breadcrumbs end -->

    <section class="mb-3 border-bottom">
        <header class="mb-4">
            <h1>Мои аккаунты</h1>
        </header>

        <!-- Form begin -->
        <form action="{{route('cabinet:accounts.create')}}" method="POST" class="form-inline mb-3 align-items-start">
            {!! csrf_field() !!}
            <div class="form-group mr-3 mb-2 {{ $errors->has('profile_id') ? 'has-error' : '' }}">
                <label for="profile_id" class="sr-only">Profile ID</label>
                <div>
                    <input type="text" class="form-control" id="profile_id" name="profile_id" value="{{old('profile_id')}}"
                           placeholder="ID вашего аккаунта" required>
                    @if ($errors->has('profile_id'))
                        <p class="text-danger">{{ $errors->first('profile_id') }}</p>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Добавить</button>
        </form>
        <p class="text-muted">Если Вы не знаете как получить ID Вашего аккаунта в Facebook воспользуйтесь этим <a
                    href="https://findmyfbid.com/" target="_blank">сервисом</a></p>
        <!-- Form end -->

        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col" class="text-center">Доступ</th>
                <th scope="col">Статус</th>
                <th scope="col" class="text-right">Настройки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>
                        <a href="https://www.facebook.com/profile.php?id={{$account->profile_id}}" target="_blank">
                            {{$account->profile_id}}
                        </a>
                    </td>
                    <td class="text-center">
                        <span class="text-{{ ($account->viewer_id != '' && $account->viewer_pass != '') ? "success" : "secondary" }}">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-primary">{{config('accounts.statuses_ru')[$account->status]}}</span>
                    </td>
                    <td style="text-align: right;">
                        <a class="btn btn-link" href="{{route('cabinet:accounts.edit', $account->id)}}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </section>

    <p class="text-secondary">*TV - Team Viewer</p>

@endsection
