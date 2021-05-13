describe("Browse offers", () => {
  before(() => {
    cy.visit("/");
  });

  it("Browses offers", () => {
    cy.get('[data-test-id="searchShort"]').click({ force: true });
    cy.url().should("include", "/offers.php?");
<<<<<<< HEAD
<<<<<<< HEAD
    cy.get('[data-test-id="page2"]').click({ force: true });
    cy.url().should("include", "page=2");
    cy.get('[data-test-id="page3"]').click({ force: true });
    cy.url().should("include", "page=3");
    cy.get('[data-test-id="offerNr0"]').click({ force: true });
    cy.url().should("include", "/offer.php?id=");
=======
>>>>>>> 7f74803... Prepare cypress tests
=======
>>>>>>> 7f748037a08949154145698b895b125f627db642
  });
});
