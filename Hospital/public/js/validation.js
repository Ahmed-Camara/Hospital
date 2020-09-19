

const validateForm = () => {
    
    errorNumber = 0;

    const firstNameValue = firstName.value.trim();
    const lastNameValue =  lastName.value.trim();
    const permanentAddressValue =  permanentAddress.value.trim();
    const emailValue =  email.value.trim();
    const passwordValue =  password.value.trim();
    const confirmPasswordValue =  confirmPassword.value.trim();
    const phoneNumberValue =  phoneNumber.value.trim();
    const dateOfBirthValue = dateOfBirth.value.trim();
    const bloodGroupValue = bloodGroup.value.trim();

    if(checkIfEmpty(firstNameValue)){
        
        setErrorMessage(firstName,'Please,Enter First Name');
    }else{
        
        setSuccesMessage(firstName);
    }

     if(checkIfEmpty(lastNameValue)){

        setErrorMessage(lastName,'Please,Enter Last Name');
        
    }else{
        setSuccesMessage(lastName);
    }

    if(checkIfEmpty(permanentAddressValue)){
        setErrorMessage(permanentAddress,'Please,Enter Address');
    }else{
        setSuccesMessage(permanentAddress);
    }

    if(checkIfEmpty(emailValue)){
        setErrorMessage(email,'Please,Enter Address Email');
    }else if(!isEmail(emailValue)){
        setErrorMessage(email,'Invalid email format');
    }else{
        setSuccesMessage(email);        
    }

    if(checkIfEmpty(passwordValue)){
        setErrorMessage(password,'Please,Enter password');
    }else if(!isValidPassword(passwordValue)){
        setErrorMessage(password,'password must be at least 8 characters,must contains one uppercase and lowercase letters');
    }else{
        setSuccesMessage(password); 
    }

    if(checkIfEmpty(confirmPasswordValue)){
        setErrorMessage(confirmPassword,'Please,Enter confirm password');
    }else if(passwordValue !== confirmPasswordValue){
        setErrorMessage(confirmPassword,'passwords do not match');
    }else{
        setSuccesMessage(confirmPassword); 
    }

    if(checkIfEmpty(phoneNumberValue)){
        setErrorMessage(phoneNumber,'Please,Enter Phone number');
    }else{
        setSuccesMessage(phoneNumber); 
    }

    if(checkIfEmpty(dateOfBirthValue)){
        setErrorMessage(dateOfBirth,'Please,Enter your date of birth');
    }else{
        setSuccesMessage(dateOfBirth); 
    }

    if(checkIfEmpty(bloodGroupValue)){
        setErrorMessage(bloodGroup,'Please,Enter your blood group');
    }else{
        setSuccesMessage(bloodGroup); 
    }

    return checkError();
}

const changePassword = () => {


    errorNumber = 0;
    const oldPassword = document.querySelector('#oldPass');
    const newPassword = document.querySelector('#newPass');
    const confirmNewPassword = document.querySelector('#confnewPass');

    const oldPasswordValue = oldPassword.value.trim();
    const newPasswordValue = newPassword.value.trim();
    const confirmNewPasswordValue = confirmNewPassword.value.trim();

    if(checkIfEmpty(oldPasswordValue)){
        alert('empty');
        setErrorMessage(oldPassword,"Please,enter old password");
    }else{
        setSuccesMessage(oldPassword);
    }

    if(checkIfEmpty(newPasswordValue)){
        setErrorMessage(newPassword,"Please,enter your new password");
    }else if(!isValidPassword(newPasswordValue)){
        setErrorMessage(newPassword,'password must be at least 8 characters,one uppercase and lowercase letters');
    }else{
        setSuccesMessage(newPassword);
    }

    if(checkIfEmpty(confirmNewPasswordValue)){
        setErrorMessage(confirmNewPassword,'Please,Enter confirm password');
    }else if(newPasswordValue !== confirmNewPasswordValue){
        setErrorMessage(confirmNewPassword,'passwords do not match');
    }else{
        setSuccesMessage(confirmNewPassword); 
    }
    
    return checkError();
}