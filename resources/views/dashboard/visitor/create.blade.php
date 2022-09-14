<x-dashboard-layout title="Add Document">
    <x-dashboard-header-small pretitle="New" title="Documents">
        <a href="{{ route('visitor.index') }}" class="btn btn-primary lift">Back</a>
    </x-dashboard-header-small>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
                <form action="{{ route('visitor.store') }}" method="POST" class="needs-validation mb-4" accept-charset="utf-8">
                    @csrf

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="nameInput" placeholder="Введите названия категорий" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="mrnInput" class="form-label">MRN</label>
                            <input type="text" name="mrn" class="form-control" id="mrnInput"  placeholder="Введите mrn" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="reference_noInput" class="form-label">Reference No</label>
                            <input type="text" name="reference_no" class="form-control" id="reference_noInput"  placeholder="Введите reference_no" maxlength="100" required autofocus>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="genderSelect" class="form-label">Gender</label>
                            <select name="gender" class="form-select" id="genderSelect" data-toggle="select" required>
                                <option value="male" @if (old('gender') == 1) selected @endif>Male</option>
                                <option value="female" @if (old('gender') != 1) selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="birth_dateInput" class="form-label">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control" id="birth_dateInput" placeholder="Введите birth_date" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="locationInput" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="locationInput" placeholder="Введите location" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="lab_idInput" class="form-label">Lab Id</label>
                            <input type="text" name="lab_id" class="form-control" id="lab_idInput" placeholder="Введите lab_id" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sample_noInput" class="form-label">Sample No</label>
                            <input type="text" name="sample_no" class="form-control" id="sample_noInput"  placeholder="Введите sample_no" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="passport_NoInput" class="form-label">Passport No</label>
                            <input type="text" name="passport_no" class="form-control" id="passport_NoInput" placeholder="Введите passport_no" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="reg_dateInput" class="form-label">Reg Date</label>
                            <input type="datetime-local" name="reg_date" class="form-control" id="reg_dateInput" placeholder="Введите reg_date" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="collection_dateInput" class="form-label">Collection Date</label>
                            <input type="datetime-local" name="collection_date" class="form-control" id="collection_dateInput" placeholder="Введите collection_date" maxlength="100" required autofocus>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="reporting_dateInput" class="form-label">Reporting Date</label>
                            <input type="datetime-local" name="reporting_date" class="form-control" id="reporting_dateInput"  placeholder="Введите reporting_date" maxlength="100" required autofocus>
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
