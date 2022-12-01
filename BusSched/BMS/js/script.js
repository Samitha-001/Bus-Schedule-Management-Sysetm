//toggle
// const toggleBtn = document.getElementsByClassName('toggle')[0]
// const navlinks = document.getElementsByClassName('navbar-links')[0]

// toggleBtn.addEventListener('click', () =>{
//     navlinks.classList.toggle('active')
// })

//login-signup-navigation
const login_btn = document.getElementById("lg")
const signup_btn = document.getElementById("sg")
const signup_form = document.querySelector("sign-up-form")
const login_form = document.querySelector("sign-in-form")

    login_btn.addEventListener("click",()=>{
            window.location.href = "login.php"
        })
        

    signup_btn.addEventListener("click", ()=>{
            window.location.href = "signup.php"
        })
