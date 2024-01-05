<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
<!--    Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="expense_action.php?action=insert" method="post">
             <div class="modal-body">
                 <div class="my-3">
                     <label>Name:</label>
                     <input type="text" name="expense_name" class="form-control">
                 </div>

                 <div class="my-3">
                     <label>Price:</label>
                     <input type="number" name="price" class="form-control">
                 </div>
                 <div class="my-3">
                     <label>Date:</label>
                     <input type="date" name="date">
                 </div>

             </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="expense_action.php?action=update" method="post">
                <div class="modal-body">
                    <div class="my-3">
                        <label>Name:</label>
                        <input type="text" name="expense_name" class="form-control">
                    </div>

                    <div class="my-3">
                        <label>Price:</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="my-3">
                        <label>Date:</label>
                        <input type="date" name="date" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button"  class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
   <div class="m-5">
       <h3 class="text-center">My Monthly expenses</h3>
   </div>

   <div class="my-5">
       <button type="button" class="btn btn-primary my-3 text-left" style="float: right;"  data-bs-toggle="modal" data-bs-target="#addModal">Add New</button>
       <table class="table">
           <thead>
           <tr>
               <th>No.</th>
               <th>Name</th>
               <th>Price</th>
               <th>Date</th>
               <th>Actions</th>
           </tr>
           </thead>
           <tbody>
           <tr>
               <td>1</td>
               <td>Eat</td>
               <td>400/-</td>
               <td>24-07-2024</td>
               <td>
                   <button type="button" class="btn btn-info" onclick="editrecord(12)" data-bs-toggle="modal"  data-bs-target="#editModal">Edit</button>
                   <a href="#" class="btn btn-danger">Delete</a>
               </td>

           </tr>
           <tr>
               <td>1</td>
               <td>Eat</td>
               <td>400/-</td>
               <td>24-07-2024</td>
               <td>
                   <a href="#" class="btn btn-info">Edit</a>
                   <a href="#" class="btn btn-danger">Delete</a>
               </td>

           </tr>
           <tr>
               <td>1</td>
               <td>Eat</td>
               <td>400/-</td>
               <td>24-07-2024</td>
               <td>
                   <a href="#" class="btn btn-info">Edit</a>
                   <a href="#" class="btn btn-danger">Delete</a>
               </td>

           </tr>
           </tbody>
       </table>
   </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // $(document).on("click","#edit-movie",function () {
        // $(this).html('Save');
         let expense_id;
        function editrecord(expense_id) {
            // let expense_id=$('').val();

            console.log(expense_id);
            // $.ajax({
            //     url:"expense_action.php?action=edit",
            //     type:"get",
            //     data:{expense_id:expense_id},
            //     success:function (data) {}
            // });
        }
    // });
</script>
</html>
