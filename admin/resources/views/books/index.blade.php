<x-app-layout>
    @section('title')
    {{ config('app.name', 'Laravel') }} | Books
    @endsection
    <div class="container">
        <h3 class="mt-4">Books</h3>
        <x-admin.success-alert />
        <x-admin.warning-alert />  
        <div class="books_html">
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
                    <tr><td colspan="8">Loading...</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    @section('scripts')
    <script>
        $(document).ready(function(){
            booksList();
        })

        $(document).on("click",".previous_page_url",function(e) {
            e.preventDefault();
            let url = $(this).data('previous_page_url');
            booksList(url);
        });

        $(document).on("click",".element_page_url",function(e) {
            e.preventDefault();
            let url = $(this).data('element_page_url');
            booksList(url);
        });

        $(document).on("click",".next_page_url",function(e) {
            e.preventDefault();
            let url = $(this).data('next_page_url');
            booksList(url);
        });

        function booksList(url = ''){
            if(url == ''){
                url = "{{ route('book.list')}}";
            }
            formData = {};
            let response = ajaxCall(url,formData,'GET');
            response.done(function (data) {
                if(data.status){
                    $(".books_html").html(data.html);     
                }
            }).fail(function (errors) {
                console.log(errors);
            });
        }
    </script>
@endsection
</x-app-layout>
