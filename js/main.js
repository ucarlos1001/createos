// Navegation
const btnHome = document.getElementById('btn-home')
const btnCreate = document.getElementById('btn-create')
const btnManage = document.getElementById('btn-manage')
const homeContainer = document.getElementById('home')
const createContainer = document.getElementById('create')
const manageContainer = document.getElementById('manage')


btnHome.addEventListener('click', () => {

    btnHome.classList.add('selected-item')
    btnCreate.classList.remove('selected-item')
    btnManage.classList.remove('selected-item')

    homeContainer.style.display = 'block'
    createContainer.style.display = 'none'
    manageContainer.style.display = 'none'
    
})

btnCreate.addEventListener('click', () => {

    btnHome.classList.remove('selected-item')
    btnCreate.classList.add('selected-item')
    btnManage.classList.remove('selected-item')

    homeContainer.style.display = 'none'
    createContainer.style.display = 'block'
    manageContainer.style.display = 'none'
    
})

btnManage.addEventListener('click', () => {

    btnHome.classList.remove('selected-item')
    btnCreate.classList.remove('selected-item')
    btnManage.classList.add('selected-item')

    homeContainer.style.display = 'none'
    createContainer.style.display = 'none'
    manageContainer.style.display = 'block'
    
})




const btnUser = document.getElementById('btn-open-user')
let userArea = document.getElementById('user-area')

btnUser.addEventListener('click', () => {
    userArea.style.display = 'block'
})

document.addEventListener('click', event => {
    var isClickInside = userArea.contains(event.target) || btnUser.contains(event.target)

    if (!isClickInside) {
        userArea.style.display = 'none'
    }

})

