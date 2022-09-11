class codeExecutableControl{
    constructor(codeElmentId,outputElmentId){
        function runCode(evt) {
            evt.preventDefault();
            let codeText = document.getElementById(codeElmentId).value;
            let outputObject = document.getElementById(outputElmentId);
            let url = "/api/run"
            $.ajax({
            type: "POST",
            url: url,
            data: {code: codeText},
            success: function(response){
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
                alert("Something went wrong, please try again later!")
            }
            });
        }

        document.getElementById('code-form').addEventListener(
            'submit', runCode, false
        );
    }
}