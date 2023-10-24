<x-app-layout>
    @section('title')
    {{ config('app.name', 'Laravel') }} | Books | Edit book
    @endsection
    <div class="container">
        <h3 class="mt-4 mb-2">Edit Book</h3>
        <x-admin.success-alert />
        <x-admin.warning-alert />  
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('book.update',$book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputTitle" type="text" name="title" value="{{ old('title',$book->title) }}" />
                                <label class="required" for="inputTitle">Title</label>
                                @if($errors->has('title'))
                                <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputAuthor" type="text" name="author" value="{{ old('author',$book->author) }}" />
                                <label class="required" for="inputAuthor">Author</label>
                                @if($errors->has('author'))
                                <span class="help-block">
                                <strong>{{ $errors->first('author') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputGenre" type="text" name="genre" value="{{ old('genre',$book->genre) }}" />
                                <label class="required" for="inputGenre">Genre</label>
                                @if($errors->has('genre'))
                                <span class="help-block">
                                <strong>{{ $errors->first('genre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputIsbn" type="number" name="isbn" value="{{ old('isbn',$book->isbn) }}" />
                                <label class="required" for="inputIsbn">Isbn</label>
                                @if($errors->has('isbn'))
                                <span class="help-block">
                                <strong>{{ $errors->first('isbn') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputImage" type="file" name="image" accept=".jpg, .jpeg, .png" />
                                        <label class="required" for="inputimage">Image</label>
                                        @if($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <?php
                                    $publishDate = '';
                                    if(!empty($book->published)){
                                        $publishDate = date('Y-m-d',strtotime(str_replace('/','-',$book->published)));
                                    }
                                    ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPublished" type="date" name="published" value="{{ old('published',$publishDate) }}" />
                                        <label class="required" for="inputPublished">Published</label>
                                        @if($errors->has('published'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('published') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPublisher" type="text" name="publisher" value="{{ old('publisher',$book->publisher) }}" />
                                        <label class="required" for="inputPublisher">Publisher</label>
                                        @if($errors->has('publisher'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @php
                                 $filePath = public_path('/uploads/book_image');
                                 $imagePath = $filePath."/".$book->image
                                @endphp
                                @if(!empty($book->image) && file_exists($imagePath))
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <a href="{{ asset('uploads/book_image/'.$book->image) }}" target="_blank">
                                            <img src="{{ asset('uploads/book_image/'.$book->image) }}" alt="{{ $book->title }}" class="view-image"/>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                           

                        

                            <div class="form-floating mb-3">
                                <select class="form-control" id="inputActive" type="text" name="active">
                                    <option value="1" {{ (old('active',$book->active,1) == 1) ? 'selected' :'' }}>Active</option>
                                    <option value="0" {{ (old('active',$book->active) == 0) ? 'selected' :'' }}>Inactive</option>
                                </select>
                                <label class="required" for="inputActive">Active</label>
                                @if($errors->has('active'))
                                <span class="help-block">
                                <strong>{{ $errors->first('active') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputDescription" type="text" name="description">{{ old('description',$book->description) }}</textarea>
                                <label class="required" for="inputDescription">Description</label>
                                @if($errors->has('description'))
                                <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="d-flex align-items-right justify-content-between mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
