<html>
 <head>
      <title>View Item Details</title>
      
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
      
     
   </head>
  <body>

      

      <form     id="form">
           {{ csrf_field() }}

           
        
        <input type="button" value="Delete" id="delete">
   <button type="button" id="edit" class="btn btn-info btn-lg"> Edit</button>


      </form>





<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Item</h4>
      </div>
      <div class="modal-body">
      <form method="POST" id="form">
        {{ csrf_field() }}
        <div class="form-group">

          <label for="name">Name:</label>
          <input type="text" id="name" class="form-control" name=name >
          
        </div>
        <br>
         <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" rows="3" name=description></textarea>
  </div>
  <br>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" id="price" class="form-control" name=price >
        </div>
        <div class="checkbox">
          <label><input type="checkbox"  id="isOnline" name="isOnline">Online</label>
        </div>
         <input type="submit" value="Save" class="btn btn-default">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>

  </div>
</div>



      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
    
   <script>
        $(function(){
           $("#delete").on("click", function(event){
               event.preventDefault()
               $.ajax({
                url:"deleteItem/{id}",
                 type: "GET",
                  
                 success: function(response) {
                     console.log("Deleted Successfully")
                   
                 }
               });
           });
        });

//To Do add getItem Ajax

 $(function(){
           $("#edit").on("click", function(event){
               event.preventDefault()
               $.ajax({
                url:"getItem/{id}",
                 type: "GET",
                  
                 success: function(response) {
                   console.log(response);
                   //hwa rage3 json
                    var item = response.item;
                   
                     $("#name").val(item.name);
                     $("#description").val(item.description);
                      $("#price").val(item.price);

                      if(item.IsOnline==1)
                      {
                        $("#isOnline").attr("checked", 'checked');
                      }
                      
                      
                     $("#myModal").modal("show");
                   
                 }
               });
           });
        });

 $(function(){
           $("#myModal").on("submit", 'form#form', function(event){
               event.preventDefault();
               $.ajax({
                url:"updateItem",
                 type: "POST",
                 data:$(this).serialize(),
                 
                 success: function(response) {
                   console.log(response);
                   
                 }
               });
           });
        });




      </script>
  </body>
</html>
