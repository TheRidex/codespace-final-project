describe('template spec', () => {
  beforeEach(() =>{
    cy.visit('http://127.0.0.1:5501/CalculatorHTML.html')
  })
  // First we chack that all the numbers can be pressed propperly
  it('Button with number 1 was pressed', () => {
    cy.get('[data-cy="1"]').should('exist').click()
  })
  it('Button with number 2 was pressed', () => {
    cy.get('[data-cy="2"]').should('exist').click()
  })
  it('Button with number 3 was pressed', () => {
    cy.get('[data-cy="3"]').should('exist').click()
  })
  it('Button with number 4 was pressed', () => {
    cy.get('[data-cy="4"]').should('exist').click()
  })
  it('Button with number 5 was pressed', () => {
    cy.get('[data-cy="5"]').should('exist').click()
  })
  it('Button with number 6 was pressed', () => {
    cy.get('[data-cy="6"]').should('exist').click()
  })
  it('Button with number 7 was pressed', () => {
    cy.get('[data-cy="7"]').should('exist').click()
  })
  it('Button with number 8 was pressed', () => {
    cy.get('[data-cy="8"]').should('exist').click()
  })
  it('Button with number 9 was pressed', () => {
    cy.get('[data-cy="9"]').should('exist').click()
  })
  it('Button with . was pressed', () => {
    cy.get('[data-cy="."]').should('exist').click()
  })
  //Resetting the calculator value
  it('calculator reset', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
  })
  //Operators ------
  //Testing Addition
  it('Addition', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="plus"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="equals"]').should('exist').click()
  })
  //Testing subtraction
  it('subtraction', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="minus"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="equals"]').should('exist').click()
  })
  
  //testing Multipication
  it('multiplication', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="multiply"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="equals"]').should('exist').click()
  })
  //testing Division
  it('Division', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="0"]').should('exist').click()
    cy.get('[data-cy="divide"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="equals"]').should('exist').click()
  })
  //Testing percentage
  it('percentage', () => {
    cy.get('[data-cy="AC"]').should('exist').click()
    cy.get('[data-cy="8"]').should('exist').click()
    cy.get('[data-cy="percentage"]').should('exist').click()
  })
})