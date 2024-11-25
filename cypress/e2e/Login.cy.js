describe("Nombre que tendrá el set de pruebas", () => {
    it('Login Correcto', () =>  {
        cy.visit('https://opensource-demo.orangehrmlive.com/web/index.php/auth/login');
        cy.get(':nth-child(2) > .oxd-input-group > :nth-child(2) > .oxd-input').type('Admin');
        cy.get(':nth-child(3) > .oxd-input-group > :nth-child(2) > .oxd-input').type('admin123');
        cy.get('.oxd-button').click();
        cy.get(':nth-child(1) > .oxd-main-menu-item').click();
        cy.get('.orangehrm-header-container > .oxd-button').click();
        cy.get(':nth-child(1) > .oxd-input-group > :nth-child(2) > .oxd-select-wrapper > .oxd-select-text > .oxd-select-text--after > .oxd-icon').click();
        cy.get('.oxd-select-dropdown > :nth-child(2)').click();
        cy.get(':nth-child(3) > .oxd-input-group > :nth-child(2) > .oxd-select-wrapper > .oxd-select-text').click();
        cy.get('.oxd-select-dropdown > :nth-child(2)').click();
        cy.get('.oxd-autocomplete-text-input > input').type('a');
        cy.wait(1500);
        cy.get('.oxd-autocomplete-dropdown > :nth-child(1)').click();        
        cy.get(':nth-child(4) > .oxd-input-group > :nth-child(2) > .oxd-input').type('ccadenasssss');
        cy.get('.user-password-cell > .oxd-input-group > :nth-child(2) > .oxd-input').type('Cadena5');
        cy.get(':nth-child(2) > .oxd-input-group > :nth-child(2) > .oxd-input').type('Cadena5');
        cy.get('.oxd-button--secondary').click();
        cy.get('.oxd-text--toast-title').should('contain', 'Success');
      })
  })