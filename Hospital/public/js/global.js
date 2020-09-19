const firstName = document.querySelector('#firstname');
const lastName = document.querySelector('#lastname');
const permanentAddress = document.querySelector('#permanentAddress');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confPassword');
const phoneNumber = document.querySelector('#phone_number');
const dateOfBirth = document.querySelector('#dateOfBirth');
const bloodGroup = document.querySelector('#blood_group');
const newEmail = document.querySelector('#newEmail');
const newPassword = document.querySelector('#new_password');
const ConfirmNewPass = document.querySelector('#confirm_new_password');
let errorNumber;



const isEmail = email => {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
};


const isValidPassword = password => {

    const lowerCase = /[a-z]/g;
    const upperCase = /[A-Z]/g;
    const numbers = /[0-9]/g;

    if(password.match(lowerCase) && password.match(upperCase) 
        && password.match(numbers) && password.length > 8){
            return true;
    }

    return false;
};


const setErrorMessage = (input,message) => {
    errorNumber++;
    
    const formControl = input.parentElement;
    
    const small = formControl.querySelector('small');

    small.innerText = message;

    formControl.className = 'form-control error';
};


const setSuccesMessage = input => {

    const formControl = input.parentElement;

    formControl.className = 'form-control success';
};

const checkIfEmpty = value => {
    
    const status = value === '' ? true : false;

    return status;
};

const checkError = () => {
    if(errorNumber > 0){
        return false;
    }else{
      
        return true;
    }
}