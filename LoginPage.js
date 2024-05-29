const loginBtn = document.querySelector('.login_btn');
const userId = document.querySelector('.user_id');

window.addEventListener('keyup', ()=>{
    const userPw = document.querySelector('.user_pw');
    if(userPw.value.length > 0 && userId.value.length >0 ){
        loginBtn.disabled = false;
        loginBtn.classList.add('active');
    }else{
        loginBtn.disabled = true;
        loginBtn.classList.remove('active');
    }
})



// 로그인 <> 회원가입 탭 움직쓰
let spanOption = document.querySelectorAll(".sign span");

spanOption.forEach(function (span) {
    span.addEventListener("click", function (e) {
        
        //Remove class active
        e.target.parentElement.querySelectorAll(".active").forEach(function (element) {
            element.classList.remove("active");
        });
        //Add class active
        e.target.classList.add("active");
      
       if (e.target.classList.contains("sign-in")) {
         
        document.querySelectorAll(".sign-in-up form").forEach(function (element) {
            element.classList.remove("active");
        });
         
        document.querySelector(".sign-in-form").classList.add("active");
        
       } else {
         
        document.querySelectorAll(".sign-in-up form").forEach(function (element) {
            element.classList.remove("active");
        });
         
        document.querySelector(".sign-up-form").classList.add("active");
       }
    })
})