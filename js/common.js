var form = document.querySelector('#createReviewForm');

// Get data from and send it for processing to /components/main_form.php
form.addEventListener('submit', function (evt) {
    evt.preventDefault();

    // Get the values
    var fullName = document.getElementById("fullName");
    var theme = document.getElementById("theme");
    var review = document.getElementById("review");
    var time = document.getElementsByTagName("time")[0];

    var rates = document.getElementsByName('rate');
    var rate_value;
    for (var i = 0; i < rates.length; i++) {
        if (rates[i].checked) {
            rate_value = rates[i].value;
        }
    }

    //Validation
    if (fullName.value == '' || review.value == '') {
        // Delete all error messages
        deleteErrors(form.querySelectorAll('.form-item'));
        // Below are the checks for the values of the corresponding fields.
        if (fullName.value == '')
            showError('Enter your name.', fullName);

        if (review.value == '')
            showError('Enter post text.', review);

        // fuinction Create error message
        function showError(text, elem) {
            var error = document.createElement('span');
            error.classList.add('error');
            error.innerHTML = text;
            elem.parentElement.appendChild(error);
        }

        // function Delete all error messages
        function deleteErrors(formItems) {
            for (var i = 0; i < formItems.length; i++) {
                var error = formItems[i].querySelector('.error');
                if (error) formItems[i].removeChild(error); // удаляем, если есть
            }
        }

    } else {
        // Generate final data to send
        var formData = {
            fullName: fullName.value,
            theme: theme.value,
            review: review.value,
            date_time: time.dateTime,
            rate_value: rate_value

        };


        var request = new XMLHttpRequest();

        request.addEventListener('load', function () {
            // In this part of the code, you can handle the response from the server
            // console.log(request.response);
            alert('Your application has been sent successfully!');

        });

        // Clear values
        document.getElementById("fullName").value = '';
        document.getElementById("theme").value = 1;
        document.getElementById("review").value = '';

        // Send data to /components/main_form.php
        request.open('POST', './components/main_form.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.send('fullName=' + encodeURIComponent(formData.fullName)
            + '&theme=' + encodeURIComponent(formData.theme)
            + '&review=' + encodeURIComponent(formData.review)
            + '&date_time=' + encodeURIComponent(formData.date_time)
            + '&rate_value=' + encodeURIComponent(formData.rate_value)
        );

    }
});







