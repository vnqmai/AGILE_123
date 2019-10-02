$(document).ready(function () {
  //deleteUser
  deleteUser();
  //addUser
  addUser();
//editUser  
    editUser();






//editUser
    function editUser(){
       $('body').delegate('#edit','click', function(){
            var account = $(this).attr('data-account');
            var pass = $(this).attr('data-pass');
            var name = $(this).attr('data-name');
            var email = $(this).attr('data-email');
            var phone = $(this).attr('data-phone');
            console.log(account);
            console.log(pass);

             $('#eAccount').val(account);
             $('#ePass').val(pass);
            $('#eEmail').val(name);
            $('#eName').val(email); 
            $('#ePhone').val(phone);

            // $('#addUser').trigger('click');
            $('#editUser').on('click',function(){
                var eAccount = $('#eAccount').val();
                var eAccount= $('#ePass').val();
                var eName= $('#eName').val(); 
                var eEmail= $('#eEmail').val();
                var ePhone =$('#ePhone').val();
                console.log(ePass);
                alert(eEmail);
            })
       })
    }
//deleteUser
    function deleteUser(){
        $('tbody').on('click','#delete',function(){
            // sweetDelete();
            $(this).closest('tr').remove();
            sweetDelete();
            
        })
    }
//addUser
    function addUser(){
        $('#AddUser').on('click', function(){
            // alert("ok thu");
            var account = $('input[name="account"]').val();
            var pass = $('input[name="password"]').val();
            var email = $('input[name="email"]').val();
            var name = $('input[name="name"]').val(); 
            var phone = $('input[name="phone"]').val();
            var gender = $('input[name="gender"]').val();
            console.log(account);
            console.log(pass);
            console.log(email);
            console.log(gender);
            var addTr = `
                <tr>
         
                     <td>${account}</td>
                     <td>${pass}</td>
                     <td>${name}</td>
                     <td>${email}</td>
                     <td>${phone}</td>
                     <td>
                        <i id="delete" style="color:red; margin-right:10px;  border-radius: 50%;" class="fa fa-times-circle"></i>
                         <i id="edit" style="color:green;  border-radius: 5px"  class="fa fa-pencil-square"></i>
                    </td>
                
                </tr>
            `;
            $('#tbUser').append(addTr);
            $('.txtF').val("");
            // $('#cancal').trigger('click');
    
        })
    }

//sweet delete
    function sweetDelete() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            // cancelButtonColor: 'red',
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                // $(this).closest('tr').remove();
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }
});
