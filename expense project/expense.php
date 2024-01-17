<?php
$connection=mysqli_connect('localhost','root','','my_expense');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="expense_action.php?action=insert" method="post">
             <div class="modal-body">
                 <div class="my-3">
                     <label>Name:</label>
                     <input type="text" name="name" class="form-control">
                 </div>

                 <div class="my-3">
                     <label>Price:</label>
                     <input type="number" name="price" class="form-control">
                 </div>
                 <div class="my-3">
                     <label>Date:</label>
                     <input type="date" name="date" class="form-control">
                 </div>
                 <div class="my-3">
                     <label>check if your expense is extra</label>
                     <label>
                         <input type="checkbox" name="extra" class="">
                     </label>
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
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="my-3">
                        <label>Price:</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
                    <div class="my-3">
                        <label>Date:</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                    <div class="my-3">
                        <label>check if your expense is extra</label>
                        <label>
                            <input type="checkbox" id="extra" name="extra" >
                        </label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div id="one-month">
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
           <?php
            $sql=mysqli_query($connection,"select * from expenses WHERE date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND LAST_DAY(NOW())");
            $num=1;
            $total=0;
            $total_extra=0;
            while ($row=mysqli_fetch_array($sql)){

           ?>

           <tr>
               <td><?= $num ?></td>
               <td><?= $row['name'] ?></td>
               <td class="<?= $row['extra']==1 ? 'text-danger':'' ?>"><?= $row['price'] ?></td>
               <td><?= $row['date'] ?></td>
               <td>
                   <button type="button" class="btn btn-info" onclick="editrecord(<?= $row['id'] ?>)" data-bs-toggle="modal"  data-bs-target="#editModal">Edit</button>
                   <a href="expense_action.php?action=delete&&id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
               </td>

           </tr>
           <?php
                if ($row['extra']==1){
                    $total_extra +=$row['price'];
                }
                $total +=$row['price'];

                $num++;
            }
           ?>
           <tr>
               <td colspan="2" class="text-center">
                   <b>Total Extra Expense:</b>
               </td>
               <td>
                   <b ><?= $total_extra ?>/-</b>
               </td>
           </tr>
           <tr>
               <td colspan="2" class="text-center">
                   <b >Total Expense: </b>
               </td>
               <td>
                   <b class="<?= $total>=20000 ? 'text-danger':'' ?>"> <?= $total ?>/-</b>
               </td>
           </tr>

           </tbody>

       </table>

   </div>

    <div>
        <button class="btn btn-warning" onclick="all_months()" style="float: right;">Months total expenses</button>
    </div>
        <div>

        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
         let expense_id;
        function editrecord(expense_id) {
            $.ajax({
                url:"expense_action.php?action=edit",
                type:"post",
                data:{expense_id:expense_id},
                success:function (data) {
                    let rowData = JSON.parse(data);
                    let extra=$('#extra');
                    $('#id').val(rowData.id);
                    $('#name').val(rowData.name);
                    $('#price').val(rowData.price);
                    $('#date').val(rowData.date);
                    rowData.extra == 1 ? extra.prop('checked', true) : extra.prop('checked', false);

                },
                error: function (error) {
                    alert('Error:', error);
                }
            });
        }
        function all_months() {
            $('#one-month').hide();
        }
</script>
</html>
