@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product <a href="/admin/home" class="btn btn-warning float-right ml-2" style="color:white">Products</a></div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form id="productForm" class="ml-lg-5 mt-4" method="post">
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Title..." required>
                                <div class="error fname_home"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <select id="category" name="category_id" class="form-group form-control"> 
                                    @foreach($categories as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group col-6 form-row">
                            <textarea class="form-control " id="description" name="description" placeholder="Description..."></textarea>
                            <div class="error message_home"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input type="number" class="form-control" id="price"  name="price" placeholder="Enter Price" required>
                                <div class="error price"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" id="image" name="image" required>
                                <div class="error fname_home"></div>
                            </div>
                        </div>
                        <div class="alert alert-success" style="display: none" id="homeContactusSuccessMessage">
                            <strong>Success!</strong> New Product has been added.
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
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 


    $('#productForm').on('submit',function (e) {
        e.preventDefault();
        $.ajax({
            data:new FormData($("#productForm")[0]),
            dataType:'json',
            async:false,
            type:'post',
            processData: false,
            contentType: false,
            type: 'post',
            url: '/admin/product',
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
