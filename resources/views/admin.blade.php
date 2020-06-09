@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products <a href="/admin/product/add" class="btn btn-warning float-right ml-2" style="color:white">Add</a><a href="/admin/categories" class="btn btn-warning float-right" style="color:white">Categories</a></div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-sm table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Product</th>
                        </tr>
                      </thead>
                      <tbody>
                            
                            @php
                                $colors = ['primary','secondary','success','danger','warning','info'];
                            @endphp
                            @foreach($products as $product)
                                <tr class="table-{{$colors[array_rand($colors)]}}">
                                    <td >{{$product->title}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  

                    <div class="float-right">{{$products->links()}}</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" defer>
    
   $(document).ready(function () {
    
    $('.cart-button').click(function (e) {
        var productId = $(this).data('id');
        
        $.ajax({
            data: {
                'product_id':productId,
                _token: $('#_token').val()
            },
            type: 'post',
            url: '/cart',
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
