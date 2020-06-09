@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category <a href="/admin/categories" class="btn btn-warning float-right ml-2" style="color:white">Categories</a></div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form id="categoryForm" class="ml-lg-5 mt-4" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Category..." required>
                                <div class="error fname_home"></div>
                            </div>
                        </div>
                        <div class="alert alert-success" style="display: none" id="homeContactusSuccessMessage">
                            <strong>Success!</strong> New Category has been added.
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-4 text-left mt-1">
                                <button type="submit" class="btn btn-success">
                                Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" defer>
    
   $(document).ready(function () {
    
    $('#categoryForm').on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            data: {
                'title':$('#title').val(),
                _token: $('#_token').val()
            },
            type: 'post',
            url: '/admin/category',
            success: function (response) {
                $('#loader').hide();
                $('.error').empty();
                $("#contact_form_home").trigger("reset");
                $('#homeContactusSuccessMessage').show();

            },
            error: function (response) {
                $('#loader').hide();
                $('#homeContactusSuccessMessage').hide();
                $('#modalContactusSuccessMessage').hide();
            }
        });
    });


    
});


</script>
