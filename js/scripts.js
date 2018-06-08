/* Common Functions */

function checksStudent () {
    var userId = document.getElementById("user-id");
    var xmlHttp = new XMLHttpRequest();
    
    xmlHttp.open("GET", "../controller/common.php?action=checksUser&user-id="+userId.value, true);
    xmlHttp.onload = callbackChecksStudent;
    xmlHttp.send();
}

function callbackChecksStudent () {   
    if(this.readyState === 4 && this.status === 200){
        if(this.responseText !== ""){
            $msg = JSON.parse(this.responseText);
            document.getElementById("user-name").value = $msg.name;        
            document.getElementById("user-name").style.backgroundColor = "rgb(235, 235, 228)";
            document.getElementById("enrollment-button").disabled = false;
        }
        else {
            document.getElementById("user-id").value = "";
            document.getElementById("user-name").value = "Aluno Não Cadastrado!";
            document.getElementById("user-name").style.backgroundColor = "rgb(255, 100, 100)";
            document.getElementById("enrollment-button").disabled = true;
        }
    }
}

function alreadyEnrolled () {
    var userId = document.getElementById("user-id");
    var courseId = document.getElementById("id-course");
    var xmlHttp = new XMLHttpRequest();
    
    xmlHttp.open("GET", "../controller/common.php?action=alreadyEnrolled&user-id="+userId.value+"&course-id="+courseId.value, true);
    xmlHttp.onload = callbackAlreadyEnrolled;
    xmlHttp.send();
    return false;
}

function callbackAlreadyEnrolled () {   
    if(this.readyState == 4 && this.status === 200){
        if(this.responseText === "ok"){
            document.enrollmentForm.submit();
        }
        else {
            swal("Aluno já matriculado", "O aluno já é matriculado na disciplina!", "error", {
                 button: "OK"
            });
            return false;
        }
    }
}
