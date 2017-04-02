@extends('layouts.app')

@section('content')
<!-- Modal add Product start -->
<div class="modal signUpContent fade" id="addProduct" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Add New Product </h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="#" id="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name">

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name="price" >
                    </div>
                    <div class="">
                        <label>
                            <input type="checkbox" name=isOnline> Make Product Online
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="InputFile">Image</label>
                        <input type="file" id="InputFile" name="photo" class="form-control">
                        <p class="help-block"><i class="fa fa-flag"></i> Please Upload Your image Here.</p>
                    </div>

                    {{-- <input type="file" name="photo"> --}}
                    <button type="submit" value="Add" id="add" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> ADD</button>
                </form>


            </div>

        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- Fixed navbar start -->
<!-- Modal add Product start -->
<div class="modal signUpContent fade" id="editProduct" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Edit Product Name </h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="">
                        <label>
                            <input type="checkbox" name="isOnline" id="isOnline">Make Product Online
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="InputFile">Image</label>
                        <input type="file" id="InputFile" name="photo" id="image" class="form-control">
                        <p class="help-block"><i class="fa fa-flag"></i> Please Upload Your image Here.</p>
                    </div>

                    {{-- <input type="file" name="photo"> --}}
                    <!--<input type="submit" value="Add" id="add" class="btn btn-primary">-->
                    <button type="submit" id="add" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save Changes</button>
                </form>


            </div>

        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- Fixed navbar start -->
<!-- /.Fixed navbar  -->
<div class="container main-container headerOffset">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
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
                <div class="col-xs-12">
                    <a class="btn btn-primary add-new-product" data-toggle="modal" data-dismiss="modal"
                       href="#addProduct"> 
                        <span class="add2cart"><i class="fa fa-plus-square"> </i> Add New Product </span> 
                    </a>
                </div>
                @foreach($items as $item)
                <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
                    <div class="product">
                        <a data-placement="left" href="{{ URL('item_details') }}/{{$item->id}}"
                           class="add-fav">
                            <i class="fa fa-eye"></i>
                        </a>
                        <div class="image">
                            <a href="{{ URL('item_details') }}/{{$item->id}}"><img class="img-responsive" alt="img"
                                             src="{{ $item->imagePath }}"></a>
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
                                <button type="button" value="Delete" id="{{$item->id}}" data-id="{{$item->id}}" class="btn btn-danger delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                <button type="button" data-id="{{$item->id}}" class="btn btn-info edit" data-toggle="modal" data-dismiss="modal"
                                        href="#editProduct"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>      
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
<!-- /main container -->

<!-- Product Details Modal  -->

@endsection

@section("scripts")
<script>
    $(function(){
       $("#form").on("submit", function(event){
           event.preventDefault();
               // console.log('Done');
               $.ajax({
                url:"additem",
                type: "POST",
                //  data: $(this).serialize(),
                data: new FormData(this),
                contentType: false,
                processData: false, 
                success: function(response) {
                     //console.log(element);
                       $("#addProduct").modal("hide");
           window.location.reload();
                 }
               
           });
           });
   });



//add and delete 

$(function(){
   $(".edit").on("click", function(event){
       event.preventDefault();
       var item_id = $(this).data('id');
       $.ajax({
        url:"getItem/"+item_id,
        type: "GET",


        success: function(response) {
           console.log(response);
                   //hwa rage3 json
                   var item = response.item;
                   
                   $("#name").val(item.name);
                   $("#description").val(item.description);
                   $("#price").val(item.price);
                   //$("#image").val(item.imagePath);
                   $("#id").val(item.id);
                   if(item.IsOnline==1)
                   {
                    $("#isOnline").attr("checked", 'checked');
                }
                $("#editProduct").modal("show");



            }
        });
   });
});

$(function(){
   $("#editProduct").on("submit", 'form#form', function(event){
       event.preventDefault();
       $.ajax({
        url:"updateItem",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response) {
           console.log(response);
           $("#editProduct").modal("hide");
           window.location.reload();
       }
   });
   });
});

// delete


$(function(){
 $(".delete").on("click", function(event){
     event.preventDefault();
      var item_id = $(this).data('id');
     $.ajax({
        url:"deleteItem/"+item_id,
        type: "GET",

        success: function(response) {
           console.log("Deleted Successfully");
           $("#"+item_id).parents(".product ").parent("div").remove();
       }
   });
 });
});


</script>
@endsection