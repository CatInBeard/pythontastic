class codeExecutableControl{
    constructor(elmentId){
        function runCode(evt) {
            evt.preventDefault();
            let codeText = document.getElementById('code').value;
            let outputObject = document.getElementById('code-output');
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
                outputObject.innerHTML = result + "<hr>" + outputObject.innerHTML;
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