<x-auth-layout title="Авторизация">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">
                <h1 class="display-4 text-center mb-3">Авторизация</h1>
                @if(session('message'))
                    <h5>{{ session('message') }}</h5>
                @endif

                <p class="text-muted text-center">Доступ к панели управления.</p>

                <form action="{{ route('admin.login') }}" method="POST" class="needs-validation mb-4" accept-charset="UTF-8" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="emailInput">Логин</label>
                        <input type="text" name="email" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="emailInput" placeholder="Ведите" required value="{{ old('email')}}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="passwordInput">Пароль</label>
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}" id="passwordInput" name="password" placeholder="Введите пароль" maxlength="25" required>
                            <span class="input-group-text"><i class="fe fe-eye"></i></span>
                        </div>
                    </div>

                    @if ($errors->any())
                        <ul class="list-group my-3">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button class="btn btn-lg w-100 btn-primary mb-3">Войти</button>
                </form>
            </div>
        </div>
    </div>
</x-auth-layout>
