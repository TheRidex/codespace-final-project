describe('RPS Game', () => {
  //Open the URL before each test
  beforeEach(() => {
    cy.visit('http://127.0.0.1:5500/e2e/RPS%20Game-1.html')
    //Assign alias to the option buttons
    cy.get('[data-cy="rock"]').as('rock')
    cy.get('[data-cy="paper"]').as('paper')
    cy.get('[data-cy="Scissors"]').as('Scissors')
    // Assing this to the user otion, computer-option and the result elements
    cy.get('[data-cy="user-option"]').as('userOption')
    cy.get('[data-cy="computer-option"]').as('computerOption')
    cy.get('[data-cy="result"]').as('result')

  })
  //Play the game with the 'Rock' option and check the result
  it('Play the game with the Rock result', () => {
    //Click on the 'Rock' button should exist
    cy.get('@rock').should('exist').click()

    //Check that the user option is set to 'Rock'
    cy.get('@userOption').should('have.text', "Rock")


    //Check for the computer option
    cy.get('@computerOption').then((option) =>{

      //if the computer option is set for Rock 
      if(option.text().includes("Rock")){
        //The result is a tie
        cy.get('@result').contains("It is a tie!")
      }
      //If the computer option is set to Paper
      else if ((option.text().includes("Paper"))) {
        //Tthe result is a computer wim 
        cy.get('@result').contains("You Lose!")

      }
      //If the computer ootion is set so Scissors
      else{
        //The result is a user win
        cy.get('@result').contains("You win!")

      }
        

      

      //If the computer ootion is set so Scissors
       //The result is a user win

    })
      
    
  })

  //Play the game with the 'Paper' option and check the result
  it('Play the game with the Paper result', () => {
    cy.get('@paper').should('exist').click()

    //Check that the user option is set to 'paper'
    cy.get('@userOption').should('have.text', "Paper")


    //Check for the computer option
    cy.get('@computerOption').then((option) =>{

      //if the computer option is set for paper 
      if(option.text().includes("Paper")){
        //The result is a tie
        cy.get('@result').contains("It is a tie!")
      }
      //If the computer option is set to Rock
      else if ((option.text().includes("Rock"))) {
        //Tthe result is a user wim 
        cy.get('@result').contains("You win!")

      }
      //If the computer ootion is set so Scissors
      else{
        //The result is a user Loss
        cy.get('@result').contains("You Lose!")

      }
        

      

      //If the computer ootion is set so Scissors
       //The result is a user win

    })
  })

  //Play the game with the 'Scissors' option and check the result
  it('Play the game with the Scissors result', () => {
    cy.get('@Scissors').should('exist').click()

    //Check that the user option is set to 'Scissors'
    cy.get('@userOption').should('have.text', "Scissors")


    //Check for the computer option
    cy.get('@computerOption').then((option) =>{

      //if the computer option is set for paper 
      if(option.text().includes("Paper")){
        //The result is a Win
        cy.get('@result').contains("You win!")
      }
      //If the computer option is set to Rock
      else if ((option.text().includes("Rock"))) {
        //Tthe result is a user Loses 
        cy.get('@result').contains("You Lose!")

      }
      //If the computer ootion is set so Scissors
      else{
        //The result is a Tie
        cy.get('@result').contains("It is a tie!")

      }
        

      

      //If the computer ootion is set so Scissors
       //The result is a user win

    })
  })
})