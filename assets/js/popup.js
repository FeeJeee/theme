document.getElementById("open-modal").addEventListener("click", function (){
    document.getElementById("my-modal").classList.add("open")
})

document.getElementById("close-modal").addEventListener("click", function (){
    document.getElementById("my-modal").classList.remove("open")
    document.getElementById("form").reset()
    document.getElementById('send-status').innerText = ''
    document.getElementById('form-error').innerText = ''
})