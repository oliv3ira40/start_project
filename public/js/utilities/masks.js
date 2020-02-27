$(function() {

    function setCharAt(str, index, num, chr) {
        if(index > str.length-1) return str;
        return str.substr(0,index) + chr + str.substr(index+num);
    }
    
    var time_defition = $(".time_defition");
    if (time_defition.length > 0) {
        var options =  {
            onKeyPress: function(time_defition, event, currentField, options){
                var hours = parseInt(time_defition.substr(4, 2));
                var minutes = parseInt(time_defition.substr(7, 2));

                if (hours > 23) {
                    currentField.val(setCharAt(time_defition, 4, 2, 23));
                }
                
                if (minutes > 59) {
                    currentField.val(setCharAt(time_defition, 7, 2, 59));
                }
            },
        };

        time_defition.mask('000 00:00', options);
    }


    var mask_cpf = $(".mask_cpf");
    if (mask_cpf.length > 0) {
        mask_cpf.mask('00000000000');
    }

});




// SILAS
// String.prototype.replaceContent=function(index, text) {
//     return this.substr(0, index) + text + this.substr((index+text.length));
// }
// Como usar 
// console.log( 'hello'.replaceContent(2, 'LL') );