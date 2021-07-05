/// <reference types="cypress" />

describe("Carga la página principal", () => {
    it("Prueba el header de la página principal", function () {
        cy.visit("/");

        cy.get('[data-cy="heading-sitio"]').should("exist");
        cy.get('[data-cy="heading-sitio"]')
            .invoke("text")
            .should(
                "equal",
                "Venta de Casas y Departamentos Exclusivos de Lujo"
            );

        cy.get('[data-cy="heading-sitio"]')
            .invoke("text")
            .should("not.equal", "Bienes Raices");
    });

    it("Prueba el bloque de los iconos principales", function () {
        cy.visit("/");

        cy.get('[data-cy="heading-nosotros"]').should("exist");
        cy.get('[data-cy="heading-nosotros"]')
            .should("have.prop", "tagName")
            .should("equal", "H2");

        // Verifica que exista la seccion de iconos y que sean 3 los div existentes.
        cy.get('[data-cy="iconos-nosotros"]').should("exist");
        cy.get('[data-cy="iconos-nosotros"]')
            .find(".icono")
            .should("have.length", 3);
        cy.get('[data-cy="iconos-nosotros"]')
            .find(".icono")
            .should("not.have.length", 4);
    });

    it("Prueba la sección de propiedades", function () {
        cy.get('[data-cy="anuncio"]').should("exist");
        cy.get('[data-cy="anuncio"]').should("have.length", 3);
        cy.get('[data-cy="anuncio"]').should("not.have.length", 5);

        // Probando enlace a las propiedades
        cy.get('[data-cy="enlace-propiedad"]').should(
            "have.class",
            "boton-amarillo-block"
        );

        // Verificando que los enlances contengan el texto Ver Propiedad
        cy.get('[data-cy="enlace-propiedad"]')
            .first()
            .invoke("text")
            .should("equal", "Ver Propiedad");

        // Click sobre el enlace de Ver Propiedad y que se dirige a la página se supone debe ir
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should("exist");

        // Retorno a la página principal luego de 2 segundos
        cy.wait(1000);
        cy.go("back");
    });

    it("Prueba el routing hacia todas las propiedades", function () {
        cy.get('[data-cy="todas-propiedades"]').should("exist");
        cy.get('[data-cy="todas-propiedades"]').should(
            "have.class",
            "boton-verde"
        );

        // Verifica que el enlace lleva a la ruta correcta
        cy.get('[data-cy="todas-propiedades"]')
            .invoke("attr", "href")
            .should("equal", "/propiedades");

        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]')
            .invoke("text")
            .should("equal", "Casas y Depas en Venta");

        cy.wait(2000);
        cy.go("back");
    });

    it("Prueba el bloque de contacto", function () {
        cy.get('[data-cy="imagen-contacto"]').should("exist");
        cy.get('[data-cy="imagen-contacto"]')
            .find("h2")
            .invoke("text")
            .should("equal", "Encuentra la casa de tus sueños");

        cy.get('[data-cy="imagen-contacto"]')
            .find("p")
            .invoke("text")
            .should(
                "equal",
                "Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad"
            );

        cy.get('[data-cy="imagen-contacto"]')
            .find("a")
            .invoke("attr", "href")
            .then((url) => {
                cy.visit(url);
            });

        cy.wait(1000);
        cy.visit("/");
    });
});
