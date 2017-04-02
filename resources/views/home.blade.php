@extends('layouts.app')

@section('content')

<div class="container main-container headerOffset">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <!--START SLIDER-->
            <div class="w100 clearfix category-top">
                <div class="categoryImage"><img src="{{ asset('images/slider.jpg') }}" class="img-responsive" alt="img">
                </div>
            </div>
            <!--END SLIDER-->

            <div class="w100 productFilter clearfix">
                <p class="pull-left"> Showing <strong>12</strong> products </p>

                <div class="pull-right ">
                    <div class="change-view pull-right">
                        <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a>
                        <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a></div>
                </div>
            </div>
            <!--/.productFilter-->

            <div class="row  categoryProduct xsResponse clearfix">
                @foreach($items as $item)
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a href="{{ URL('item_details') }}/{{$item->id}}" data-placement="left" class="add-fav tooltipHere">
                            <i class="fa fa-eye"></i>
                        </a>
                        <div class="image">
                            <a href="{{ URL('item_details') }}/{{$item->id}}"><img class="img-responsive" alt="img" src="{{ $item->imagePath }}"></a>
                        </div>
                        <div class="description">
                            <h4><a href="{{ URL('item_details') }}/{{$item->id}}">{{ $item->name }}</a></h4>

                            <div class="grid-description">
                                <p>   {{ $item->description }} </p>
                            </div>
                            <div class="list-description">
                                <p> {{ $item->description }} </p>
                            </div>

                            <div class="price">
                                <b>price: </b>
                                <span>$ {{ $item->price }}</span>
                            </div>
                            <div class="price">
                                <b>#Of Bids : </b>
                                <span>{{ $item->numberOfBids}}</span>
                            </div>
                            <div class="price">
                                <b>Highest Price : </b>
                                <span>{{ $item->highestPrice }}</span>
                            </div>
                            <div class="price">
                                <b>Item's Owner : </b>
                                <span>{{ $item->owner }}</span>
                            </div>
                            <div class="price">
                                <b>location : </b>
                                <span>{{ $item->location }}</span>
                            </div>
                            <div class="price">
                                <a href="{{ URL('item_details') }}/{{$item->id}}" id="edit" class="item-de-btn btn btn-info">item details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            <!--/.categoryProduct || product content end-->

            <div class="">
                <div class="pagination pull-left no-margin-top">
                    <ul class="pagination no-margin-top">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
                <div class="pull-right pull-right  col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                    <p>Showing 1–450 of 12 results</p>
                </div>
            </div>
        </div>
        <!--/.categoryFooter-->
    </div>
    <!--/right column end-->
</div>
<!-- /.row  -->
@endsection
