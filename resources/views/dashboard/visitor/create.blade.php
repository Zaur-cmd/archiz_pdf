<x-dashboard-layout title="Добавление файл">
    <x-dashboard-header-small pretitle="Новый" title="Документы">
        <a href="{{ route('visitor.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('visitor.store') }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="nameInput" class="form-label">ФИО</label>
                            <input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name') }}" placeholder="Введите ФИО" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6  mb-3">
                            <label for="mrnInput" class="form-label">mrn</label>
                            <input type="text" name="mrn" class="form-control" id="mrnInput" value="{{ old('mrn') }}" placeholder="Введите mrn">
                        </div>

                        <div class="col-6 col-lg-6 mb-3">
                            <label for="referenceNoInput" class="form-label">referenceNo</label>
                            <input type="text" name="reference_no" class="form-control" id="referenceNoInput" placeholder="referenceNo">
                        </div>

                        <div class="col-6  mb-3">
                            <label for="birthDateInput" class="form-label">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control" id="birthDateInput" value="{{ old('birth_date') }}" placeholder="Введите номер телефона">
                        </div>

                        <div class="col-6  mb-3">
                            <label for="locationInput" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="locationInput" value="{{ old('location') }}" placeholder="Location">
                        </div>
                        <input type="hidden" name="type" value="0">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="genderSelect" class="form-label">Пол</label>
                            <select name="gender" class="form-select" id="genderSelect" data-toggle="select" required>
                                <option value="male" @if (old('gender') == 1) selected @endif>Мужской</option>
                                <option value="female" @if (old('gender') != 1) selected @endif>Женский</option>
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
