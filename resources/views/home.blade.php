@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products <a href="/cart" class="btn btn-warning float-right" style="color:white">Cart</a></div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach($products as $product)
                        <div class="card" >
                          <img src="/uploads/{{$product->image}}" style="height:200px" class="card-img-top w-100" alt="...">
                          <div class="card-body">
                            <div class="row">
                                <p class="card-text col-10">{{$product->description}}</p>
                                &nbsp;<b><p class="card-text float-right">₹{{$product->price}}</p></b>
                            </div>
                            <button class="btn btn-sm btn-primary cart-button d-block" data-id="{{$product->id}}" id="button-{{$product->id}}">Add to cart</button>
                            <div class="card-text d-none" id="cart-{{$product->id}}">Added To Cart</div>
                          </div>
                        </div></br>
                    @endforeach
                    
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
                $('#cart-'+productId).addClass('d-block').removeClass('d-none');
                $('#button-'+productId).addClass('d-none').removeClass('d-block');

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
