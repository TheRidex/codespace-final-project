function clearScreen() {
    document.getElementById("result").value = "";
}
 
// This function displays the values
function display(value) {
    document.getElementById("result").value += value;
}
 

// This function evaluates the expression and returns the result
function calculate() {
    var p = document.getElementById("result").value;
    var q = eval(p);
    document.getElementById("result").value = q;
}

function calculatepecent() {
    var p = document.getElementById("result").value;
    var q = eval(p);
    var r= q/100
    document.getElementById("result").value = r;
}