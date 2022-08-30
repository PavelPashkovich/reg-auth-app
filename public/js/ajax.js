function register() {
    event.preventDefault();
    let data = {
        name: document.getElementById('user_name').value,
        login: document.getElementById('login').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        passwordConfirm: document.getElementById('password-confirm').value,
    };

    jQuery.ajax({
        type: "POST",
        url: '/add-user',
        data: data,
        success: function (response) {
            let response_parsed = JSON.parse(response);
            if (response_parsed.length === 0) {
                window.location.href = "/login";
            } else {
                for (let key in response_parsed) {
                    let message = document.getElementById(key);
                    message.removeAttribute('hidden');
                    message.innerHTML = "* " + response_parsed[key];
                }
            }
        }
    });
}

function login_f() {
    event.preventDefault();
    let data = {
        login: document.getElementById('login_auth').value,
        password: document.getElementById('password_auth').value,
    };

    jQuery.ajax({
        type: "POST",
        url: '/check-user',
        data: data,
        success: function (response) {
            let response_parsed = JSON.parse(response);
            if (response_parsed.length === 0) {
                window.location.href = "/profile";
            } else {
                for (let key in response_parsed) {
                    let message = document.getElementById(key);
                    message.removeAttribute('hidden');
                    message.innerHTML = "* " + response_parsed[key];
                }
            }
        }
    });
}

function delete_f() {
    event.preventDefault();
    let data = {
        registered_user_login: document.getElementById('registered_user_login').value,
    };

    jQuery.ajax({
        type: "POST",
        url: '/delete-user',
        data: data,
        success: function (response) {
            window.location.href = "/";
        }
    });
}
