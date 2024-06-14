describe('Cypress Example test', () => {
    //tgis is an indiidual test case 
    it('Visits the Cypress example page, type email address and assert input field', () => {
  
    //Visit the page
      cy.visit('https://example.cypress.io/commands/actions')

      // Query for the email input field 
      cy.get('input[type="email"]').as('emailInput')

      //Type email address
      const emailAddress = 'example@example.com'
      cy.get('@emailInput').type(emailAddress)

      //Assert about the content of the input field
      cy.get('@emailInput').should('have.value' , emailAddress)
        
    
  
    })
  })