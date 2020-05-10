function addTaskForm(a){
    if (document.getElementById("addform").style.display=="block"){
        document.getElementById("addform").style.display="none";
        document.getElementById("plus").textContent = "+";
    }
    else{
        document.getElementById("addform").style.display="block";
        document.getElementById("plus").textContent = "-";
    }
}

function changeTask(){
    document.getElementById('inptask').readonly='false';
}