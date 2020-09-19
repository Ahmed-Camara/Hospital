

const changeCredentials = () => {

    errorNumber = 0;
    const em = email.value;
    const newEm = newEmail.value;
    const newPass = newPassword.value;
    const confirNewPassword = ConfirmNewPass.value;

    if(checkIfEmpty(em)){
        setErrorMessage(email,'Please,enter an email address');
    }else if(!isEmail(em)){
        setErrorMessage(email,'Please,enter valid email format');
    }else{
        setSuccesMessage(email);
    }

    if(checkIfEmpty(newEm)){
        setErrorMessage(newEmail,'Please,enter an email address');
    }else if(!isEmail(newEm)){
        setErrorMessage(newEmail,'Please,enter valid email format');
    }else if(em !== newEm){
        setErrorMessage(newEmail,'Please, enter same email address');
    }else{
         setSuccesMessage(newEmail);
    }


    if(checkIfEmpty(newPass)){

        setErrorMessage(newPassword,'Please,enter a password');
    }else if(!isValidPassword(newPass)){
        setErrorMessage(newPassword,'password must be at least 8 characters,one uppercase and lowercase letters');
    }else{
        setSuccesMessage(newPassword);
    }


    if(checkIfEmpty(confirNewPassword)){

        setErrorMessage(ConfirmNewPass,'Please,enter a password');
    }else if(!isValidPassword(confirNewPassword)){
        setErrorMessage(ConfirmNewPass,'password must be at least 8 characters,one uppercase and lowercase letters');
    }else if(newPass !== confirNewPassword){
        setErrorMessage(ConfirmNewPass,'Please,enter same password');
    }else{
        setSuccesMessage(ConfirmNewPass);
    }

    
    return checkError();
};


const updateProfilInformation = () => {

    errorNumber = 0;
    const address = permanentAddress.value.trim();
    const emailValue = email.value.trim();
    const phone = phoneNumber.value.trim();
    const newPass = newPassword.value;
    const confirNewPassword = ConfirmNewPass.value;
    

    if(checkIfEmpty(address)){
        setErrorMessage(permanentAddress,'Please,enter your new permanent address');
    }else{

        setSuccesMessage(permanentAddress);
    }


    if(checkIfEmpty(emailValue)){
        setErrorMessage(email,'Please,enter your new email address');
    }else if(!isEmail(emailValue)){
        setErrorMessage(email,'Please,enter valid email format');
    }else{
        setSuccesMessage(email);
    }


    if(checkIfEmpty(phone)){
        setErrorMessage(phoneNumber,'Please,Enter your new Phone number');
    }else{
        setSuccesMessage(phoneNumber); 
    }


    if(checkIfEmpty(newPass)){

        setErrorMessage(newPassword,'Please,enter a password');
    }else if(!isValidPassword(newPass)){
        setErrorMessage(newPassword,'password must be at least 8 characters,one uppercase and lowercase letters');
    }else{
        setSuccesMessage(newPassword);
    }


    if(checkIfEmpty(confirNewPassword)){

        setErrorMessage(ConfirmNewPass,'Please,enter a password');
    }else if(!isValidPassword(confirNewPassword)){
        setErrorMessage(ConfirmNewPass,'password must be at least 8 characters,one uppercase and lowercase letters');
    }else if(newPass !== confirNewPassword){
        setErrorMessage(ConfirmNewPass,'Please,enter same password');
    }else{
        setSuccesMessage(ConfirmNewPass);
    }

    return checkError();
};
