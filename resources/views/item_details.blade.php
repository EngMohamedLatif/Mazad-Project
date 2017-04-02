@extends('layouts.app')
@section('content')
@foreach($items as $item)
<div class="container main-container headerOffset">
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{ URL('/') }}">Home</a></li>
                <li class="active">{{$item->name}}</li>
            </ul>
        </div>
    </div>
    <div class="row transitionfx">
        <!-- left column -->
        <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- product Image and Zoom -->
            <div class="product-details-image col-lg-12 no-padding">
                <a href=""><img src="{{ asset($item->imagePath) }}" class="img-responsive" alt="img"></a>
            </div>
        </div>
        <!--/ left column end -->
        <!-- right column -->
        <div class="col-lg-8 col-md-8 col-sm-12">
            <h1 class="product-title">
                {{ $item->name }}
            </h1>
            <div class="details-description">
                <p>{{ $item->description }}</p>
            </div>


            <h3 class="product-code">
                <b><i class="fa fa-user"></i> Owner: </b>
                {{ $item->owner }}
            </h3>
            <h3 class="product-code">
                <b><i class="fa fa-map-marker"></i> Location: </b>
                {{ $item->location }}
            </h3>
            <h3 class="product-code">
                <b><i class="fa fa-hashtag"></i> Of Bids: </b>
                {{ $item->numberOfBids }}
            </h3>
            <h3 class="product-code">
                <b><i class="fa fa-thumb-tack"></i> Initial Price: </b>
                <span class="initial-price">{{ $item->price }}</span>
            </h3>
            <h3 class="product-code">
                <b><i class="fa fa-line-chart"></i> Latest Bid Price: </b>
                {{ $item->highestPrice }}
            </h3>

            <div class="cart-actions">
                <form method="post" name="form" id="form">
                    <div class="addto row input-bid">
                        <div class="form-group col-sm-10">
                            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                            <input type="number" id="lastbid" name="lastbid" class="form-control" placeholder="You must enter {{ $item->highestPrice+1}} or more than" >
                        </div>
                        <div class="col-md-2">
                            <button class="button btn-cart cart first"
                                    title="Bid Now" type="button" id="bid"> <i class="fa fa-money"></i> Bid Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/.cart-actions-->   
            @endforeach               
        </div>
    </div>
    <!--/.row-->
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $(function () {
        $("#bid").on("click", function (event) {
            event.preventDefault();
            // console.log('done');
            $.ajax({
                url: "{{ $item->id }}/bid",
                type: "GET",
                //  data: $("#lastbid").val(),
                data: {
                    "_token": $("#token").val(),
                    "lastbid": $("#lastbid").val()
                },
                success: function (response) {
                    console.log(response)
                    window.location.reload();
                }
            });
        });
    });

</script>

@endsection