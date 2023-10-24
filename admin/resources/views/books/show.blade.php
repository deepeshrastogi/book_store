<x-app-layout>
    @section('title')
    {{ config('app.name', 'Laravel') }} | Books | Book Details
    @endsection
    <div class="container">
        <h3 class="mt-4 mb-2">Book Details</h3>
        <x-admin.success-alert />
        <x-admin.warning-alert />  
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <td><strong>Title</strong></td><td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <td><strong>Author</strong></td><td>{{ $book->author }}</td>
                    </tr>
                    <tr> 
                        <td><strong>Genre</strong></td><td>{{ $book->genre }}</td>
                    </tr>
                    <tr> 
                        <td><strong>Isbn</strong></td><td>{{ $book->isbn }}</td>
                    </tr>
                    <tr> 
                        <td><strong>Published</strong></td><td>{{ $book->published }}</td>
                    </tr>
                    <tr> 
                        <td><strong>Publisher</strong></td><td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                        <td><strong>Active</strong></td>
                        <td>
                            @if($book->active == 1)
                            <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <td><strong>Image</strong></td>
                        <td>
                            @php
                                $filePath = public_path('/uploads/book_image');
                                $imagePath = $filePath."/".$book->image
                            @endphp
                            @if(!empty($book->image) && file_exists($imagePath))
                                    <a href="{{ asset('uploads/book_image/'.$book->image) }}" target="_blank">
                                        <img src="{{ asset('uploads/book_image/'.$book->image) }}" alt="{{ $book->title }}" class="view-image"/>
                                    </a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
