// 닉네임
function clearName(inputElement) {
    if (inputElement.value === inputElement.defaultValue) {
        inputElement.value = "";
    }
}

function restoreName(inputElement) {
    if (inputElement.value === "") {
        inputElement.value = inputElement.defaultValue;
    }
}

// 아이디
function clearText(inputElement) {
    if (inputElement.value === inputElement.defaultValue) {
        inputElement.value = "";
    }
}

function restoreText(inputElement) {
    if (inputElement.value === "") {
        inputElement.value = inputElement.defaultValue;
    }
}

function clearPasswordPlaceholder(inputElement) {
    if (inputElement.placeholder === "비밀번호를 입력해주세요." || inputElement.placeholder === "비밀번호를 확인해주세요.") {
        inputElement.placeholder = "";
    }
}

function restorePasswordPlaceholder(inputElement) {
    if (inputElement.placeholder === "") {
        if (inputElement.id === "pw") {
            inputElement.placeholder = "비밀번호를 입력해주세요.";
        } else if (inputElement.id === "pwConfirm") {
            inputElement.placeholder = "비밀번호를 확인해주세요.";
        }
    }
}