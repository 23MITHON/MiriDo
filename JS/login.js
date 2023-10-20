// input창을 click하면 value 삭제
function clearText(inputElement) {
    if (inputElement.value === inputElement.defaultValue) {
        inputElement.value = "";
    }
}

// 다시 input창을 click하면 value 나오게
function restoreText(inputElement) {
    if (inputElement.value === "") {
        inputElement.value = inputElement.defaultValue;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var pwField = document.getElementById('pw');

    pwField.addEventListener('focus', function() {
        if (pwField.value === '비밀번호를 입력해주세요.') {
            pwField.value = '';
        }
    });

    pwField.addEventListener('blur', function() {
        if (pwField.value === '') {
            pwField.value = '비밀번호를 입력해주세요.';
        }
    });

    pwField.addEventListener('input', function() {
        var inputValue = pwField.value;
        var maskedValue = '*'.repeat(inputValue.length);
        pwField.value = maskedValue;
    });
});