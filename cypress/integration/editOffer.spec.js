describe("Edit offer", () => {
  before(() => {
    cy.visit("/signin.php");
    //cy.clearDB() - wlasna funkcja do cypress, ktora wyczysci nam baze przed zalogowaniem
    //cy.registerUser() - stworz konto, na ktore uzytkownik bedzie mogl sie zalogowac
    // login - teodor.tkaczyk98@gmail.com
    // password - haslo123
  });

  beforeEach(() => {
    Cypress.Cookies.preserveOnce("PHPSESSID");
  });

  it("Successfully logged into a service", () => {
    cy.login();
  });

  it("Goes to user's offers", () => {
    cy.get('[data-test-id="myOffers"]').click({ force: true });
    cy.url().should("include", "/myoffers.php?page=1");
  });

  it("Goes to specific offer edit page", () => {
    cy.get('[data-test-id="offer0"]').click({ force: true });
    cy.url().should("include", "/myoffer.php?id=");
  });

  it("Edits details about offer with error", () => {
    cy.get("input[name=production_year]").clear({ force: true }).type("ssss");
    cy.get('[data-test-id="editOffer"]').click({ force: true });
    cy.get('[data-test-id="offerEditError"]').should("be.visible");
  });

  it("Edits details about offer with success", () => {
    cy.get("input[name=production_year]").clear({ force: true }).type("2012");
    cy.get('[data-test-id="editOffer"]').click({ force: true });
    cy.get('[data-test-id="offerEditSuccess"]').should("be.visible");
  });
});
