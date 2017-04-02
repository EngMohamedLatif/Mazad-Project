<html>
 <head>
      <title>Edit item</title>
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
     
   </head>
  <body>

      @if(count($errors)>0)
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="edititem" id="form">
        {{ csrf_field() }}
        <div class="form-group">

          <label for="name">Name:</label>
          <input type="text" class="form-control" name=name>
          
        </div>
        <br>
         <div class="form-group">
    <label for="exampleTextarea">Description</label>
    <textarea class="form-control" id="exampleTextarea" rows="3" name=description></textarea>
  </div>
  <br>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" class="form-control" name=price >
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name=isOnline>Online</label>
        </div>
        <input type="submit" value="Add" id="add">
      </form>
       <script>
$(function (){
$("#form").on("submit",function(event)
{event.preventDefault()

 

 
        $(function(){
           $("#form").on("submit", function(event){
               event.preventDefault()
               $.ajax({
                url:"additem",
                 type: "POST",
                 data: $(this).serialize(),
                 success: function(response) {
                   $.each(response, function(index, element) {
                     console.log(element);
                   });
                 }
               });
           });
        });
      </script>
  </body>
</html>
