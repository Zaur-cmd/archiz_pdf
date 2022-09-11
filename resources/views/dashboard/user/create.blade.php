<x-dashboard-layout title="Добавление пользователя">
    <x-dashboard-header-small pretitle="Новый" title="Пользователь">
        <a href="{{ route('users.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('users.store') }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameInput" class="form-label">ФИО</label>
                            <input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name') }}" placeholder="Введите ФИО" maxlength="100" required autofocus>
                        </div>
                        <div class="col-12  mb-3">
                            <label for="phoneInput" class="form-label">Номер телефона</label>
                            <input type="number" name="phone" class="form-control" id="phoneInput" value="{{ old('phone') }}" placeholder="Введите номер телефона">
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="passwordInput" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Введите пароль">
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="password_confirmationInput" class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmationInput" placeholder="Подвердите пароля">
                        </div>
                        <input type="hidden" name="type" value="0">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="genderSelect" class="form-label">Пол</label>
                            <select name="gender" class="form-select" id="genderSelect" data-toggle="select" required>
                                <option value="1" @if (old('gender') == 1) selected @endif>Мужской</option>
                                <option value="0" @if (old('gender') != 1) selected @endif>Женский</option>
                            </select>
                        </div>

                    </div>

                    @if ($errors->any())
                        <ul class="list-group my-3">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <hr class="my-5">
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-lg btn-white">Очистить</button>
                        <button type="submit" class="btn btn-lg btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-dashboard-layout>
