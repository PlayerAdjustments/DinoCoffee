describe("Nombre que tendrá un set de pruebas", () => {

    it("Nombre de la prueba 1", () => {

        cy.visit("www.google.com"); //va a la página 

        cy.get('#APjFqb').type("Universidad modelo mérida"); //obtiene el elemento css: checkbox, texto, etc.

        cy.wait(1000); //espera explicita, si se puede no hacer en milisegndos

        cy.get('.sbre').click(); //dar click

        cy.get('[lang="es"] > .tF2Cxc > .yuRUbf > :nth-child(1) > [jscontroller="msmzHf"] > a > .LC20lb').click();
    })

    it("Nombre de la prueba 2", () => {

        cy.visit("https://opensource-demo.orangehrmlive.com/web/index.php/auth/login");

        //debe contener
        cy.get('.oxd-text--h5').should('contain', 'Login')
        //revisa de manera precisa que contenga la información dada (palabra exacta)
        cy.get('.oxd-text--h5').should('have.text', 'Login')

        cy.get('.oxd-text--h5').should('contain', 'Log')

        cy.get('.oxd-text--h5').should('have.text', 'Log')

        // cy.get('.oxd-sheet > :nth-child(1)')
    })

})