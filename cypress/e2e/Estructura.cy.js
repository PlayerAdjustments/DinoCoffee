describe("Nombre que tendrá un set de pruebas", () => {

    it("Nombre de la prueba 1", () => {

        cy.visit("www.google.com");

        cy.get('#APjFqb').type("Universidad modelo mérida");

        cy.wait(1000);

        cy.get('.sbre').click();

        cy.get('[lang="es"] > .tF2Cxc > .yuRUbf > :nth-child(1) > [jscontroller="msmzHf"] > a > .LC20lb').click();
    })

    it("Nombre de la prueba 1", () => {

        cy.visit("https://opensource-demo.orangehrmlive.com/web/index.php/auth/login");

        cy.get('.oxd-text--h5').should('contain', 'Login');

        cy.get('.oxd-text--h5').should('have.text', 'Login');

        cy.get('.oxd-text--h5').should('contain', 'Log');

        cy.get('.oxd-text--h5').should('have.text', 'Log');

    })

})