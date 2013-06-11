
$('tr.parent')
    .css("cursor","pointer")
    .attr("title","Click to show attendances table")
    .click(function(){
        $(this).siblings('.child-'+this.id).toggle();
        var oTable = $('#children_list').dataTable();
        //oTable.fnDraw();
    });
$('tr[class^=child-]').hide().children('td');

$("#attendance_date").datepicker({dateFormat: 'yy-mm-dd'});
$("#attendance_date").datepicker("setDate" , new Date());
$("#user_attendance_date").datepicker({dateFormat: 'yy-mm-dd'});
$("#user_attendance_date").datepicker("setDate" , new Date());

$("#create_assistance").click(function(){
    $('#createAssistance').modal('show');
});

$("#create_user_attendance_form").on('click','.submit', function(evt){
    evt.preventDefault();
    var self = this;
    var hours = $("#hours").val();
    var date = $("#user_attendance_date").val();
    if(hours===''){
        $("#create_user_attendance_form .message").html('Please add hours').css("display", 'block');
    } else {
        if (date==='') {
            $("#create_user_attendance_form .message").html('Please select date').css("display", 'block');
        }else{
            $("#create_user_attendance_form").submit();
        }
    }
});

$("#create_program").click(function(){
    $('#createProgram').modal('show');
});

$("#create_program_form").on('click','.submit', function(evt){
    evt.preventDefault();
    var self = this;
    var universityId = $("#university_selector").val();
    var name = $("#name").val();
    if(universityId===''){
        $("#create_program_form .message").html('Please select one university').css("display", 'block');
    } else if (name === '') {
        $('#create_program_form .message').html('Type the program name').css("display", 'block');
    } else {
        $("#create_program_form").submit();
    }
});

$("#create_classroom").click(function(){
    $('#createClassroom').modal('show');
});

$("#create_classroom_form").on('click','.submit', function(evt){
    evt.preventDefault();
    var self = this;
    var programId = $("#program_selector").val();
    var name = $("#class_name").val();
    if(programId===''){
        $("#create_classroom_form .message").html('Please select one program').css("display", 'block');
    } else if (name === '') {
        $('#create_classroom_form .message').html('Type the classroom name').css("display", 'block');
    } else {
        $("#create_classroom_form").submit();
    }
});

$("#create_user_attendance").click(function(){
    $('#createUserAssistance').modal('show');
});

$("#create_university").click(function(){
    $('#createUniversity').modal('show');
});

$("#create_university_form").on('click','.submit', function(evt){
    evt.preventDefault();
    var self = this;
    var regionId = $("#region_selector").val();
    var universityName = $("#university_name").val();
    if(regionId===''){
        $("#create_university_form .message").html('Please select one region').css("display", 'block');
    } else if (universityName === '') {
        $('#create_university_form .message').html('Type the university name').css("display", 'block');
    } else {
        $("#create_university_form").submit();
    }
});

$("#create_child").click(function(){
    $('#createChild').modal('show');
});

$("#createChild form").submit(function(e){
    e.preventDefault();
    var self = this;
    var data = $(self).serialize();
    $.post('/children/create', data, function(data){
        if(data.message != null){
            //alert(data.message);
            $('.message').show();
            $('.message', self).removeClass('hidden').html(data.message)
        }else{
            $('#createChild').modal('hide');
        }
    }, 'json')
});

$("#updateChildModal form").submit(function(e){
    e.preventDefault();
    var self = this;
    var data = $(self).serialize();
    $.post('/children/update', data, function(data){
        if(data.message != null){
            //alert(data.message);
            $('.message').show();
            $('.message', self).removeClass('hidden').html(data.message)
        }else{
            $('#updateChildModal').modal('hide');
        }
    }, 'json')
});

$('.updateChildEnabler').on('click', function(e){
    $data = $(this).data();
    $('#child_id').val($data.childid);
    $('#id_number').val($data.childidnumber);
    $('#child_last_name').val($data.childlastname);
    $('#child_first_name').val($data.childfirstname);
    $('#child_last_initial').val($data.childlastinitial);
    $('#updateChildModal').modal('show')
})


//**********DELETE CHILD MODAL**********
$(".deleteChild").click(function(e){
    e.preventDefault();
    var childId = $(this).data('childid');
    //alert(attendanceId);
    $('#delete_child_id').val(childId);
    $('#deleteChildModal').modal('show')
});

//**********UPDATE PROGRAM MODAL**********
$(".updateProgram").click(function(e){
    e.preventDefault();
    var programId = $(this).data('programid');
    var programName = $(this).data('programname');
    //alert(programName);
    var universityId = $(this).data('universityid');
    $('#program_id').val(programId);
    $('#university_id').val(universityId);
    $('#program_name').val(programName);
    $('#updateProgramModal').modal('show')
});

//**********UPDATE CLASSROOM MODAL**********
$(".updateClassroom").click(function(e){
    e.preventDefault();
    var classroomId = $(this).data('classroomid');
    var classroomName = $(this).data('classroomname');
    //alert(programName);
    var programId = $(this).data('programid');
    $('#classroom_id').val(classroomId);
    $('#program_id').val(programId);
    $('#classroom_name').val(classroomName);
    $('#updateClassroomModal').modal('show')
});

