<x-dashboard-layout title="Документы ">
    <x-dashboard-header-large pretitle="Обзор" title="Документы">
        <a href="{{ route('visitor.create') }}" class="btn btn-primary lift">Добавить</a>
    </x-dashboard-header-large>

    <div class="container-fluid">
        <div class="card" data-list='{"valueNames": ["user-id", "user-fullname", "user-username", "user-email", "user-roles"]}' id="list">
            <div class="card-header">
                <form>
                    <div class="input-group input-group-flush input-group-merge input-group-reverse">
                        <input class="form-control list-search" type="search" placeholder="Поиск ...">
                        <span class="input-group-text"><i class="fe fe-search"></i></span>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover tabl33e-nowrap card-table">
                    <thead>
                        <tr>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-id">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">Название</a></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($visitors as $visitor)
                            <tr>
                                <td class="user-id">#{{ $visitor->id }}</td>
                                <td class="user-name">{{ $visitor->name }}</td>
                                <td class="user-mrn">{{ $visitor->mrn }}</td>
                                <td class="user-reference">{{ $visitor->reference_no }}</td>
                                <td class="user-gender">{{ $visitor->gender }}</td>
                                <td class="user-birth_date">{{ $visitor->birth_date }}</td>
                                <td class="user-location">{{ $visitor->lab_id }}</td>
                                <td class="user-location">{{ $visitor->sample_no }}</td>
                                <td class="user-location">{{ $visitor->passport_No }}</td>
                                <td class="user-location">{{ $visitor->reg_date }}</td>
                                <td class="user-location">{{ $visitor->collection_date }}</td>
                                <td class="user-location">{{ $visitor->reporting_date }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('visitor.edit', $visitor->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                            <span class="fe fe-edit-2"></span>
                                            </a>
                                        <a href="{{ route('visitor.show', $visitor->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="file">
                                            <span class="fe fe-file"></span>
                                        </a>
                                        <a href="{{ route('visitor.download', $visitor->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="file">
                                            <span class="fe fe-download"></span>
                                        </a>

                                        <form action="{{ route('visitor.destroy', $visitor->id) }}" id="item{{ $visitor->id }}" method="POST">
                                            @csrf
                                            @method ('DELETE')

                                            <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $visitor->id }})">
                                                <span class="fe fe-trash text-danger"></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Вы еще не добавили категории</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
{{--        {{ $visitors->onEachSide(5)->links() }}--}}
    </div>

    @if (session('status'))
        <x-slot name="notify">
            {!! session('status') !!}
        </x-slot>
    @endif
    <x-slot name="script">
        <script>
            function deleteConfirm(id) {
                Swal.fire({
                    title: 'Вы уверены?',
                    text: "Вы не сможете вернуть это!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Да, удалить!',
                    cancelButtonText: 'Нет, отменить!',

                }).then((result) => {
                    if (result.isConfirmed) {
                        window.document.getElementById("item" + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-dashboard-layout>
