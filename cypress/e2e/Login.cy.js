describe ("Set de pruebas para iniciar sesión", ()=>{

    it("Iniciar sesión sin credenciales", ()=>{
        cy.visit("https://opensource-demo.orangehrmlive.com/web/index.php/auth/login");
        cy.get('.oxd-button').click();
        cy.wait(1000);
        cy.get(':nth-child(2) > .oxd-input-group > .oxd-text').should('contain', 'Required');
        cy.get(':nth-child(3) > .oxd-input-group > .oxd-text').should('contain', 'Required');
    })

    it("Iniciar sesión correcto", ()=>{
        cy.visit("https://opensource-demo.orangehrmlive.com/web/index.php/auth/login");
        cy.get(':nth-child(2) > .oxd-input-group > :nth-child(2) > .oxd-input').type("Admin");
        cy.get(':nth-child(3) > .oxd-input-group > :nth-child(2) > .oxd-input').type("admin123");
        cy.get('.oxd-button').click();
        cy.wait(1000);
        cy.get('.oxd-topbar-header-breadcrumb > .oxd-text').should('have.text', "Dashboard");
    })

    it("Agregar un usuario", ()=>{
        //entrar a la página e iniciar sesión
        cy.visit("https://opensource-demo.orangehrmlive.com/web/index.php/auth/login");
        cy.get(':nth-child(2) > .oxd-input-group > :nth-child(2) > .oxd-input').type("Admin");
        cy.get(':nth-child(3) > .oxd-input-group > :nth-child(2) > .oxd-input').type("admin123");
        cy.wait(1000);
        cy.get('.oxd-button').click();
        //ingresar al panel de dashboard
        cy.wait(1000);
        cy.get(':nth-child(1) > .oxd-main-menu-item').click();
        cy.wait(1000);
        cy.get('.orangehrm-header-container > .oxd-button').click();
        cy.wait(1000);
        //seleccionar un rol
        cy.get(':nth-child(1) > .oxd-input-group > :nth-child(2) > .oxd-select-wrapper > .oxd-select-text > .oxd-select-text-input').type("a");
        cy.get('.--focused').click();
        //seleccionar un estatus
        cy.get(':nth-child(3) > .oxd-input-group > :nth-child(2) > .oxd-select-wrapper > .oxd-select-text > .oxd-select-text-input').type("e");
        cy.get('.--focused').click();
        //seleccionar un usuario
        cy.get('.oxd-autocomplete-text-input > input').type("a");
        cy.wait(1500);
        cy.get('.oxd-autocomplete-dropdown > :nth-child(1)').click();
        //agregar nombre de usuario
        cy.get(':nth-child(4) > .oxd-input-group > :nth-child(2) > .oxd-input').type("Ceviche Porfirio Vargas");
        //agregar contraseña
        cy.get('.user-password-cell > .oxd-input-group > :nth-child(2) > .oxd-input').type("ceviche#1");
        //confirmar contraseña
        cy.get(':nth-child(2) > .oxd-input-group > :nth-child(2) > .oxd-input').type("ceviche#1");
        //clic en aceptar
        cy.get('.oxd-button--secondary').click();
        //Successfully Saved
        cy.get('.oxd-text--toast-message').should('have.text', "Successfully Saved")
    })
});