//**********UPDATE UNIVERSITY MODAL**********
$(".updateUniversity").click(function(e){
    e.preventDefault();
    var universityId = $(this).data('universityid');
    var universityName = $(this).data('universityname');
    //alert(universityName);
    var regionId = $(this).data('regionid');
    $('#university_id').val(universityId);
    $('#region_id').val(regionId);
    $('#uni_name').val(universityName);
    $('#updateUniversityModal').modal('show')
});

//**********UPDATE USER MODAL**********
$(".updateUser").click(function(e){
    e.preventDefault();
    var userId = $(this).data('userid');
    var userFirstName = $(this).data('userfirstname');
    var userLastName = $(this).data('userlastname');
    var userName = $(this).data('username');
    var userPassword = $(this).data('userpassword');
    var userEmail = $(this).data('useremail');
    var userClassroomId = $(this).data('userclassroomid');
    var userUniversityId = $(this).data('useruniversityid');
    var userRegionId = $(this).data('userregionid');
    //alert(universityName);
    $('#user_id').val(userId);
    $('#user_first_name').val(userFirstName);
    $('#user_last_name').val(userLastName);
    $('#user_name').val(userName);
    $('#user_password').val(userPassword);
    $('#user_email').val(userEmail);
    $('#user_classroom_id').val(userClassroomId);
    $('#user_university_id').val(userUniversityId);
    $('#user_region_id').val(userRegionId);
    $('#updateUserModal').modal('show')
});

//**********CREATE USER MODAL**********
$("#create_user").click(function(){
    $('#createUser').modal('show');
});

$("#role_select").change(function()
{
    var role = $(this).attr('value');
    if (role == 'CORP_MEMBER' || role == 'TEAM_LEAD') {
        $("#user_classroom_selector").removeAttr('disabled');
        $("#user_region_selector").attr('disabled', 'disabled');
        $("#user_university_selector").attr('disabled', 'disabled');
    }else{
        if (role == 'SITE_MANAGER') {
            $("#user_classroom_selector").attr('disabled', 'disabled');
            $("#user_region_selector").attr('disabled', 'disabled');
            $("#user_university_selector").removeAttr('disabled');
        }else{
            if (role == 'PROJECT_DIRECTOR') {
                $("#user_classroom_selector").attr('disabled', 'disabled');
                $("#user_region_selector").removeAttr('disabled');
                $("#user_university_selector").attr('disabled', 'disabled');
            }else{
                $("#user_classroom_selector").attr('disabled', 'disabled');
                $("#user_region_selector").attr('disabled', 'disabled');
                $("#user_university_selector").attr('disabled', 'disabled');
            }
        }
    }
});

//**********DELETE USER MODAL**********
$(".deleteUser").click(function(e){
    e.preventDefault();
    var userId = $(this).data('userid');
    //alert(attendanceId);
    $('#delete_user_id').val(userId);
    $('#deleteUserModal').modal('show')
});

//*******CHANGE PASSWORD************
$('.password_change_edit').css('display', 'none');
$("#password_change").click(function(e){
    e.preventDefault();
    $('.password_change_edit').css('display', 'inline');
});

$("#createAssistance form").submit(function(e){
    e.preventDefault();
    var self = this;

    var childId = $("#children_selector").val();
    var attendanceDate = $("#attendance_date").val();
    if(childId===''){
        $("#create_attendance_form .message").html('Please select one child').css("display", 'block');
    }else if (attendanceDate==='') {
        $('#create_attendance_form .message').html('Select date').css("display", 'block');
    }else{
        var data = $(self).serialize();
        $.post('/attendances/create', data, function(data){
            if(data.message != null){
                //alert(data.message);
                $('.message').show();
                $('.message', self).removeClass('hidden').html(data.message)
            }else{
                $('#createAssistance').modal('hide');
            }
        }, 'json')
    }
});


