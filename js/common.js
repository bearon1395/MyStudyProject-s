// Create user
let formCreateUser = document.querySelector('#user_create');
formCreateUser.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let surname = document.getElementById("surname");
    let name = document.getElementById("name");
    let mail = document.getElementById("mail");
    let pic = document.getElementById("pic");

    let request = new XMLHttpRequest();

// Generate final data to send
    let formData = {
        surname: surname.value,
        name: name.value,
        mail: mail.value,
        pic: pic,
        request: 'user_create',
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });
    // Clear values
    document.getElementById("surname").value = '';
    document.getElementById("name").value = '';
    document.getElementById("mail").value = '';
    // document.getElementById("pic") = '';

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('surname=' + encodeURIComponent(formData.surname)
        + '&name=' + encodeURIComponent(formData.name)
        + '&mail=' + encodeURIComponent(formData.mail)
        + '&pic=' + encodeURIComponent(formData.pic)
        + '&request=' + encodeURIComponent(formData.request)
    );
});

// Update user
let formUpdateUser = document.querySelector('#user_update');
formUpdateUser.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let id_user = document.getElementById("id_user_upd");
    let surname = document.getElementById("surname_upd");
    let name = document.getElementById("name_upd");
    let mail = document.getElementById("mail_upd");
    let pic = document.getElementById("pic_upd");

    let request = new XMLHttpRequest();

// Generate final data to send
    let formData = {
        id_user: id_user.value,
        surname: surname.value,
        name: name.value,
        mail: mail.value,
        pic: pic,
        request: 'user_update',
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });
    // Clear values
    document.getElementById("id_user_upd").value = '';
    document.getElementById("surname_upd").value = '';
    document.getElementById("name_upd").value = '';
    document.getElementById("mail_upd").value = '';
    // document.getElementById("pic") = '';

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send( 'id_user=' + encodeURIComponent(formData.id_user)
        + '&surname=' + encodeURIComponent(formData.surname)
        + '&name=' + encodeURIComponent(formData.name)
        + '&mail=' + encodeURIComponent(formData.mail)
        + '&pic=' + encodeURIComponent(formData.pic)
        + '&request=' + encodeURIComponent(formData.request)
    );
});

// Delete user
let formDeleteUser = document.querySelector('#user_delete');
formDeleteUser.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let id_user = document.getElementById("id_user");

    let request = new XMLHttpRequest();
    // Generate final data to send
    let formData = {
        id_user: id_user.value,
        request: 'user_delete'
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });
    // Clear values
    document.getElementById("id_user").value = '';

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('id_user=' + encodeURIComponent(formData.id_user)
        + '&request=' + encodeURIComponent(formData.request)
    );
});

//Add Student to course
let formAddUserToCourse = document.querySelector('#add_user_to_course');
formAddUserToCourse.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let course = document.getElementById("course_add_selector");
    let student = document.getElementById("student_add_selector");

    let request = new XMLHttpRequest();

// Generate final data to send
    let formData = {
        course: course.value,
        student: student.value,
        request: 'add_user_to_course',
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('course=' + encodeURIComponent(formData.course)
        + '&student=' + encodeURIComponent(formData.student)
        + '&request=' + encodeURIComponent(formData.request)
    );
});

//Remove Student from course
let formRemoveUserFromCourse = document.querySelector('#delete_user_from_course');
formRemoveUserFromCourse.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let course = document.getElementById("course_delete_selector");
    let student = document.getElementById("student_delete_selector");

    let request = new XMLHttpRequest();

// Generate final data to send
    let formData = {
        course: course.value,
        student: student.value,
        request: 'delete_user_from_course',
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('course=' + encodeURIComponent(formData.course)
        + '&student=' + encodeURIComponent(formData.student)
        + '&request=' + encodeURIComponent(formData.request)
    );
});

//Add course
let formAddCourse = document.querySelector('#add_course');
formAddCourse.addEventListener('submit', function (evt) {
    evt.preventDefault();
    let course = document.getElementById("add_course_selector");
    let lecturer = document.getElementById("add_lecturer_selector");

    let request = new XMLHttpRequest();

// Generate final data to send
    let formData = {
        course: course.value,
        lecturer: lecturer.value,
        request: 'add_course',
    };
    request.addEventListener('load', function () {
        alert('Your application has been sent successfully!');

    });

    request.open('POST', './classes/CoursesData.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.send('course=' + encodeURIComponent(formData.course)
        + '&lecturer=' + encodeURIComponent(formData.lecturer)
        + '&request=' + encodeURIComponent(formData.request)
    );
});
