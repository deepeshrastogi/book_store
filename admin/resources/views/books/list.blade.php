<table class="table">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publication date</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="books_data">
        @php $booksArr = $books->toArray(); @endphp
        @if(!empty($booksArr['data']))
            @foreach ($books as $index=>$book)
            <tr>
                <td>{{ $booksArr['per_page'] * ($booksArr['current_page']-1) + $index + 1 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->genre }}</td>
                <td>
                    @if($book->active == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a title="Show" class="btn btn-info btn-sm" href="{{ route('book.show',$book->id) }}"><i class="fa fa-eye"></i></a>
                    &nbsp;
                    <a title="Edit" class="btn btn-primary btn-sm" href="{{ route('book.edit',$book->id) }}"><i class="fa fa-pen"></i></a>
                    &nbsp;
                    <form class="inline-flex" action="{{ route('book.destroy',$book->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        @else
            <tr><td colspan="8">Sorry, No recod found !!!</td></tr>
        @endif
    </tbody>
</table>

@if(!empty($books->toArray()))
<div class="pagination pagination_html">
    {{ $books->onEachSide(1)->links('pagination.custom') }}
    {{-- {{ $books->onEachSide(1)->links() }} --}}
</div>
@endif