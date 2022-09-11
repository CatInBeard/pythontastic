class codeExecutableControl{
    constructor(codeElmentId,outputElmentId="code-output",loadingElmentId="loading"){
        function runCode(evt) {

            evt.preventDefault();
            let codeText = document.getElementById(codeElmentId).value;
            let loadingObject = document.getElementById(loadingElmentId);
            let outputObject = document.getElementById(outputElmentId);

            loadingObject.classList.remove("d-none");

            let url = "/api/run"
            $.ajax({
            type: "POST",
            url: url,
            data: {code: codeText},
            success: function(response){
                loadingObject.classList.add("d-none");
                let result ="";
                try{
                    result = JSON.parse(response).result;
                }
                catch(e){
                    return;
                }
                if(outputObject.innerHTML){
                    outputObject.innerHTML = result + "<hr>" + outputObject.innerHTML;
                }
                else{
                    outputObject.innerHTML = result;
                }
            },
            error: function(){
                loadingObject.classList.add("d-none");
                alert("Something went wrong, please try again later!")
            }
            });
        }

        document.getElementById('code-form').addEventListener(
            'submit', runCode, false
        );
    }
}