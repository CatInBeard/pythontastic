class textareaTabControl{
    constructor(elmentId){
        document.getElementById(elmentId).addEventListener('keydown', function(e) {
            if (e.key == 'Tab') {
            e.preventDefault();
            var start = this.selectionStart;
            var end = this.selectionEnd;
        
            this.value = this.value.substring(0, start) +
                "\t" + this.value.substring(end);
        
            this.selectionStart =
                this.selectionEnd = start + 1;
            }
        });
    }
}