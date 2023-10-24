<x-app-layout>
    @section('title')
    {{ config('app.name', 'Laravel') }} | Dashboard
    @endsection
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <x-admin.success-alert />
        <x-admin.warning-alert />  
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-book-open"></i> Books ({{ $books_count }})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('book.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body"><i class="fa fa-pen"></i> Add New Book</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('book.create') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        @if(empty($books_count))
        <hr/>
        <div>
            Bulk upload books's data from <a href="{{ $books_api_url }}" target="_blank">{{ $books_api_url }}</a> given URL 
            <br />click here to <button type="button" class="btn btn-primary bulk_import_btn">Bulk Import</button> 
        </div>
        @endif
    </div>

    @section('scripts')
    <script>
        $(document).ready(function(){
            $('.bulk_import_btn').click(function(e){
                e.preventDefault();
                bulkImport();
            });
        })

        function bulkImport(){
            let url = "{{ route('book.import') }}";
            let formData = {};
            let response = ajaxCall(url,formData,'GET');
            response.done(function (data) {
                if(data.status){
                    location.reload();
                }
            }).fail(function (errors) {
                console.log(errors);
            });
        }
    </script>
@endsection

</x-app-layout>
