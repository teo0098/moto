Cypress.Commands.add("login", () => {
  cy.get("input[name=email]")
    .clear({ force: true })
    .type("teodor.tkaczyk98@gmail.com");
  cy.get("input[name=password]").clear({ force: true }).type("haslo1234");
  cy.get('button[type="submit"]').click({ force: true });
  cy.url().should("include", "/userprofile.php");
});
// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })
