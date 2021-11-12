//Ajax call for Admin login
function checkAdminLogin(){
    //console.log("cliked");
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
        url : 'admin/admin.php',
        method:'POST',
        data:{
            checkLogemail:"checklogmail",
            adminLogEmail:adminLogEmail,
            adminLogPass:adminLogPass,

        },
        success:function(data){
            //console.log(data);
            if(data == 0)
            {
                console.log("ok");
                $("#statusAdminLogMsg").html('<span class="alert alert-danger"> Invalid Email or Password !</span>');
            }
            else if(data !== 0)
            {
                console.log("fail");
                $("#statusAdminLogMsg").html('<span class="alert alert-success">Loading...</span>');
                setTimeout(()=>{
                    window.location.href = "admin/admindashboard.php";
                }, 1000);
            }
        }
    });
}