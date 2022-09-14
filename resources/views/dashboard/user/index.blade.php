<x-dashboard-layout title="Сотрудники">
    <x-dashboard-header-large pretitle="Обзор" title="{{ userType(request()->type) }}">
        <a href="{{ route('users.create') }}" class="btn btn-primary lift">Добавить</a>
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
                            <th><a href="#" class="text-muted list-sort" data-sort="user-fullname">ФИО</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Номер телефона</a>
                            </th>
                            <th><a href="#" class="text-muted list-sort" data-sort="user-username">Почта</a>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list font-size-base">
                        @forelse ($users as $user)
                            <tr>
                                <td class="user-id">#{{ $user->id }}</td>

                                <td class="user-name">{{ $user->name }}</td>

                                <td class="user-phone">{{ $user->phone }}</td>

                                <td class="user-eamil">{{ $user->email }}</td>

                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Информация">
                                            <span class="fe fe-info"></span>
                                        </a>

                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-white me-2" data-bs-toggle="tooltip" title="Редактировать">
                                            <span class="fe fe-edit-2"></span>
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" id="item{{ $user->id }}" method="POST">
                                            @csrf
                                            @method ('DELETE')

                                            <button type="button" class="btn btn-sm btn-white" data-bs-toggle="tooltip" title="Удалить" onclick="deleteConfirm({{ $user->id }})">
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
{{--        {{ $users->onEachSide(5)->links() }}--}}
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
