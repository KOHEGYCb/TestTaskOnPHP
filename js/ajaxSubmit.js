var btn;

function submitLoginForm() {
    if (btn === 0) {
        document.location.href = "registration.php";
    }
    if (btn === 1) {
        var msg = $('#loginForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: msg,
            success: function (data) {
                $('#results').html(data);
            },
            error: function (xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
    if (btn === 2){
        $.ajax({
            type: 'POST',
            url: 'logout.php',
            data: msg,
            success: function (data) {
                $('#results').html(data);
            },
            error: function (xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    }
}

function submitRegForm() {
    var msg = $('#regForm').serialize();
    $.ajax({
        type: 'POST',
        url: 'registrate.php',
        data: msg,
        success: function (data) {
            $('#results').html(data);
        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
}
