const validateSignUp = () => {
    const errorMessages = {
        username: "The username can't be empty and must only contain letters",
        phone: "The phone must start with + and contain exactly 9 numbers",
        email: "The email must have a valid format. Ex: applicant@talent.com",
        password: 'The password must contain a ".", "*" or "-", one upper-cased letter and at least 6 characters',
    }
    let usernameValid
    let phoneValid
    let emailValid
    let passwordValid

    const buttonElement = document.getElementById("button")

    const usernameErrorElement = document.getElementById("username-error")
    const phoneErrorElement = document.getElementById("phone-error")
    const emailErrorElement = document.getElementById("email-error")
    const passwordErrorElement = document.getElementById("password-error")

    const enableButton = () => {
        buttonElement.removeAttribute("disabled")
        if (!usernameValid || !phoneValid || !emailValid || !passwordValid) {
            buttonElement.setAttribute("disabled", "disabled")
        }
        if (usernameValid === false) {
            usernameErrorElement.innerText = errorMessages.username
        } else if (usernameValid === true) {
            usernameErrorElement.innerText = ''
        }
        if (phoneValid === false) {
            phoneErrorElement.innerText = errorMessages.phone
        } else if (phoneValid === true) {
            phoneErrorElement.innerText = ''
        }
        if (emailValid === false) {
            emailErrorElement.innerText = errorMessages.email
        } else if (emailValid === true) {
            emailErrorElement.innerText = ''
        }
        if (passwordValid === false) {
            passwordErrorElement.innerText = errorMessages.password
        } else if (passwordValid === true) {
            passwordErrorElement.innerText = ''
        }
    }

    const usernameRegex = /^[a-z]+$/i
    const handleUsernameBlur = (e) => {
        usernameValid = usernameRegex.test(e.target.value)
        enableButton()
    }
    const usernameElement = document.getElementById("username")
    usernameElement.onblur = handleUsernameBlur

    const phoneRegex = /^\+[0-9]{9}$/i
    const handlePhoneBlur = (e) => {
        phoneValid = phoneRegex.test(e.target.value)
        enableButton()
    }
    const phoneElement = document.getElementById("phone")
    phoneElement.onblur = handlePhoneBlur

    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i
    const handleEmailBlur = (e) => {
        emailValid = emailRegex.test(e.target.value)
        enableButton()
    }
    const emailElement = document.getElementById("email")
    emailElement.onblur = handleEmailBlur

    const passwordRegexSpecial = /^.*[\*\-\.].*$/i
    const passwordRegexUpper = /^.*[A-Z].*$/
    const handlePasswordBlur = (e) => {
        if (e.target.value.length > 5) {
            passwordValid = passwordRegexSpecial.test(e.target.value) && passwordRegexUpper.test(e.target.value)
        } else {
            passwordValid = false
        }
        enableButton()
    }
    const passwordElement = document.getElementById("password")
    passwordElement.onblur = handlePasswordBlur
}
