const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInform=document.getElementById('signIn');
const signUpform=document.getElementById('signUp');

signUpButton.addEventListener('click',function(){
signInform.style.display="none";
signUpform.style.display="block";

})
signInButton.addEventListener('click', function() {
    signUpform.style.display = "none";
    signInform.style.display = "block";
});

  