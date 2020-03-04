/*
*  Banner
*/

let form = document.querySelector('#form_trial');

// Get data from and send it for processing to /mailsendler/mailsendler.php
form.addEventListener('submit', function (evt) {
    evt.preventDefault();

    // Get the values
    let name = document.getElementById("name");
    let phone = document.getElementById("phone");
    let mail = document.getElementById("mail");

    // let phone_validate = new RegExp('[0-9]+$');
    
    function validateForm(name, phone, mail) {
        let result = true;


        let name_validate = new RegExp(/^\D+$/);
        let phone_validate = new RegExp('^[0-9]{7,}$');


        if (name.value == '') {
            showError('Enter your name.', 'name');
            result = false;
        }
        if (!name_validate.test(name.value) && name.value !== '') {
            name.value = '';
            showError('Wrong name.', 'name');
            result = false
        }

        if (phone.value == '') {
            showError('Enter your phone number.', 'phone');
            result = false;
        }

        if (!phone_validate.test(phone.value) && phone.value !== '') {
            phone.value = '';
            showError('Wrong number type.', 'phone');
            result = false;
        }

        if (mail.value == '') {
            showError('Enter your e-mail.', 'mail');
            result = false;
        }



        // fuinction Create error placeholder
        function showError(text, elem) {
            let error = document.getElementById(elem);
            error.placeholder = text;
        }


        return result;
    }

    //Validation
    if(validateForm(name, phone, mail) == false){
        //execute showExeption
    } else {
        // Generate final data to send
        let formData = {
            name: name.value,
            phone: phone.value,
            mail: mail.value,
        };


        let request = new XMLHttpRequest();

        request.addEventListener('load', function () {
            // In this part of the code, you can handle the response from the server
            // console.log(request.response);
            alert('Your application has been sent successfully!');

        });

        // Clear values
        document.getElementById("name").value = '';
        document.getElementById("phone").value = '';
        document.getElementById("mail").value = '';

        // Send data to /mailsendler/mailsendler.php
        request.open('POST', '/mailsendler/mailsendler.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.send('name=' + encodeURIComponent(formData.name)
            + '&phone=' + encodeURIComponent(formData.phone)
            + '&mail=' + encodeURIComponent(formData.mail)
        );

    }
});