


// Show Password
function showPassword() {
    const passwordInput = document.getElementById('password')
    const btnChange = document.querySelector('.show-password')

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'
        passwordInput.placeholder = 'Ex: GgTi0Cxmk#zQ'
        btnChange.innerHTML = 'Esconder senha'
    } else {
        passwordInput.type = 'password'
        passwordInput.placeholder = 'Ex: ************'
        btnChange.innerHTML = 'Mostrar senha'
    }

}

// Login container variables
const login = document.getElementById('login')
const containerLogin = document.getElementById('container-login')

const openChange = document.getElementById('open-change')
const changePassword = document.getElementById('change-password')

// password change request function
openChange.addEventListener('click', (e) => {

    console.log(e)

    changePassword.style.display = 'block'
    document.body.style.overflow = 'hidden'
    containerLogin.classList.add('remove-container')

    containerLogin.addEventListener('animationend', event => {
        if (event.animationName === 'slideOutRight') {
            login.style.display = 'none'
            document.body.style.overflow = 'auto'
            containerLogin.classList.remove('remove-container')
        }
    })

    document.addEventListener('click', event => {
        var isClickInside = changePassword.contains(event.target) || openChange.contains(event.target)
        
        if (!isClickInside) {
            changePassword.classList.add('remove-change-password')

            changePassword.addEventListener('animationend', eventAnimation => {
                if (eventAnimation.animationName === 'slide-top') {
                    login.style.display = 'block'
                    changePassword.classList.remove('remove-change-password')
                    changePassword.style.display = 'none'
                }
            })
        }
        
    })
})


const btnSubmit = document.getElementById('btn-submit')
const processLogin = document.getElementById('process-login')

// Submit
btnSubmit.addEventListener('click', event => {
    event.preventDefault()

    const userValue = document.getElementById('user')
    const passwordValue = document.getElementById('password')

    const errorArea = document.querySelector('.error-area')
    const textError = errorArea.querySelector('p > span')
    var stateValidation = false

    function addErrorArea(message) {
        containerLogin.style.display = 'block'
        processLogin.innerHTML = ``
        errorArea.style.display = 'block'
        textError.innerHTML = message
    }

    if (userValue.value === '' || passwordValue.value === '') {
        addErrorArea('Preencha os campos obrigatórios!')
        stateValidation = true
    }

    if (userValue.value.length > 32 || passwordValue.value.length > 32) {
        addErrorArea('Os campos aceita somente 32 caracteres!')
        stateValidation = true
    }

    if (!stateValidation) {

        containerLogin.style.display = 'none'
        processLogin.innerHTML = `
        <img src="midia/loading.gif" alt="Um gif de um Foguete">
        <h1>Trabalhando...</h1>
        `

        let xhr = new XMLHttpRequest()
        let userValue = document.getElementById('user')
        let passwordValue = document.getElementById('password')

        xhr.open('POST', 'http://localhost/OS/process/login.php')
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xhr.send(`user=${userValue.value}&password=${passwordValue.value}`)


        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = xhr.response
                console.log(data)

                if (data === 'sucess') {
                    window.location.href = "painel/";
                }

                if (data === 'error') {
                    addErrorArea('Os dados estão incorretos!')
                }

                if (data === 'noData') {
                    addErrorArea('Erro!')
                }
            }
        }

    }
})


