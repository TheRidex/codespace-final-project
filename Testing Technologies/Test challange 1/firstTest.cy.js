describe('Cypress Example test', () => {
  //tgis is an indiidual test case 
  it('Visits the Cypress example page, queries an element, interacts with it and assert about the content', () => {

  //Visit the page
    cy.visit('https://example.cypress.io')

    //query for an element
    cy.get('.home-list').contains('Querying')

    //Interact with the element
    cy.get('.home-list').contains('Querying').click()

    //Assert about the content on the page
    cy.url().should('include','/commands/querying')

    cy.get('h1').should('contain', 'Querying')

  })
})