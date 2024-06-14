describe('Shopping List', () => {
beforeEach(() => {
  cy.visit('http://127.0.0.1:5500/TaskList.html')
})
//clicks on the text box, Writes a new item and Submits that item in order to add it to the list 
  it('Able to write and submit on the input field', () => {
    cy.get('[data-cy="input"]').should('exist').click()
    .type('Bananas')
    cy.get('[data-cy="submit"]').should('exist').click()
  })
  it('Item successfully deleted after checking the box', () => {
    cy.get('[data-cy="delete1"]').should('exist').click()
  })
})