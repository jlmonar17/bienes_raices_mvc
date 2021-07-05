/// <reference types="cypress" />

describe("Prueba el formulario de contacto", () => {
    it("Prueba la página de contacto y el envío de email", function () {
        cy.visit("/contacto");

        cy.get('[data-cy="heading-contacto"]').should("exist");
        cy.get('[data-cy="heading-contacto"]')
            .invoke("text")
            .should("equal", "Llenar el Formulario de Contacto");
        cy.get('[data-cy="heading-contacto"]')
            .invoke("text")
            .should("not.equal", "Llene el formulario");
    });

    it("Llena los campos del formulario", function () {
        cy.visit("/contacto");

        cy.get('[data-cy="input-nombre"]').type("José Luis");
        cy.get('[data-cy="input-mensaje"]').type("Hola Mundo");
        cy.get('[data-cy="input-opciones"]').select("Compra");

        cy.get('[data-cy="input-precio"]').type("300000");

        cy.get('[data-cy="input-contacto"]').eq(1).check();
        cy.get('[data-cy="input-email"]').type("jose@mail.com");

        cy.wait(2000);

        cy.get('[data-cy="input-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type("0989999999");
        cy.get('[data-cy="input-fecha"]').type("2021-06-27");
        cy.get('[data-cy="input-hora"]').type("12:30");

        cy.get('[data-cy="formulario"]').should("exist");
        cy.get('[data-cy="formulario"]').submit();

        cy.get('[data-cy="alerta-envio-formulario"]').should("exist");
        cy.get('[data-cy="alerta-envio-formulario"]')
            .invoke("text")
            .should("equal", "Correo Enviado Correctamente");
        cy.get('[data-cy="alerta-envio-formulario"]')
            .should("have.class", "alert")
            .and("have.class", "exito")
            .and("not.have.class", "error");
    });
});
