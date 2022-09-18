class codeExecutableControl{
    constructor(formElmentId="code-form", codeElmentId="code", outputElmentId="code-output", loadingElmentId="loading", submitButtonElementId = "submit-button",  url = "/api/run"){
        function runCode(evt) {

            evt.preventDefault();
            let codeText = document.getElementById(codeElmentId).value;
            let loadingObject = document.getElementById(loadingElmentId);
            let outputObject = document.getElementById(outputElmentId);
            let submitButtonObject = document.getElementById(submitButtonElementId);

            loadingObject.classList.remove("d-none");
            submitButtonObject.disabled = true;
            $.ajax({
            type: "POST",
            url: url,
            data: {code: codeText},
            success: function(responseJSON){
                submitButtonObject.disabled = false;
                loadingObject.classList.add("d-none");
                let result ="";
                let runTime = 0;
                try{
                    let response = JSON.parse(responseJSON);
                    result = response.result;
                    runTime = response.runTime;
                }
                catch(e){
                    console.error(e);
                    return;
                }
                let outputText = "<pre>run " + ((runTime)/1000).toFixed(4)  + " seconds:<br>" + result+"</pre>";
                if(outputObject.innerHTML != ""){
                    outputObject.innerHTML = outputText + "<hr>" + outputObject.innerHTML;
                }
                else{
                    outputObject.innerHTML = outputText;
                }
            },
            error: function(){
                submitButtonObject.disabled = false;
                loadingObject.classList.add("d-none");
                alert("Something went wrong, please try again later!")
            }
            });
        }

        document.getElementById(formElmentId).addEventListener(
            'submit', runCode, false
        );
    }
}