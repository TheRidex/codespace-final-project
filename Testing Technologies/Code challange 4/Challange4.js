//get a random number
let x = Math.random() * 10;
//round the number
let RandomNum = Math.round(x);
//ask the player for the number to guess
let guess = prompt("Please enter the number you guessed.");
//Check wether the number is higher or lower than the correct answer, if so "continue" to restart the loop, otherwise you win the game.
while(guess != RandomNum){
    if(guess < RandomNum){
        console.log("you answered " + guess + " try higher");
    continue;
}
    else if(guess > RandomNum){
    console.log("you answered " + guess + " try lower");
    continue;
}else{
    console.log("you answered " + guess + " this is the correct answer");
}
}