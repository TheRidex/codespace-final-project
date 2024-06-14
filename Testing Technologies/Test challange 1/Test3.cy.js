describe('Cypress Example test', () => {
    //tgis is an indiidual test case 
    it('Visits the Cypress example page and perform various actions on the specified elements in the page', () => {
  
    //Visit the page
      cy.visit('https://example.cypress.io/commands/actions')

      //Query for the action button with class ".action-btn" and click on it 
      cy.get('.action-btn').click()

      //Query for the action button with the id"#action-canvas" and click on it
      cy.get('#action-canvas').click()

      //Query for an element wit the id "#action-canvas" and click on the "topleft"
      cy.get('#action-canvas').click('topLeft')

      //Query for an element wit the id "#action-canvas" and click on the "bottomRight"
      cy.get('#action-canvas').click('bottomRight')
    })
  })