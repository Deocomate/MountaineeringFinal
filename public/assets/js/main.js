function check(){
    let check = document.getElementById("CheckUpdate");
    if (check.checked) {
        let input = document.getElementsByClassName("form-control");
        let btn = document.querySelector('.btn-warning');
        let message = document.querySelector('b.me-2');
        btn.disabled = false;
        message.innerHTML= "Update on";
        message.classList.add('text-warning')
        for (let index = 0; index < input.length; index++) {
            input[index].disabled = false;
        }
    }else{
        let input = document.getElementsByClassName("form-control");
        let btn = document.querySelector('.btn-warning');
        btn.disabled = true;
        let message = document.querySelector('b.me-2');
        message.innerHTML= "Update off";
        message.classList.remove('text-warning')
        for (let index = 0; index < input.length; index++) {
            input[index].disabled = true;
        }
    }
}
