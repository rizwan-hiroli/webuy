@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart<a href="/home" class="btn btn-warning float-right" style="color:white">Home</a></div>
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($carts as $cart)
                        <div class="card" >
                          <img src="{{$cart->image}}" style="height:200px" class="card-img-top w-100" alt="...">
                          <div class="card-body">
                            <div class="row">
                                <p class="card-text col-10">{{$cart->description}}</p>
                                &nbsp;<b><p class="card-text float-right">₹{{$cart->price}}</p></b>
                            </div>
                            <button class="btn btn-sm btn-danger cart-button" data-id="{{$cart->id}}">Remove from cart</button></td>
                          </div>
                        </div></br>
                    @endforeach
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
            url: '/remove-cart',

            success: function (response) {
                // $('.close').trigger('click');
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
