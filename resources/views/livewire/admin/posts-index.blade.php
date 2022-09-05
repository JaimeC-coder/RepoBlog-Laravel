<div class="card">
    <div class="card-header">
        <input type="text" wire:model="search" class="form-control" placeholder="Ingrese El nombre de un Post">
    </div>
    @if ($posts->count())
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($posts as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td with='10px'>
                                    <a href="{{ route('admin.posts.edit', $item) }}" class="btn btn-primary">Editar</a>
                                </td>

                                <td with='10px'>
                                    <form action="{{ route('admin.posts.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>

        </div>
        <div class="card-footer text-muted">
            {{ $posts->links() }}
        </div>
@else
    <div class="card-body">
        <strong>No hay ningun registro...</strong>
    </div>

        @endif
</div>
