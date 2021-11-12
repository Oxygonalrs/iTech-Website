
$(document).ready(function(){
    $("#stuemail").on("keypress blur", function(){
        var stuemail = $("#stuemail").val();
        $.ajax({
            url:'student/addstudent.php',
            method:'POST',
            data:{
                stuemail : stuemail,
                checkemail:"checkmail",
            },
            success:function(data)
            {
                console.log(data);
                if(data != 0){
                    $("#statusMsg2").html('<small style="color:red;">Email Id Already Exist</small>');
                    $("#stuemail").focus();
                    $("#signup").attr("disabled",true);
                }
                else if(data == 0)
                {
                    $("#statusMsg2").html('<small style="color:red;"></small>');
                    $("#signup").attr("disabled",false);
                }
            },
        });
    });
});


function addstu()
{
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    //Checking Form Fields on FOrm submission
    if(stuname.trim()=="")
    {
        $("#statusMsg1").html('<small style="color:red;">Please Enter UserName </small>');
        $("#stuname").focus();
        return false;
    }
    else if(stuemail.trim()=="")
    {
        $("#statusMsg2").html('<small style="color:red;">Please Enter Email </small>');
        $("#stuemail").focus();
        return false;
    }
    else if(stuemail.trim() != "" && !reg.test(stuemail))
    {
        $("#statusMsg2").html('<small style="color:red;">Please Enter Valid Email e.g example@mail.com</small>');
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim()=="")
    {
        $("#statusMsg3").html('<small style="color:red;">Please Enter password</small>');
        $("#stupass").focus();
        return false;
    }
    
    $.ajax({
        url:'student/addstudent.php',
        method:'POST',
        dataType:"json",
        data:{
            stuname : stuname,
            stuemail : stuemail,
            stupass : stupass,
        },
        success:function(data){
            console.log(data);
            if(data=="OK")
            {
                $("#successMsg").html('<span class="alert alert-success">Registation Successful !</span>');
                clearStuRegField();
            }
            else if(data !="OK")
            {
                $("#successMsg").html('<span class="alert alert-danger">Registation Unsuccessful</span>');
            }
        },
    });
}

//Empty All Field and status messege
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

//Ajax call for student login
function checkStuLogin(){
    //console.log("cliked");
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();
    $.ajax({
        url : 'student/addstudent.php',
        method:'POST',
        data:{
            checkLogemail:"checklogmail",
            stuLogEmail:stuLogEmail,
            stuLogPass:stuLogPass,
        },
        success:function(data){
            //console.log(data);
            if(data == 0)
            {
                $("#statusLogMsg").html('<span class="alert alert-danger"> Invalid Email or Password !</span>');
            }
            else if(data !== 0)
            {
                $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"><span class="sr-only">Loading...</span></div>');
                setTimeout(()=>{
                    window.location.href = "index.php";
                }, 1000);
            }
        }
    });
}