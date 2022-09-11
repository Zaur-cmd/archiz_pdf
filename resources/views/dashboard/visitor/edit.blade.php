<x-dashboard-layout title="Редактирование категории мастеров #{{ $visitor->id }}">
    <x-dashboard-header-small pretitle="Данные" title="Категории мастеров #{{ $visitor->id }}">
        <a href="{{ route('visitor.index') }}" class="btn btn-primary lift">Назад</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('visitor.update', $visitor->id) }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nameInput" class="form-label">Название</label>
                                <input type="text" name="name" class="form-control" id="nameInput" value="{{ old('name', $visitor->name) }}" placeholder="Введите названия категорий" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="mrnInput" class="form-label">mrn</label>
                                <input type="text" name="mrn" class="form-control" id="mrnInput" value="{{ old('mrn', $visitor->mrn) }}" placeholder="Введите mrn" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="reference_noInput" class="form-label">reference_no</label>
                                <input type="text" name="reference_no" class="form-control" id="reference_noInput" value="{{ old('reference_no', $visitor->reference_no) }}" placeholder="Введите reference_no" maxlength="100" required autofocus>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="genderSelect" class="form-label">Пол</label>
                                <select name="gender" class="form-select" id="genderSelect" data-toggle="select" required>
                                    <option value="male" @if (old('gender') == 1) selected @endif>Мужской</option>
                                    <option value="female" @if (old('gender') != 1) selected @endif>Женский</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="birth_dateInput" class="form-label">birth_date</label>
                                <input type="date" name="birth_date" class="form-control" id="birth_dateInput" value="{{ old('birth_date', $visitor->birth_date) }}" placeholder="Введите birth_date" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="locationInput" class="form-label">location</label>
                                <input type="text" name="location" class="form-control" id="locationInput" value="{{ old('location', $visitor->location) }}" placeholder="Введите location" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="lab_idInput" class="form-label">lab_id</label>
                                <input type="text" name="lab_id" class="form-control" id="lab_idInput" value="{{ old('lab_id', $visitor->lab_id) }}" placeholder="Введите lab_id" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="sample_noInput" class="form-label">sample_no</label>
                                <input type="text" name="sample_no" class="form-control" id="sample_noInput" value="{{ old('sample_no', $visitor->sample_no) }}" placeholder="Введите sample_no" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="passport_NoInput" class="form-label">passport_no</label>
                                <input type="text" name="passport_no" class="form-control" id="passport_NoInput" value="{{ old('passport_no', $visitor->passport_no) }}" placeholder="Введите passport_no" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="reg_dateInput" class="form-label">reg_date</label>
                                <input type="datetime-local" name="reg_date" class="form-control" id="reg_dateInput" value="{{ old('reg_date', $visitor->reg_date) }}" placeholder="Введите reg_date" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="collection_dateInput" class="form-label">collection_date</label>
                                <input type="datetime-local" name="collection_date" class="form-control" id="collection_dateInput" value="{{ old('collection_date', $visitor->collection_date) }}" placeholder="Введите collection_date" maxlength="100" required autofocus>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="reporting_dateInput" class="form-label">reporting_date</label>
                                <input type="datetime-local" name="reporting_date" class="form-control" id="reporting_dateInput" value="{{ old('reporting_date', $visitor->reporting_date) }}" placeholder="Введите reporting_date" maxlength="100" required autofocus>
                            </div>

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
                        <button type="submit" class="btn btn-lg btn-primary">Редактировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