$("#createUser form").submit(function(e){
    e.preventDefault();
    var self = this;
    var data = $(self).serialize();
    var regionId = $("#user_region_selector").val();
    var universityId = $("#user_university_selector").val();
    var classroomId = $("#user_classroom_selector").val();
    var firstName = $("#create_first_name").val();
    var lastName = $("#create_last_name").val();
    var username = $("#create_username").val();
    var email = $("#create_email").val();
    var roleName = $("#role_select").val();
    var password = $("#create_password").val();
    var passwordConfirm = $("#create_password_confirm").val();

    if(universityId==='' && roleName === 'SITE_MANAGER'){
        $("#create_user_form .message").html('Please select one university').css("display", 'block');
    }else if (password.length < 8) {
        $('#create_user_form .message').html('Password should be 8 characters long').css("display", 'block');
    }else if (password != passwordConfirm) {
        $('#create_user_form .message').html('Passwords should match').css("display", 'block');
    } else if (regionId === '' && roleName === 'PROJECT_DIRECTOR') {
        $('#create_user_form .message').html('Please select one region').css("display", 'block');
    } else if (classroomId === '' && (roleName === 'CORP_MEMBER' || roleName === 'TEAM_LEAD')) {
        $('#create_user_form .message').html('Please select one classroom').css("display", 'block');
    } else if (firstName === '') {
        $('#create_user_form .message').html('Please type the first name').css("display", 'block');
    } else if (lastName === '') {
        $('#create_user_form .message').html('Please type the last name').css("display", 'block');
    } else if (username === '') {
        $('#create_user_form .message').html('Please type the username').css("display", 'block');
    } else if (password === '') {
        $('#create_user_form .message').html('Please type the password').css("display", 'block');
    }else{
        $.post('/users/create', data, function(data){
            if(data.message != null){
                //alert(data.message);
                $('.message').show();
                $('.message', self).removeClass('hidden').html(data.message)
            }else{
                $('#createUser').modal('hide');
            }
        }, 'json')
    }
});
//*******get attendances when user click over child info***********
$('.parent').bind('click', function()
{
    //alert($(this).attr('id'));
    var $element = $(this);
    var elementData = $element.data();
    $.ajax({
        type: "GET",
        url: "/attendances/attendancesByChild/"+elementData.id+"/"+elementData.role,
        dataType: 'html',
        beforeSend: function() {
            //alert("loading");
            $('#div_attendances').html('<div class="rating-flash" id="loading_div"></div>');
        },
        error: function(msg){
            //alert(msg);
        },
        success: function(data){
            // $('#children_list').after(data);
            if(!data){
                data = "<strong>No data available</strong>"
            }
            $('.detail_table_wrapper').fadeOut(function (argument) {
                $(this).css('visibility', 'visible')
                    .find('.data')
                    .html('')
                    .html(data)
                    .end()
                    .fadeIn();
            })
        }
    });
});

//**********DELETE USER ATTENDANCE MODAL**********
$(".deleteUserAttendance").click(function(e){
    e.preventDefault();
    var attendanceId = $(this).data('attendanceid');
    //alert(attendanceId);
    $('#delete_attendance_id').val(attendanceId);
    $('#deleteUserAttendanceModal').modal('show')
});

$("#attendance_date_update").datepicker({dateFormat: 'yy-mm-dd'});

$("#update_user_attendance_form").on('click','.submit', function(evt){
    evt.preventDefault();
    var self = this;
    var hours = $("#attendance_hours").val();
    var date = $("#attendance_date_update").val();
    if(hours===''){
        $("#update_user_attendance_form .message").html('Please add hours').css("display", 'block');
    } else {
        if (date==='') {
            $("#update_user_attendance_form .message").html('Please select date').css("display", 'block');
        }else{
            $("#update_user_attendance_form").submit();
        }
    }
});

$('.editProfileEnabler').on('click', function(e){
    $data = $(this).data();
    $('#profile_user_id').val($data.userid);
    $('#profile_user_first_name').val($data.userfirstname);
    $('#profile_user_last_name').val($data.userlastname);
    $('#profile_user_email').val($data.useremail);
    $('#editProfileModal').modal('show')
})

$("#editProfileModal form").submit(function(e){
    e.preventDefault();
    var self = this;
    var data = $(self).serialize();
    $.post('/users/editProfile', data, function(data){
        if(data.message != null){
            //alert(data.message);
            $('.message').show();
            $('.message', self).removeClass('hidden').html(data.message)
        }else{
            $('#editProfileModal').modal('hide');
        }
    }, 'json')
});

$('.profile_password_change_edit').css('display', 'none');
$("#profile_password_change").click(function(e){
    e.preventDefault();
    $('.profile_password_change_edit').css('display', 'inline');
});

$("#updateAttendanceModal form").submit(function(e){
    e.preventDefault();
    var self = this;
    var data = $(self).serialize();
    var date = $("#attendance_date_update").val();
    if (date==='') {
        $("#update_attendance_form .message").html('Please select date').css("display", 'block');
    }else{
        $.post('/attendances/update', data, function(data){
            if(data.message != null){
                //alert(data.message);
                $('.message').show();
                $('.message', self).removeClass('hidden').html(data.message)
            }else{
                $('#updateAttendanceModal').modal('hide');
            }
        }, 'json')
    }
});

function updateAttendance(id, number, year, month, day, childId)
{
    $("#attendance_date_update").datepicker({dateFormat: 'yy-mm-dd'});
    $("#attendance_date_update").datepicker("setDate" , year + '-' + month + '-' + day);
    $('#attendance_child_id').val(childId);
    $('#attendance_id').val(id);
    $('#attendance_number').val(number);
    $('#updateAttendanceModal').modal('show')
}

function deleteAttendance(id)
{
    var attendanceId = id;
    //alert(attendanceId);
    $('#delete_attendance_id').val(attendanceId);
    $('#deleteAttendanceModal').modal('show')
}

$("#exportReport").click(function(){
    $('#selectReport').modal('show');
});

$("#create_report_button").click(function() {
    $('#selectReport').modal('hide');
});


