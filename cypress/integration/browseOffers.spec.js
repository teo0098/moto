describe("Browse offers", () => {
  before(() => {
    cy.visit("/");
  });

  it("Browses offers", () => {
    cy.get('[data-test-id="searchShort"]').click({ force: true });
    cy.url().should("include", "/offers.php?");
    cy.get('[data-test-id="page2"]').click({ force: true });
    cy.url().should("include", "page=2");
    cy.get('[data-test-id="page3"]').click({ force: true });
    cy.url().should("include", "page=3");
    cy.get('[data-test-id="offerNr0"]').click({ force: true });
    cy.url().should("include", "/offer.php?id=");
  });
});
